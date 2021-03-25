<?php /* Template Name: destroy-player */ ?>

<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the User Class */

$player = new Player($db);

$player->id = $_POST["id"];
if($player->destroyPlayer){
     echo json_encode(array('success' => 'success'));
}else{
    echo json_encode(array('fail' => 'fail'));

}






