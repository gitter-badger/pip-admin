<?php
/*
 * Developer: Gaalferov
 * URL: http://gaalferov.com
 * Date: 26-11-2014
 *
 * */
defined('_JEXEC') or die;

class auth_model extends Model
{

  public function getAuth($user_id, $hash, $password = FALSE)
  {
    $user_id = $this->escapeString($user_id);
    $hash = $this->escapeString($hash);
    $q = 'SELECT `id` AS user_id,`login` AS user_login,`mail` AS user_mail FROM `users` WHERE `id`="' . $user_id . '" AND `hash`="' . $hash . '" ';
    if ($password) {
      $q .= 'AND password="' . md5($password) . '"';
    }
    $result = $this->query($q);
    return $result;
  }

  public function getUser($login, $password)
  {
    $login = $this->escapeString($login);
    $password = md5($this->escapeString($password));
    $result = $this->query('SELECT `id` AS user_id,`login` AS user_login,`mail` AS user_mail FROM `users` WHERE `login`="' . $login . '" AND `password`="' . $password . '"');
    return $result;
  }

  public function setHash($hash, $id)
  {
    $this->execute('UPDATE `users` SET `hash` = "' . $hash . '" WHERE `id` = "' . $id . '"');
    return true;
  }

  public function clearHash($id)
  {
    $this->execute('UPDATE `users` SET `hash` = NULL WHERE `id` = "' . $id . '"');
    return true;
  }

  public function changeSettings($id, $email, $password = FALSE)
  {
    if ($password) {
      $q_password = '`password` = "'.md5($this->escapeString($password)).'",';
    } else {
      $q_password = '';
    }
    $q = 'UPDATE `users` SET '.$q_password.'`mail` = "'.$this->escapeString($email).'" WHERE `id` = "' . $id . '"';

    $this->execute($q);
    return true;
  }

}
