<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class settings_model extends Model
{

  public function changeSettings($params)
  {
    $param = array();
    foreach ($params as $key => $value) {
      $param[] = $key."='".$this->escapeString($value)."'";
    }
    $this->execute('UPDATE `settings` SET '.implode(',', $param).' WHERE 1');
    return true;
  }

  public function getData()
  {
    return $this->query('SELECT * FROM `settings` WHERE 1');
  }

}
