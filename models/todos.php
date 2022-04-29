<?php

require_once 'db.php';

class Todo
{

  public static function create()
  {
    $todo = json_decode(file_get_contents('php://input'), true);

    global $connection;

    $query  = 'INSERT INTO todos (id, title, content, is_completed)  
    VALUES (NULL, ?, ?, ?)';

    $stmt = $connection->prepare($query);

    $stmt->bind_param(
      'ssi',
      $todo['title'],
      $todo['content'],
      $todo['is_completed']
    );

    $result = $stmt->execute();

    if ($result) {
      header('HTTP/1.1 200 OK');
    } else {
      header('HTTP/1.1 500 Internal Server Error');
    }
  }

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

  public static function delete($id)
  {
    global $connection;

    $query  = 'DELETE FROM todos WHERE id = ?';

    $stmt = $connection->prepare($query);

    $stmt->bind_param('i', $id);

    $result = $stmt->execute();

    if ($result) {
      header('HTTP/1.1 200 OK');
    } else {
      header('HTTP/1.1 500 Internal Server Error');
    }
  }

  public static function update($id)
  {
    $todo = json_decode(file_get_contents('php://input'), true);

    global $connection;

    $query  = 'UPDATE todos SET title = ?, content = ?, is_completed = ? WHERE id = ?';

    $stmt = $connection->prepare($query);
    
    $stmt->bind_param(
      'ssii',
      $todo['title'],
      $todo['content'],
      $todo['is_completed'],
      $id
    );

    $result = $stmt->execute();

    if ($result) {
      header('HTTP/1.1 200 OK');
    } else {
      header('HTTP/1.1 500 Internal Server Error');
    }
  }
}
