<?php

/**headers */

header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');

// define('DIGIGATE_DIR_PATH', untrailingslashit(get_template_directory()));
/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the Player Class */

$player = new Player($db);

/** query the players table */

$results = $player->getPlayers();

/** get the number of rows */

$numberOfRows = $results->rowCount();

if ($numberOfRows > 0){
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $results->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id'    =>  $id,
            'name' =>  $name,
            'imgUrl' =>  $imgUrl,
            'score' =>  $score,
            'numberOfPublicVotes' =>  $numberOfPublicVotes,
            'numberOfJournalistVotes' =>  $numberOfJournalistVotes,
        );

        array_push($post_arr['data'], $post_item);
    }

    /** covert to json */
    echo json_encode($post_arr);
}else{
    echo json_encode(array('message' => 'No Players in data base'));
}