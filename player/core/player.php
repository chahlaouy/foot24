<?php

class Player{

    private $conn;
    private $table = 'players';

    public $Id;
    public $name;
    public $imgUrl;
    public $score;
    public $numberOfPublicVotes;
    public $numberOfJournalistVotes;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getPlayers(){

        $query = 'select * from ' . $this->table . ' ORDER BY id ASC LIMIT 5';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function createPlayer(){

        /** Build the query */

        $query = 'INSERT INTO' . $this->table . 'SET name = :name , imgUrl = :imgUrl , score = :score , numberOfPublicVotes = :numberOfPublicVotes , numberOfJournalistVotes = :numberOfJournalistVotes';

        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->imgUrl = htmlspecialchars(strip_tags($this->imgUrl));
        $this->score = htmlspecialchars(strip_tags($this->score));
        $this->numberOfPublicVotes = htmlspecialchars(strip_tags($this->numberOfPublicVotes));
        $this->numberOfJournalistVotes = htmlspecialchars(strip_tags($this->numberOfJournalistVotes));

        /** binding of parameters */

        $stmt->binParam(':name', $this->name);
        $stmt->binParam(':imgUrl', $this->imgUrl);
        $stmt->binParam(':score', $this->score);
        $stmt->binParam(':numberOfPublicVotes', $this->numberOfPublicVotes);
        $stmt->binParam(':numberOfJournalistVotes', $this->numberOfJournalistVotes);

        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }

        printf('error %s \n', $stmt->error);
    }

    /** update the player */

    public function updatePlayer(){

    }

}