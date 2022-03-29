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
function array_sort($array, $on, $order = SORT_DESC)
{
  $new_array = array();
  $sortable_array = array();

  if (count($array) > 0) {
    foreach ($array as $k => $v) {
      if (is_array($v)) {
        foreach ($v as $k2 => $v2) {
          if ($k2 == $on) {
            $sortable_array[$k] = $v2;
          }
        }
      } else {
        $sortable_array[$k] = $v;
      }
    }

    switch ($order) {
      case SORT_ASC:
        asort($sortable_array);
        break;
      case SORT_DESC:
        arsort($sortable_array);
        break;
    }

    foreach ($sortable_array as $k => $v) {
      $new_array[$k] = $array[$k];
    }
  }

  return $new_array;
}
