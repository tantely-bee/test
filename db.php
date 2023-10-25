<?php
session_start();

$conn = mysqli_connect(
  '35.244.81.39',
  'root',
  'root',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
