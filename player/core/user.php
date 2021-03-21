<?php

class User{

    private $conn;
    private $table = 'users';

    public $Id;
    public $name;
    public $cin;
    public $phone;

    public function __construct($db){
        $this->conn = $db;
    }

    public function createUser(){

        /** Build the query */

        // $query = "INSERT INTO" . $this->table . 'SET name = ?, cin = ?, phone = ?';

        $query = 'INSERT INTO users (name, cin, phone) 
           VALUES(:name, :cin, :phone)';

        /** prepare the statement */

        $stmt = $this->conn->prepare($query);

        /** clean the data coming from our form */

        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->cin = htmlspecialchars(strip_tags($this->cin));
        $this->phone = htmlspecialchars(strip_tags($this->phone));

        /** binding of parameters */

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':cin', $this->cin);
        $stmt->bindParam(':phone', $this->phone);
        
        if($stmt->execute()){
            printf('error %s \n', $stmt->error);
            return true;
            // echo json_encode(array('message' => 'Player added Succefully'));
        }
        
        printf('error %s \n', $stmt->error);
    }
}