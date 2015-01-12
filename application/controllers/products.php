<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class Products extends Controller
{
  private $menu = 'products';
  private $products_model;

  public function __construct()
  {
    parent::__construct();
    $this->products_model = $this->loadModel('products_model');
  }

  function index()
  {
    $products = array();
    if ($this->user_auth) {
      $this->view = 'products_index';
      $products = $this->products_model->getAllData();
    }
    $template = $this->loadView($this->view);
    $template->set('products', $products);
    $template->set('user_info', unserialize($this->request->getVar('user_info')));
    $template->set('menu', array('first'=>$this->menu));
    $template->render();
  }

  function save()
  {
    if ($this->user_auth) {
      $id = $this->request->getVar('id',NULL);
      $name = $this->request->getVar('name','');
      $price = $this->request->getVar('price',0);
      $msg = $this->request->getVar('msg','');
      $button = $this->request->getVar('button','');
      if ($price && $name && $msg) {
        if ($id) {
          $this->products_model->ProductEdit($id,$name,$price,$msg);
          $this->request->SetInfoMessages('Товар "'. $name .'" успешно отредактирован', 'success');
        } else {
          $id = $this->products_model->ProductAdd($name,$price,$msg);
          $this->request->SetInfoMessages('Товар "'. $name .'" успешно добавлен', 'success');
        }
        if ($button == 'only_save') {
          $this->redirect('products/edit/'.$id);
        } else {
          $this->redirect('products/');
        }
      } else {
        $this->request->SetInfoMessages('Все поля обязательны для заполнения', 'warning');
        $this->redirect('products/');
      }
    } else {
      $this->redirect('');
    }
  }

  function edit($id = NULL)
  {
    if ($this->user_auth) {
      $product = array();
      if ($id){
        $product = $this->products_model->getData($id);
      }
      $this->view = 'products_edit';
      $template = $this->loadView($this->view);
      $template->set('product', $product);
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
      $this->products_model->ProductDel($id);
      $this->request->SetInfoMessages('Товар c ID:'. $id .' успешно удален', 'success');
    }
    $this->redirect('products/');
  }

  function get($id)
  {
    if ($id) {
      $product = $this->products_model->getData($id);
      $template = $this->loadView('products_get');
      if ($product) {
        $template->set('product', $product);
      } else {
        $this->request->SetInfoMessages('Товар c ID:'. $id .' не найден или удален из базы', 'danger');
        $template->set('product', FALSE);
      }
      $template->render();
    } else {
      $this->redirect('');
    }
  }

}