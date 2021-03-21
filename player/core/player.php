<?php

class Player{

    private $conn;
    private $table = 'players';

    public $id;
    public $name;
    public $imgUrl;
    public $score;
    public $numberOfPublicVotes;
    public $numberOfJournalistVotes;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getPlayers(){

        $query = 'select * from ' . $this->table . ' ORDER BY id DESC LIMIT 5';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function createPlayer(){

        /** Build the query */

        $query = 'INSERT INTO players (name, score, imgUrl, numberOfPublicVotes, numberOfJournalistVotes) 
           VALUES(:name, :score, :imgUrl, :numberOfPublicVotes, :numberOfJournalistVotes)';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->imgUrl = htmlspecialchars(strip_tags($this->imgUrl));
        $this->score = htmlspecialchars(strip_tags($this->score));
        $this->numberOfPublicVotes = htmlspecialchars(strip_tags($this->numberOfPublicVotes));
        $this->numberOfJournalistVotes = htmlspecialchars(strip_tags($this->numberOfJournalistVotes));

        /** binding of parameters */

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':imgUrl', $this->imgUrl);
        $stmt->bindParam(':score', $this->score);
        $stmt->bindParam(':numberOfPublicVotes', $this->numberOfPublicVotes);
        $stmt->bindParam(':numberOfJournalistVotes', $this->numberOfJournalistVotes);
        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        printf('error %s \n', $stmt->error);
    }
    public function updatePlayer(){

        /** Build the query */

        $query = 'UPDATE players (name, score, imgUrl, numberOfPublicVotes, numberOfJournalistVotes) 
           VALUES(:name, :score, :imgUrl, :numberOfPublicVotes, :numberOfJournalistVotes) WHERE id = :id';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->imgUrl = htmlspecialchars(strip_tags($this->imgUrl));
        $this->score = htmlspecialchars(strip_tags($this->score));
        $this->numberOfPublicVotes = htmlspecialchars(strip_tags($this->numberOfPublicVotes));
        $this->numberOfJournalistVotes = htmlspecialchars(strip_tags($this->numberOfJournalistVotes));

        /** binding of parameters */

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':imgUrl', $this->imgUrl);
        $stmt->bindParam(':score', $this->score);
        $stmt->bindParam(':numberOfPublicVotes', $this->numberOfPublicVotes);
        $stmt->bindParam(':numberOfJournalistVotes', $this->numberOfJournalistVotes);
        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        printf('error %s \n', $stmt->error);
    }

    

}