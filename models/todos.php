<?php

require_once 'db.php';

class Todo
{

  public static function findAll()
  {
    global $connection;

    $todos = array();

    $query  = 'SELECT * FROM todos';

    $result = mysqli_query($connection, $query);

    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        array_push($todos, $row);
      }
      header('HTTP/1.1 200 OK');
      echo json_encode($todos);
    } else {
      header('HTTP/1.1 500 Internal Server Error');
    }

    return $todos;
  }
}
