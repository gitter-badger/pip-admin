<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class Tags extends Controller
{
  private $menu = 'tags';
  private $tags_model;

  public function __construct()
  {
    parent::__construct();
    $this->tags_model = $this->loadModel('tags_model');
  }

  function index()
  {
    $tags = array();
    if ($this->user_auth) {
      $this->view = 'tags_index';
      $tags = $this->tags_model->getAllData();
    }
    $template = $this->loadView($this->view);
    $template->set('tags', $tags);
    $template->set('user_info', unserialize($this->request->getVar('user_info')));
    $template->set('menu', array('first'=>$this->menu));
    $template->render();
  }

  function save()
  {
    if ($this->user_auth) {
      $id = $this->request->getVar('id',NULL);
      $type = $this->request->getVar('type',NULL);
      $title = $this->request->getVar('title','');
      $params = $this->request->getVar('params',array());
      $params_use = $this->request->getVar('params_use',array());
      $button = $this->request->getVar('button','');
      if ($title && $type !== NULL && $params) {
        if ($type == 0) {
          //Уникальные теги
          if ($id) {
            foreach ($params as $key => $param) {
              $_params[] = array('use'=>$params_use[$key],'param'=>$param);
            }
          } else {
            //первичная загрузка
            $params=explode("\n",$params[0]);
            foreach ($params as $param) {
              $_params[] = array('use'=>'0','param'=>trim($param));
            }
          }

          $params = json_encode($_params);
        } else {
          //Постоянный тег
          $params = json_encode(array('count'=>$params_use,'param'=>$params));
        }
        if ($id) {
          $orders_model = $this->loadModel('orders_model');
          $orders = $orders_model->getAllData(2); // Все заказы, которым не хватило тегов
          foreach ($orders as $order) {
            $status = $this->change_status($order['id'], 1, $order);
            $orders_model->OrderEdit($order['id'], NULL, $status);
          }
          $this->tags_model->TagEdit($id,$title,$params);
          $this->request->SetInfoMessages('Тег "'. $title .'" успешно отредактирован', 'success');
        } else {
          $id = $this->tags_model->TagAdd($type,$title,$params);
          $this->request->SetInfoMessages('Тег "'. $title .'" успешно добавлен', 'success');
        }
        if ($button == 'only_save') {
          $this->redirect('tags/edit/'.$id);
        } else {
          $this->redirect('tags/');
        }
      } else {
        $this->request->SetInfoMessages('Все поля обязательны для заполнения', 'warning');
        $this->redirect('tags/');
      }
    } else {
      $this->redirect('');
    }
  }

  function edit($id = NULL)
  {
    if ($this->user_auth) {
      $tag = $tag_params = array();
      if ($id){
        $tag = $this->tags_model->getData($id);
        $tag_params = json_decode($tag['params'], true);
      } else {
        $type = $this->request->getVar('type',0);
        $tag = array('type'=>$type);
      }
      $this->view = 'tags_edit';
      $template = $this->loadView($this->view);
      $template->set('tag', $tag);
      $template->set('tag_params', $tag_params);
      $template->set('user_info', unserialize($this->request->getVar('user_info')));
      $template->set('menu', array('first'=>$this->menu));
      $template->render();
    } else {
      $this->redirect('');
    }
  }

  function del($id)
  {
    if ($this->user_auth) {
      $this->tags_model->TagDel($id);
      $this->request->SetInfoMessages('Тег c ID:'. $id .' успешно удален', 'success');
    }
    $this->redirect('tags/');
  }

  private function  change_status($id, $status = 1, $order)
  {
    $products_model = $this->loadModel('products_model');
    $mail = $this->loadLibraries('PHPMailer', 'PHPMailer');
    $product = $products_model->getData($order['product_id']);
    if ($product) {
      $result = preg_match_all('/{tag_(.*?)}/i', $product['msg'], $tags, PREG_SET_ORDER);
      if ($result) {
        foreach ($tags as $tag) {
          $json = array();
          $tag_param = $this->tags_model->getData($tag[1]);
          $_params = json_decode($tag_param['params'], true);
          if ($tag_param['type'] == 0) {
            //уникальные
            $get_free = false;
            foreach ($_params as $_key => $_param) {
              if (($_param['use'] == 0 || empty($_param['use'])) && !$get_free) {
                $get_free = true;
                $_param['use'] = "1";
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
          $this->tags_model->TagEdit($tag_param['id'], $tag_param['title'], $json);
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
        $product['msg'] = str_replace('{product_title}', $product['name'], $product['msg']);
        $product['msg'] = str_replace('{product_price}', $product['price'], $product['msg']);
        $product['msg'] = str_replace('{product_url}', $product_url, $product['msg']);
        $product['msg'] = str_replace('{product_pay_url}', $product_pay_url, $product['msg']);
        $mail->msgHTML($product['msg']);
        $mail->send();
      }
    } else {
      $this->request->SetInfoMessages('Заказ с ID:' . $id . ' не изменен, поскольку нет товара с ID:' . $order["product_id"], 'danger');
    }
    return $status;
  }

}