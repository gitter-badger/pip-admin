<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class orders_model extends Model
{

  public function getAllData($status = NULL)
  {
    if ($status != NULL) $status = ' `status` = '. (int)$status;
    else $status = 1;
    return $this->querylist('SELECT * FROM `orders` WHERE '.$status);
  }

  public function getData($id)
  {
    return $this->query('SELECT * FROM `orders` WHERE `id`='.$this->escapeString($id));
  }

  public function OrderAdd($email,$fio = '',$product_id, $type = 'pd4')
  {
    $this->execute('INSERT INTO `orders`'
    .' (`date`, `email`, `fio`, `product_id`, `type`)'
    .' VALUES'
    .' ("'.$this->to_datetime(time()).'", "'.$this->escapeString($email).'", "'.$this->escapeString($fio).'", '.(int)$product_id.', "'.$this->escapeString($type).'")');
    return mysql_insert_id();
  }

  public function OrderEdit($id,$pay = NULL,$status)
  {
    $param = array('`status` = '.(int)$status);
    if ($pay) $param[] = '`pay` = "'.$this->escapeString($pay).'"';
    $this->execute('UPDATE `orders` SET '.implode(',', $param).' WHERE `id`='.(int)$id);
    return true;
  }

  public function OrderDel($id)
  {
    $this->execute('DELETE FROM `orders` WHERE `id`='.(int)$id);
    return true;
  }

  public function SetCount($id, $count = 0)
  {
    $param = array('`count_remind` = '.$count, '`remind` = "'.$this->to_datetime(time()).'"');
    $this->execute('UPDATE `orders` SET '.implode(',', $param).' WHERE `id`='.(int)$id);
    return true;
  }

  public function SetLastMsg($id, $subject, $msg)
  {
    $param = array('`last_msg_subject` = "'.$this->escapeString($subject).'"', '`last_msg` = "'.$this->escapeString($msg).'"');
    $this->execute('UPDATE `orders` SET '.implode(',', $param).' WHERE `id`='.(int)$id);
    return true;
  }



}
