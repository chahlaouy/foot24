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
    public $totalScorePublic;
    public $totalScoreJournalist;
    public $showPlayer;



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

        $query = 'INSERT INTO players (name, scorePublic, scoreJournalist, imgUrl, numberOfPublicVotes, numberOfJournalistVotes, totalScorePublic, totalScoreJournalist, showPlayer) 
           VALUES(:name, 0, 0, :imgUrl, 0, 0, 0, 0, 0)';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->imgUrl = htmlspecialchars(strip_tags($this->imgUrl));

        /** binding of parameters */

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':imgUrl', $this->imgUrl);
        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        return false;
    }

    /** update public score */
    public function updatePlayerPublic(){

        /** Build the query */

        $query = 'UPDATE players SET  scorePublic = scorePublic + :scorePublic, numberOfPublicVotes = numberOfPublicVotes + 1, totalScorePublic= (scorePublic / numberOfPublicVotes), showPlayer= 0   WHERE id = :id';
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
        }
        return false;
    }

    /**update journalist score */
    public function updatePlayerJournalist(){

        /** Build the query */

        $query = 'UPDATE players SET  scoreJournalist = scoreJournalist + :scoreJournalist, numberOfJournalistVotes = numberOfJournalistVotes + 1, totalScoreJournalist= (scoreJournalist / numberOfJournalistVotes), showPlayer= 0   WHERE id = :id';
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



    public function updatePlayerWithNoImage(){

        /** Build the query */

        $query = 'UPDATE players SET name = :name WHERE id = :id';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));

        /** binding of parameters */

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        return false;
    }
    public function updatePlayerWithImage(){

        /** Build the query */

        $query = 'UPDATE players SET name = :name, imgUrl = :imgUrl WHERE id = :id';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->imgUrl = htmlspecialchars(strip_tags($this->imgUrl));

        /** binding of parameters */

        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':imgUrl', $this->imgUrl);

        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        return false;
    }



    public function destroyPlayer(){

        /** Build the query */

        $query = 'DELETE FROM players WHERE id = :id';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->id = htmlspecialchars(strip_tags($this->id));


        /** binding of parameters */

        $stmt->bindParam(':id', $this->id);
        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
       return false;
    }

    

}