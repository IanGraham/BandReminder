<?php

  $id = $_GET['vk_id'];
  $name = $_GET[' vk_name'];
  $photo = $_GET['vk_photo'];
  $smallPhoto = $_GET['vk_smalPhoto'];

  // do some validation here to ensure id is safe

  $link = mysql_connect("u389193.mysql.masterhost.ru", "u389193", "me24..NCIng") or die('NIHT');
  mysql_select_db("u389193");
  $sql = "INSERT INTO acc (vk_name, vk_uid, vk_photo, vk_smallPhoto) VALUES ($name, $id, $photo, $smallPhoto)";
  $result = mysql_query("$sql");

  mysql_close($link);
  printf(mysql_insert_id());
?>