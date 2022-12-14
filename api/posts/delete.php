<?php
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: DELETE'); //DELETE, POST, GET, PUT
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
  if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit('ok');
  }

  require_once '../../config/Database.php';
  require_once '../../models/Post.php';

  // Connect db
  $database = new Database();
  $db = $database->connect();

  $post = new Post($db);

  try {
    require '../../config/protect.php';
    $data = json_decode(file_get_contents("php://input"));
    $post->id = $data->id;
    $post->delete();
  } catch (Exception $e) {

  }


?>