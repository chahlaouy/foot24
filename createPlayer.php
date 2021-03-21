<?php /* Template Name: create_player */ ?>

<?php

require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');
require_once(DIGIGATE_DIR_PATH . '/player/web/upload.php');

$player = new Player($db);



$target_dir = DIGIGATE_DIR_PATH . '/player/images/';
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
    // return $target_file;
    $player->name = $_POST["username"];
    $player->score = 0;
    $player->imgUrl = basename( $_FILES["image"]["name"]);
    $player->numberOfPublicVotes = 0;
    $player->numberOfJournalistVotes = 0;
    
    $player->createPlayer();
    echo json_encode(array("success" => "player saved"));
  } else {
    echo "Sorry, there was an error uploading your file.";
  }






// $file = $_FILES['image'];
// $temp = $file['tmp_name'];

// $path_to_upload = DIGIGATE_DIR_PATH . '/player/images/' . uniqid() . '.jpg';

// $image = file_get_contents($temp);

// $image= imagecreatefromstring($image);

// if($image){
//     imagejpeg($image, $path);
//     imagedestroy($image);

    

//     echo json_encode(array("success" => "player saved"));
// }else{
//     echo json_encode(array("fail" => "plz try again"));
    
// }


