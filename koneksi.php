<?php
$mysqli = new mysqli("localhost","root","","db_tokopancing");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?>