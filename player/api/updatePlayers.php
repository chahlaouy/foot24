
<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the User Class */

$player = new Player($db);

/** Get Raw Posted Data */

$data = json_decode(file_get_contents('php://input'));

// echo json_encode(array('data' => $data));

foreach ($data as $item){ 

    echo json_encode(array('success' => $item->scorePublic));
    $player->scorePublic = $item->scorePublic;
    $player->id = $item->id;
    
    $res = $player->updatePlayerPublic($player);
}
if($res){
     echo json_encode(array('success' => 'success'));
}else{
    echo json_encode(array('fail' => 'fail'));

}


