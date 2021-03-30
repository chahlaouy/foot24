<?php

class Winner{

    private $conn;
    private $table = 'winners';

    public $id;
    public $winnerName;
    public $imgUrl;
    public $score;

    public $publicPercentage;
    public $journalistPercentage; 



    public function __construct($db){
        $this->conn = $db;
    }

    public function getWinners(){

        $query = 'select * from ' . $this->table . ' ORDER BY id DESC LIMIT 5';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function getPercentage(){

        $query = 'select * from percentage ORDER BY id DESC LIMIT 1';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    public function createWinner(){ 

        /** Build the query */

        $query = 'INSERT INTO winners (winner_name, img_url, score) 
           VALUES(:winnerName, :imgUrl, :score)';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->imgUrl = htmlspecialchars(strip_tags($this->imgUrl));

        /** binding of parameters */

        $stmt->bindParam(':winnerName', $this->winnerName);
        $stmt->bindParam(':imgUrl', $this->imgUrl);
        $stmt->bindParam(':score', $this->score);
        
        if($stmt->execute()){

            $query2 = 'DELETE from players';
            $stmt2 = $this->conn->prepare($query2);
            if($stmt2->execute()){

                return true;
            }else{
                return false;
            }
        }
        
        return false;
    }

    public function updatePercentage(){

        // $query = 'DELETE * FROM percentage';
        // $stmt = $this->conn->prepare($query);
        // $stmt->execute();
        // $query = 'INSERT INTO percentage (publicPercentage, journalistPercentage) 
        //    VALUES(:publicPercentage, :journalistPercentage)';
        $query = 'UPDATE percentage SET publicPercentage = :publicPercentage, journalistPercentage = :journalistPercentage WHERE id = 1';
        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->publicPercentage = htmlspecialchars(strip_tags($this->publicPercentage));
        $this->journalistPercentage = htmlspecialchars(strip_tags($this->journalistPercentage));

        /** binding of parameters */

        $stmt->bindParam(':publicPercentage', $this->publicPercentage);
        $stmt->bindParam(':journalistPercentage', $this->journalistPercentage);

        
        if($stmt->execute()){
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        return false;
    }
}