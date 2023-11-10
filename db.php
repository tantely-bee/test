<?php
session_start();

$conn = mysqli_connect(
  '34.129.21.36',
  'root',
  'root',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
