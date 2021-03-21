<?php /* Template Name: create_player */ ?>

<?php

require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');
require_once(DIGIGATE_DIR_PATH . '/player/web/upload.php');

$player = new Player($db);

if (isset($_POST["name"])){

    $imgUrl = uploadFile();
    
    $player->name = $_POST["name"];
    $player->score = 0;
    $player->imgUrl = $imgUrl;
    $player->numberOfPublicVotes = 0;
    $player->numberOfJournalistVotes = 0;
    
    $player->createPlayer();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
    
        Select image to upload:
        <input type="text" name="name" id="name">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>