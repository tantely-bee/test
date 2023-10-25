<?php
session_start();

$conn = mysqli_connect(
  '34.118.23.74',
  'root',
  'root',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
