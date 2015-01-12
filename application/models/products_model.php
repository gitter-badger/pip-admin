<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class products_model extends Model
{

  public function getAllData($key = null)
  {
    return $this->querylist('SELECT * FROM `products` WHERE 1', $key);
  }

  public function getData($id)
  {
    return $this->query('SELECT * FROM `products` WHERE `id`='.$this->escapeString($id));
  }

  public function ProductEdit($id,$name,$price,$msg)
  {
    $param = array('`name` = "'.$this->escapeString($name).'"','`price` = '.(int)$price,'`msg` = "'.$this->escapeString($msg).'"');
    $this->execute('UPDATE `products` SET '.implode(',', $param).' WHERE `id`='.(int)$id);
    return true;
  }

  public function ProductDel($id)
  {
    $this->execute('DELETE FROM `products` WHERE `id`='.(int)$id);
    return true;
  }

  public function ProductAdd($name,$price,$msg)
  {
    $this->execute('INSERT INTO `products` (`id`, `name`, `price`, `msg`) VALUES (NULL, "'.$this->escapeString($name).'", '.(int)$price.', "'.$this->escapeString($msg).'")');
    return mysql_insert_id();
  }

}
