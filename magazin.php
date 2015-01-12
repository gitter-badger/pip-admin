<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Тестовый интернет-магазин, разработчик GAAlferov">
  <meta name="author" content="GAAlferov">
  <title>Магазин для тестирования</title>
</head>
<body>
<h2>Товары</h2>
<?php
function ShowInfoMessages()
{
  if (isset($_GET['InfoMessages']) && !empty($_GET['InfoMessages'])) {
    return '
        <div class="alert alert-'.$_GET["InfoMessagesType"].' alert-dismissable fade in" id="InfoMessages" style="color: red;">
          '.$_GET["InfoMessages"].'
        </div>';
  }
}
require_once('application/config/config.php');
require_once('system/model.php');
$Model = new Model;
$products = $Model->querylist('SELECT * FROM `products` WHERE 1');
echo ShowInfoMessages();
foreach ($products as $product) {
  echo '<p><strong>'.$product["name"].'</strong> <a href="/products/get/'.$product["id"].'" target="_blank">Купить</a></p>';
}
?>
</body>
</html>