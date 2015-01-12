<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
class Model
{

  private $connection;

  public function __construct()
  {
    global $config;

    $this->connection = mysql_connect($config['db_host'], $config['db_username'], $config['db_password']) or die('Connection MySQL Error: ' . mysql_error());
    mysql_select_db($config['db_name'], $this->connection);
    mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
    mysql_query("SET CHARACTER SET 'utf8'");
  }

  public function escapeString($string)
  {
    return mysql_real_escape_string($string);
  }

  public function escapeArray($array)
  {
    array_walk_recursive($array, create_function('&$v', '$v = mysql_real_escape_string($v);'));
    return $array;
  }

  public function to_bool($val)
  {
    return !!$val;
  }

  public function to_date($val)
  {
    return date('Y-m-d', $val);
  }

  public function to_time($val)
  {
    return date('H:i:s', $val);
  }

  public function to_datetime($val)
  {
    return date('Y-m-d H:i:s', $val);
  }

  public function query($qry)
  {
    $result = mysql_query($qry) or die('Query MySQL Error: ' . mysql_error());
    $resultAssoc = array();
    if ($row = mysql_fetch_assoc($result)) $resultAssoc = $row;
    return $resultAssoc;
  }

  public function querylist($qry, $key = null)
  {
    $result = mysql_query($qry) or die('QueryList MySQL Error: ' . mysql_error());
    $resultAssocList = array();
    while ($row = mysql_fetch_assoc($result)) {
      if ($key) {
        $resultAssocList[$row[$key]] = $row;
      } else {
        $resultAssocList[] = $row;
      }
    }
    return $resultAssocList;
  }

  public function execute($qry)
  {
    $exec = mysql_query($qry) or die('Execute MySQL Error: ' . mysql_error());
    return $exec;
  }


}
