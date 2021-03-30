<?php /* Template Name: update_player */ ?>

<?php

header('Access-Control-Allow-Origin: *'); 
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the User Class */
$data = json_decode(file_get_contents('php://input'));

$player = new Player($db);
$player->id = $data->id;
$player->name = $data->name;

if($data->image == 'no-image'){

    if($player->updatePlayerWithNoImage()){
         echo json_encode(array('success' => 'success'));
    }else{
        echo json_encode(array('fail' => 'fail'));
    }
}





