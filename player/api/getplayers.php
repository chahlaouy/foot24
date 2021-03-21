<?php

/**headers */

header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');

/** Initializing our api */
include_once('../core/initialize.php');

/**Instantiate the Player Class */

$player = new Player($db);

/** query the players table */

$results = $post->getPlayers();

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
    }
}