<?php

require_once __DIR__ . '/../model/Query.php';
require_once __DIR__ . '/../controller/Validation.php';

$val = new Validation();
// Initializing object for query class.
$ob = new Query();
$strike = "";
if (isset($_POST['Submit'])) {
  session_start();
  if (!empty($_POST['title']) && !empty($_POST['run']) && !empty($_POST['ball'])) {
    $strike = ($_POST['run'] / $_POST['ball']) * 100;
    if ($val->validNumber((int)$_POST['run']) && $val->validNumber((int)$_POST['ball']) && $val->validPlayer($_POST['title'])) {
      if ($ob->calculatePlayer()) {
        $ob->insertPlayer($_POST['title'], $_POST['ball'], $_POST['run'], $strike);
        $message = "Player added succesfully";
      } else {
        $message = "Player can not be added!";
      }
    } else {
      $message = "Player name should contains only alphabets and ball,run should contains only number.";
    }
  } else {
    $message = "Please fill all the fields.";
  }
}
