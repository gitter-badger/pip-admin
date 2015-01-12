<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class Settings extends Controller
{
  private $menu = 'settings';
  private $settings_model;

  public function __construct()
  {
    parent::__construct();
    $this->settings_model = $this->loadModel('settings_model');
  }

  function index()
  {
    $settings = '';
    if ($this->user_auth) {
      $this->view = 'settings_index';
      $settings = $this->settings_model->getData();
    }
    $template = $this->loadView($this->view);
    $template->set('settings', $settings);
    $template->set('user_info', unserialize($this->request->getVar('user_info')));
    $template->set('menu', array('first'=>$this->menu));
    $template->render();
  }

  function save()
  {
    if ($this->user_auth) {
      $general = $this->request->getVar('general',array());
      $msg = $this->request->getVar('msg',array());
      $this->settings_model->changeSettings(array_merge($general,$msg));
      $this->request->SetInfoMessages('Данные успешно изменены', 'success');
    }
    $this->redirect('settings/');
  }

}