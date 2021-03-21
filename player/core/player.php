<?php

class Player{

    private $conn;
    private $table = 'players';

    public $id;
    public $name;
    public $imgUrl;
    public $scorePublic;
    public $scoreJournalist;
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

        $query = 'INSERT INTO players (name, scorePublic, scoreJournalist, imgUrl, numberOfPublicVotes, numberOfJournalistVotes) 
           VALUES(:name, :scorePublic, :scoreJournalist, :imgUrl, :numberOfPublicVotes, :numberOfJournalistVotes)';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->imgUrl = htmlspecialchars(strip_tags($this->imgUrl));
        $this->scorePublic = htmlspecialchars(strip_tags($this->scorePublic));
        $this->scoreJournalist = htmlspecialchars(strip_tags($this->scoreJournalist));
        $this->numberOfPublicVotes = htmlspecialchars(strip_tags($this->numberOfPublicVotes));
        $this->numberOfJournalistVotes = htmlspecialchars(strip_tags($this->numberOfJournalistVotes));

        /** binding of parameters */

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':imgUrl', $this->imgUrl);
        $stmt->bindParam(':scorePublic', $this->scorePublic);
        $stmt->bindParam(':scoreJournalist', $this->scoreJournalist);
        $stmt->bindParam(':numberOfPublicVotes', $this->numberOfPublicVotes);
        $stmt->bindParam(':numberOfJournalistVotes', $this->numberOfJournalistVotes);
        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        printf('error %s \n', $stmt->error);
    }

    /** update public score */
    public function updatePlayerPublic(){

        /** Build the query */

        $query = 'UPDATE players SET  scorePublic = scorePublic + :scorePublic, numberOfPublicVotes = numberOfPublicVotes + 1  WHERE id = :id';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->scorePublic = htmlspecialchars(strip_tags($this->scorePublic));

        /** binding of parameters */

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':scorePublic', $this->scorePublic);
        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        printf('error %s \n', $stmt->error);
    }

    /**update journalist score */
    public function updatePlayerJournalist(){

        /** Build the query */

        $query = 'UPDATE players SET  scoreJournalist = scoreJournalist + :scoreJournalist, numberOfJournalistVotes = numberOfJournalistVotes + 1 WHERE id = :id';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->scoreJournalist = htmlspecialchars(strip_tags($this->scoreJournalist));

        /** binding of parameters */

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':scoreJournalist', $this->scoreJournalist);
        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        printf('error %s \n', $stmt->error);
    }
    public function updatePlayer(){

        /** Build the query */

        $query = 'UPDATE players SET name = :name, score = :score, imgUrl = :imgUrl, numberOfPublicVotes = :numberOfPublicVotes, numberOfJournalistVotes = :numberOfJournalistVotes WHERE id = :id';
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

        $stmt->bindParam(':id', $this->id);
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