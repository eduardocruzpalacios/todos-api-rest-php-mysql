<?php

class Db
{
  public function connect()
  {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'todosdb';
    $port = 3306;
    $connection = mysqli_connect($host, $user, $pass, $db, $port);

    return $connection;
  }
}

$db = new Db();

$connection = $db->connect();

if (!$connection) {
  die('Connection error');
}
