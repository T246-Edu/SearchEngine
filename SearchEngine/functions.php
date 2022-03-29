<?php
function TABLEConnection($database) //connect to db for tables
{
  $connection = mysqli_connect("localhost", "root", "", $database);
  return $connection;
}
function test_input($data, $database)
{
  $connection = TABLEConnection("$database");
  $data = mysqli_real_escape_string($connection, $data);
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function unique_multidim_array($array, $key)
{
  $temp_array = array();
  $i = 0;
  $key_array = array();

  foreach ($array as $val) {
    if (!in_array($val[$key], $key_array)) {
      $key_array[$i] = $val[$key];
      $temp_array[$i] = $val;
    }
    $i++;
  }
  return $temp_array;
}
