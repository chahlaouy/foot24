<?php

// define('DIGIGATE_DIR_PATH', untrailingslashit(get_template_directory()));

/**headers */

header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the Player Class */

$player = new Player($db);

/** Get Raw Posted Data */

$data = json_decode(file_get_contents('php://input'));

$player->name = $data->name;
$player->imgUrl = $data->imgUrl;

/** To Be continued */