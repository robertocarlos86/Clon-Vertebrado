<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'vigilancia'
) or die(mysqli_erro($mysqli));

?>