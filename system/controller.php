<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
class Controller {

  public  $request;
  public   $auth_model;
  public   $view = 'main_login';
  protected  $user_info = array();
  protected  $user_id;
  protected  $user_hash;
  protected  $user_auth = FALSE;

  public function __construct()
  {
    $this->request = $this->loadHelper('request_helper');
    $this->auth_model = $this->loadModel('auth_model');
    $this->user_id = $this->request->getVar('user_id');
    $this->user_hash = $this->request->getVar('user_hash');
    if (($this->user_id && $this->user_hash) && ($this->user_auth === FALSE)) {
      if ($this->auth_model->getAuth($this->user_id,  $this->user_hash)) {
        $this->user_auth = TRUE;
      } else {
        $this->clear();
      }
    }
  }
	
	public function loadModel($name)
	{
    require_once(APP_DIR .'models/'. strtolower($name) .'.php');
		$model = new $name;
		return $model;
	}
	
	public function loadView($name)
	{
		$view = new View($name);
		return $view;
	}
	
	public function loadLibraries($name, $src = '')
	{
    if ($src) $patch = APP_DIR .'libraries/'. $src . '/' . strtolower($name) .'.php';
    else $patch = APP_DIR .'libraries/'. strtolower($name) .'.php';
    require_once($patch);
    $libraries = new $name;
    if ($name == 'PHPMailer') {
      $settings_model = $this->loadModel('settings_model');
      $settings = $settings_model->getData();
      $libraries->CharSet = "UTF-8";
      $libraries->isSendmail();
      $libraries->setFrom($settings['mail_from'], $settings['mail_from_name']);
      $libraries->IsHTML(true);
    }
    return $libraries;
	}
	
	public function loadHelper($name)
	{
    require_once(APP_DIR .'helpers/'. strtolower($name) .'.php');
		$helper = new $name;
		return $helper;
	}
	
	public function redirect($loc)
	{
		global $config;
		header('Location: '. $config['base_url'] . $loc);
	}

  public function clear()
  {
    $this->request->setVar('user_id', NULL, 'COOKIE', TRUE, -1);
    $this->request->setVar('user_hash', NULL, 'COOKIE', TRUE, -1);
    $this->request->setVar('user_info', NULL, 'COOKIE', TRUE, -1);
    $this->auth_model->clearHash($this->user_id);
    $this->request->SetInfoMessages('Заходите еще ;-)');
    $this->redirect('');
  }
    
}

?>