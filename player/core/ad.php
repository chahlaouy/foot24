<?php

class Ad{

    public $îd;
    public $url;
    public $imgUrl;

    private $conn;
    private $table = 'ads';


    public function __construct($db){
        $this->conn = $db;
    }

    public function createAd(){

        /** Build the query */

        // $query = "INSERT INTO" . $this->table . 'SET name = ?, cin = ?, phone = ?';

        $query = 'INSERT INTO ads (url, imgUrl, nbreOfVisitors) 
           VALUES(:url, :imgUrl, 1)';

        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->url = htmlspecialchars(strip_tags($this->url));
        $this->imgUrl = htmlspecialchars(strip_tags($this->imgUrl));
      

        /** binding of parameters */

        $stmt->bindParam(':url', $this->url);
        $stmt->bindParam(':imgUrl', $this->imgUrl);
        
        if($stmt->execute()){
            printf('error %s \n', $stmt->error);
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        printf('error %s \n', $stmt->error);
    }

    public function getAd(){

        $query = 'select * from ' . $this->table . ' ORDER BY id DESC LIMIT 1';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}