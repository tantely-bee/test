<?php
session_start();

$conn = mysqli_connect(
  '35.225.95.99',
  'root',
  'root',
  'php_mysql_crud'
) or die(mysqli_erro($mysqli));

?>
