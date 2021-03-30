<?php /* Template Name: get-single-user */ ?>

<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

$data = json_decode(file_get_contents('php://input'));

$user = new User($db);


$user->cin = $data->cin;
if($user->getUser()){
    echo json_encode(array("found" => "yes"));
}else{
    echo json_encode(array("found" => "no"));
}





