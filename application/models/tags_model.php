<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class tags_model extends Model
{

  public function getAllData()
  {
    return $this->querylist('SELECT * FROM `tags` WHERE 1');
  }

  public function getData($id)
  {
    return $this->query('SELECT * FROM `tags` WHERE `id`='.$this->escapeString($id));
  }

  public function TagAdd($type,$title,$params)
  {
    $this->execute('INSERT INTO `tags`'
    .' (`type`, `title`, `params`)'
    .' VALUES'
    .' ("'.(int)$type.'", "'.$this->escapeString($title).'", \''.$params.'\')');
    return mysql_insert_id();
  }

  public function TagEdit($id,$title,$params)
  {
    $param = array('`title` = "'.$this->escapeString($title).'"','`params` = \''.$params.'\'');
    $this->execute('UPDATE `tags` SET '.implode(',', $param).' WHERE `id`='.(int)$id);
    return true;
  }

  public function TagDel($id)
  {
    $this->execute('DELETE FROM `tags` WHERE `id`='.(int)$id);
    return true;
  }



}
