<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');

// API scan for Phlux
if (isset($_GET['phlux_scan'])) {
  echo json_encode(['methods' => ['getUser', 'getPosts', 'saveComment']]);
  exit;
}

// API methods
function getUser($id) {
  return ['id' => $id, 'name' => "User_$id"];
}

function getPosts() {
  return [
    ['id' => 1, 'title' => 'Post 1', 'content' => 'Hello from PHP!'],
    ['id' => 2, 'title' => 'Post 2', 'content' => 'Phlux rocks!']
  ];
}

function saveComment($postId, $text) {
  return ['status' => 'saved', 'postId' => $postId, 'comment' => $text];
}

// Handle API requests
if (isset($_GET['method'])) {
  $args = json_decode($_GET['args'] ?? '[]', true);
  echo json_encode(call_user_func_array($_GET['method'], $args));
}
