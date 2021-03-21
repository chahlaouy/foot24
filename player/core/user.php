<?php

class Player{

    private $conn;
    private $table = players;

    public $Id;
    public $name;
    public $cin;
    public $phone;

    public function __construct($db){
        $this->conn = $db;
    }

    public function getPlayers(){

        $query = 'select * from ' . $this->table . ' ORDER BY id ASC LIMIT 5';

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}