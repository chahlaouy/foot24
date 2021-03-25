<?php /* Template Name: create_player */ ?>

<?php


require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');
require_once(DIGIGATE_DIR_PATH . '/player/web/upload.php');

$player = new Player($db);

/** Generate a random string */

function generateRandomString($length) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

$randomString = generateRandomString(4);

$target_dir = DIGIGATE_DIR_PATH . '/player/images/';
$target_file = $target_dir . $randomString . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

    $player->name = $_POST["username"];
    $player->imgUrl = $randomString . basename( $_FILES["image"]["name"]);
    
    $player->createPlayer();
    echo json_encode(array("success" => "player saved"));
} else {
    echo json_encode(array("fail" => "error"));
}




