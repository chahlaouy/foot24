<?php /* Template Name: get-single-user */ ?>

<?php


require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

$user = new User($db);


$user->cin = $_POST["cin"];
if($user->getUser()){
    echo json_encode(array("found" => "yes"));
}else{
    echo json_encode(array("found" => "no"));
}





