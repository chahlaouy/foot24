<?php /* Template Name: update_player */ ?>

<?php

/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the User Class */

$player = new Player($db);
$player->id = $_POST["id"];
$player->id = $_POST["name"];

if($_POST['image'] == 'with-image'){

    if($player->updatePlayer()){
         echo json_encode(array('success' => 'success'));
    }else{
        echo json_encode(array('fail' => 'fail'));
    }
}else{

    if($player->updatePlayer()){
         echo json_encode(array('success' => 'success'));
    }else{
        echo json_encode(array('fail' => 'fail'));
    }
}





