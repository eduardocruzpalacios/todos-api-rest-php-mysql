<?php

require 'models/models.php';

$request = $_SERVER['REQUEST_METHOD'];

switch ($request) {
  case 'GET':
    Todo::findAll();
    break;
  case 'POST':
    Todo::create();
    break;
  case 'PUT':
    Todo::update($_GET['id']);
    break;
  case 'DELETE':
    Todo::delete($_GET['id']);
    break;
}
