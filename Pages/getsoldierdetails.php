<?php 
  require_once '../Models/DatabaseContext.php';
  require_once '../Models/User.php';

  $db = DatabaseContext::dbConnect();
  $user = new User();

  $id = $_GET['id'];
  //var_dump($id);
  $userdata = $user->getUserById($id, $db);

  $userjson = json_encode($userdata);
  //header('Content-Type: Application/json');
  echo $userjson;

