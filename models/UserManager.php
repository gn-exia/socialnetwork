<?php
include_once "PDO.php";

function GetOneUserFromId($id)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user WHERE id = $id");
  return $response->fetch();
}

function GetAllUsers()
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user ORDER BY nickname ASC");
  return $response->fetchAll();
}

function GetUserIdFromUserAndPassword($username, $password)
{
  global $PDO;
  $response = $PDO->query("SELECT * FROM user WHERE nickname = '$username' and password = '$password'");
  $users = $response->fetchAll();
  if (empty($users)) {
    return -1;
  } else {
    $oneUser = $users[0];
    return $oneUser['id'];
  }
}
