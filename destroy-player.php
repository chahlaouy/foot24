<?php /* Template Name: destroy-player */ ?>

<?php

/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the User Class */

$player = new Player($db);

$player->id = $_POST["id"];
if($player->destroyPlayer()){
     echo json_encode(array('success' => 'success'));
}else{
    echo json_encode(array('fail' => 'fail'));

}






