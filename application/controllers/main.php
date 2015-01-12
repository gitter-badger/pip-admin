<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class Main extends Controller
{
  private $menu = 'main';

  function index()
  {
    $orders = $products = array();
    if ($this->user_auth) {
      $orders_model = $this->loadModel('orders_model');
      $products_model = $this->loadModel('products_model');
      $products = $products_model->getAllData('id');
      $orders = $orders_model->getAllData();
      $this->view = 'orders_index';
    }
    $template = $this->loadView($this->view);
    $template->set('orders', $orders);
    $template->set('products', $products);
    $template->set('user_info', unserialize($this->request->getVar('user_info')));
    $template->set('menu', array('first'=>$this->menu));
    $template->render();
  }

  function login()
  {
    $login = $this->request->getVar('login');
    $password = $this->request->getVar('password');
    $msg = $msg_type = '';

    if ($login && $password) {
      $user = $this->auth_model->getUser($login, $password);
      if ($user) {
        $hash = md5($login . $password . mt_rand());
        $user_info = array('user_login'=>$user['user_login'],'user_mail'=>$user['user_mail']);
        $this->request->setVar('user_id', $user['user_id'], 'COOKIE');
        $this->request->setVar('user_hash', $hash, 'COOKIE');
        $this->request->setVar('user_info', serialize($user_info), 'COOKIE');
        $this->auth_model->setHash($hash, $user['user_id']);
        $this->view = 'main_index';
        $msg = 'Вы успешно авторизированы';
        $msg_type = 'success';
      } else {
        $msg = 'Логин или пароль введены неверно';
        $msg_type = 'danger';
      }
    } else {
      $msg = 'Введите логин и пароль';
      $msg_type = 'warning';
    }
    $this->request->SetInfoMessages($msg, $msg_type);
    $this->redirect('');
  }

  function logout()
  {
    $this->clear();
  }

  function settings()
  {
    if ($this->user_auth) {
      $now_password = $this->request->getVar('now_password');
      $new_password = $this->request->getVar('new_password','');
      $user_info = unserialize($this->request->getVar('user_info'));
      $email = $this->request->getVar('email');
      if ($email && $now_password) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
          if ($this->auth_model->getAuth($this->user_id, $this->user_hash, $now_password)) {
            $this->auth_model->changeSettings($this->user_id, $email, $new_password);
            //Update user email, after changeSettings
            $this->request->setVar('user_info', serialize(array('user_login'=>$user_info['user_login'],'user_mail'=>$email)), 'COOKIE');
            $this->request->SetInfoMessages('Данные успешно изменены', 'success');
          } else {
            $this->request->SetInfoMessages('Неверно указан текущий пароль', 'danger');
          }
        } else {
          $this->request->SetInfoMessages('Некорректный e-mail', 'warning');
        }
      } else {
        $this->request->SetInfoMessages('E-mail и текущий пароль обязательны для заполнения', 'warning');
      }
    }
    $this->redirect('');
  }

}