<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class Orders extends Controller
{
  private $menu = 'main';
  private $orders_model;

  public function __construct()
  {
    parent::__construct();
    $this->orders_model = $this->loadModel('orders_model');
  }

  function index()
  {
    $orders = $products = array();
    if ($this->user_auth) {
      $products_model = $this->loadModel('products_model');
      $products = $products_model->getAllData('id');
      $orders = $this->orders_model->getAllData();
      $this->view = 'orders_index';
    }
    $template = $this->loadView($this->view);
    $template->set('orders', $orders);
    $template->set('products', $products);
    $template->set('user_info', unserialize($this->request->getVar('user_info')));
    $template->set('menu', array('first' => $this->menu));
    $template->render();
  }

  function saveorder($type)
  {
    global $config;
    $email = $this->request->getVar('email', FALSE);
    $fio = $this->request->getVar('fio', FALSE);
    $product_id = $this->request->getVar('product_id', FALSE);
    if ($email && $product_id) {
      $products_model = $this->loadModel('products_model');
      $settings_model = $this->loadModel('settings_model');
      $product = $products_model->getData($product_id);
      $settings = $settings_model->getData();
      //add in base orders
      $order_id = $this->orders_model->OrderAdd($email, $fio, $product_id, $type);
      if ($type == 'pd4') {
        $mail = $this->loadLibraries('PHPMailer', 'PHPMailer');
        $pd4 = $this->loadView('pd4');
        $pd4->set('email', $email);
        $pd4->set('fio', $fio);
        $pd4->set('product', $product);
        $pd4->set('settings', $settings);
        $mail_body = $pd4->render(TRUE);
        //send mail
        $mail->Subject = 'Ваш заказ успешно принят. Квитанция ПД-4';
        $mail->addAddress($email, $fio);
        $mail->msgHTML($mail_body);
        $mail->send();
        $this->orders_model->SetLastMsg($order_id,'Ваш заказ успешно принят. Квитанция ПД-4',$mail_body);
        //show
        $template = $this->loadView('products_pd4');
        $template->set('body', $mail_body);
      } else {
        $template = $this->loadView('products_online');
        $crc = md5($settings['robokassa_login'] . ":" . $product['price'] . ":" . $order_id . ":" . $settings['robokassa_pass1'] . ":Shp_item=" . $settings['robokassa_shp_item']);
        $template->set('product', $product);
        $template->set('order_id', $order_id);
        $template->set('crc', $crc);
        $template->set('config', $settings);
        //robokassa
      }
      $template->render();
    }
  }

  function get($id)
  {
    if ($id) {
      $products_model = $this->loadModel('products_model');
      $settings_model = $this->loadModel('settings_model');
      $order = $this->orders_model->getData($id);
      $product = $products_model->getData($order['product_id']);
      $settings = $settings_model->getData();
      if ($order['status'] == 0) {
        if ($order['type'] == 'pd4') {
          $pd4 = $this->loadView('pd4');
          $pd4->set('email', $order['email']);
          $pd4->set('fio', $order['fio']);
          $pd4->set('product', $product);
          $pd4->set('settings', $settings);
          $body = $pd4->render(TRUE);
          $template = $this->loadView('products_pd4');
          $template->set('body', $body);
        } else {
          $template = $this->loadView('products_online');
          $crc = md5($settings['robokassa_login'] . ":" . $product['price'] . ":" . $id . ":" . $settings['robokassa_pass1'] . ":Shp_item=" . $settings['robokassa_shp_item']);
          $template->set('product', $product);
          $template->set('order_id', $id);
          $template->set('crc', $crc);
          $template->set('config', $settings);
        }
      } else {
        $template = $this->loadView('products_online');
        $this->request->SetInfoMessages('Заказ с ID:' . $id . ' уже оплачен '.$order['pay'], 'success');
      }
      $template->render();
    }
  }

  function edit()
  {
    if ($this->user_auth) {
      $id = $this->request->getVar('id', '');
      $pay = $this->request->getVar('pay', '');
      $status = $this->request->getVar('status', 0);
      $order = $this->orders_model->getData($id);
      if (($status == 1 || $status == 2) && $order['status'] != 1) {
        $status = $this->change_status($id, $status, $order);
      }
      $this->orders_model->OrderEdit($id, $pay, $status);
      $this->request->SetInfoMessages('Заказ с ID:' . $id . ' успешно изменен', 'success');
    }
    $this->redirect('orders/');
  }

  function del($id)
  {
    if ($this->user_auth) {
      $settings_model = $this->loadModel('settings_model');
      $settings = $settings_model->getData();
      $order = $this->orders_model->getData($id);
      if ($order['status'] != 1) {
        $subject = str_replace('{order_id}', $id, $settings['msg_cancel_subject']);
        $this->send_msg($id, $subject, 'msg_cancel');
        $this->request->SetInfoMessages('Заказ c ID:' . $id . ' успешно удален. Письмо клиенту об отмене заказа, успешно отправлено.', 'success');
      } else {
        $this->request->SetInfoMessages('Заказ c ID:' . $id . ' успешно удален.', 'success');
      }
      $this->orders_model->OrderDel($id);
    }
    $this->redirect('orders/');
  }

  function remaind($id)
  {
    $this->orders_model->SetCount($id);
    $this->request->SetInfoMessages('Успешно сброшен счетчик автонапоминаний для заказа ID:' . $id, 'success');
    $this->redirect('orders/');
  }

  function repeat($id)
  {
    $order = $this->orders_model->getData($id);
    $mail = $this->loadLibraries('PHPMailer', 'PHPMailer');
    //send mail
    if ($order['last_msg']) {
      $mail->Subject = $order['last_msg_subject'];
      $mail->addAddress($order['email'], $order['fio']);
      $mail->msgHTML($order['last_msg']);
      $mail->send();
      $template = $this->loadView('orders_last_msg');
      $template->set('subject', $order['last_msg_subject']);
      $template->set('msg', $order['last_msg']);
      $template->render();
    } else {
      $this->request->SetInfoMessages('По данному заказу писем не обнаружено', 'warning');
      $this->redirect('orders/');
    }
  }

  function payresult()
  {
    global $config;
    $out_summ = $this->request->getVar('OutSum', '');
    $inv_id = $this->request->getVar('InvId', '');
    $shp_item = $this->request->getVar('Shp_item', '');
    $crc = $this->request->getVar('SignatureValue', '');
    $mrh_pass2 = $config['robokassa_pass2'];
    $crc = strtoupper($crc);

    $my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:Shp_item=$shp_item"));

    if ($my_crc == $crc) {
      $order = $this->orders_model->getData($inv_id);
      if ($order['status'] != 1) {
        $status = $this->change_status($inv_id, $order['status'], $order);
        $tm = getdate(time() + 9 * 3600);
        $date = "$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";
        $pay = 'Дата оплаты: ' . $date . ' (№ заказа:' . $inv_id . ' Сумма:' . $out_summ . ' руб.)';
        $this->orders_model->OrderEdit($inv_id, $pay, $status);
      }
      exit("OK$inv_id\n");
    } else {
      exit("bad sign\n");
    }
  }

  function paysuccess()
  {
    $this->request->SetInfoMessages('Заказ успешно оплачен', 'success');
    $this->redirect('');
  }

  function payfail()
  {
    $this->request->SetInfoMessages('Вы отказались от платежа', 'danger');
    $this->redirect('');
  }

  function cron()
  {
    $settings_model = $this->loadModel('settings_model');
    $settings = $settings_model->getData();
    if ($settings['remainder']) {
      $orders = $this->orders_model->getAllData('0'); //Все заказы, котоыре "в работе"
      if ($orders) {
        $now = strtotime("now");
        foreach ($orders as $order) {
          $last_remind = strtotime($order['remind']) + ($settings['remainder_interval'] * 60);
          if (($last_remind <= $now) && ($order['count_remind'] <= $settings['remainder_count'])) {
            $subject = str_replace('{order_id}', $order['id'], $settings['msg_reminder_subject']);
            $this->send_msg($order['id'], $subject, 'msg_reminder');
            $this->orders_model->SetCount($order['id'], ++$order['count_remind']);
          }
        }
      }
      exit('Ok');
    }
    exit('Remind don\'t activate');
  }

  private function  change_status($id, $status = 1, $order)
  {
    $products_model = $this->loadModel('products_model');
    $tags_model = $this->loadModel('tags_model');
    $mail = $this->loadLibraries('PHPMailer', 'PHPMailer');
    $product = $products_model->getData($order['product_id']);
    if ($product) {
      $result = preg_match_all('/{tag_(.*?)}/i', $product['msg'], $tags, PREG_SET_ORDER);
      if ($result) {
        foreach ($tags as $tag) {
          $json = array();
          $tag_param = $tags_model->getData($tag[1]);
          $_params = json_decode($tag_param['params'], true);
          if ($tag_param['type'] == 0) {
            //уникальные
            $get_free = false;
            foreach ($_params as $_key => $_param) {
              if (($_param['use'] == 0 || empty($_param['use'])) && !$get_free) {
                $get_free = true;
                $_param['use'] = 1;
                $http = stripos($_params[$_key]['param'], 'http');
                if ($http === false) {
                  $product['msg'] = preg_replace('~' . preg_quote($tag[0]) . '~', $_params[$_key]['param'], $product['msg'], 1);
                } else {
                  $product['msg'] = preg_replace('~' . preg_quote($tag[0]) . '~', '<a href="' . $_params[$_key]['param'] . '">' . $_params[$_key]['param'] . '</a>', $product['msg'], 1);
                }
              }
              $json[] = array('use' => $_param['use'], 'param' => $_param['param']);
            }
            $json = json_encode($json);
          } else {
            //постоянные
            $_params['count']++;
            $http = stripos($_params['param'], 'http');
            if ($http === false) {
              $product['msg'] = preg_replace('~' . preg_quote($tag[0]) . '~', $_params['param'], $product['msg'], 1);
            } else {
              $product['msg'] = preg_replace('~' . preg_quote($tag[0]) . '~', '<a href="' . $_params['param'] . '">' . $_params['param'] . '</a>', $product['msg'], 1);
            }
            $json = json_encode(array('count' => $_params['count'], 'param' => $_params['param']));
          }
          $tags_model->TagEdit($tag_param['id'], $tag_param['title'], $json);
        }
      }
      if (isset($get_free) && ($get_free == false)) $status = 2; //Закончились теги
      else {
        $status = 1;
        //send mail
        $mail->Subject = 'Выполненный заказ №' . $id;
        $mail->addAddress($order['email'], $order['fio']);
        $product_url = '<a href="http://' . $_SERVER["HTTP_HOST"] . '/products/get/' . $product["id"] . '" target="_blank">купить</a>';
        $product_pay_url = '<a href="http://' . $_SERVER["HTTP_HOST"] . '/orders/get/' . $order['id'] . '" target="_blank">оплатить</a>';
        $product['msg'] = str_replace('{order_fio}', $order['fio'], $product['msg']);
        $product['msg'] = str_replace('{product_title}', $product['name'], $product['msg']);
        $product['msg'] = str_replace('{product_price}', $product['price'], $product['msg']);
        $product['msg'] = str_replace('{product_url}', $product_url, $product['msg']);
        $product['msg'] = str_replace('{product_pay_url}', $product_pay_url, $product['msg']);
        $mail->msgHTML($product['msg']);
        $mail->send();
        $this->orders_model->SetLastMsg($id, 'Выполненный заказ №' . $id, $product['msg']);
      }
    } else {
      $this->request->SetInfoMessages('Заказ с ID:' . $id . ' не изменен, поскольку нет товара с ID:' . $order["product_id"], 'danger');
    }
    return $status;
  }

  private function send_msg($order_id, $subject, $type)
  {
    $order = $this->orders_model->getData($order_id);
    $mail = $this->loadLibraries('PHPMailer', 'PHPMailer');
    $settings_model = $this->loadModel('settings_model');
    $products_model = $this->loadModel('products_model');
    $settings = $settings_model->getData();
    $product = $products_model->getData($order['product_id']);
    $product_url = '<a href="http://' . $_SERVER["HTTP_HOST"] . '/products/get/' . $product["id"] . '" target="_blank">купить</a>';
    $product_pay_url = '<a href="http://' . $_SERVER["HTTP_HOST"] . '/orders/get/' . $order['id'] . '" target="_blank">оплатить</a>';
    $body = $settings[$type];
    $body = str_replace('{order_id}', $order['id'], $body);
    $body = str_replace('{order_fio}', $order['fio'], $body);
    $body = str_replace('{product_title}', $product['name'], $body);
    $body = str_replace('{product_price}', $product['price'], $body);
    $body = str_replace('{product_url}', $product_url, $body);
    $body = str_replace('{product_pay_url}', $product_pay_url, $body);
    //send mail
    $mail->Subject = $subject;
    $mail->addAddress($order['email'], $order['fio']);
    $mail->msgHTML($body);
    $mail->send();
  }

}