<?php

// define('DIGIGATE_DIR_PATH', untrailingslashit(get_template_directory()));

/**headers */

header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the User Class */

$user = new user($db);

/** Get Raw Posted Data */

$data = json_decode(file_get_contents('php://input'));

$user->name = $data->name;
$user->phone = $data->phone;
$user->cin = $data->cin;


if ($user->createUser()){
    echo json_encode(array('message' ,'user Created Successfully'));
}else{
    echo json_encode(array('message' ,'there wa an error'));
}
/** To Be continued */