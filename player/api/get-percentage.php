<?php

/**headers */

header('Access-Control-Allow-Origin: *');
header('Content-Type: Application/json');

// define('DIGIGATE_DIR_PATH', untrailingslashit(get_template_directory()));
/** Initializing our api */
require_once(DIGIGATE_DIR_PATH . '/player/core/initialize.php');

/**Instantiate the Player Class */

$winner = new Winner($db);

/** query the players table */

$results = $winner->getPercentage();

/** get the number of rows */

$numberOfRows = $results->rowCount();

if ($numberOfRows > 0){
    $post_arr = array();
    $post_arr['data'] = array();

    while($row = $results->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $post_item = array(
            'id'    =>  $id,
            'publicPercentage' =>  $journalistPercentage,
            'journalistPercentage' =>  $journalistPercentage,
        );

        array_push($post_arr['data'], $post_item);
    }

    /** covert to json */
    echo json_encode($post_arr);
}else{
    echo json_encode(array('message' => 'erreur s il vous plais essayer plus tard'));
}