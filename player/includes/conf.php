<?php
// Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();


    // $servername = "localhost";
    // $username = "foot24-admin";
    // $password = 'P@$$w0rdFOOT24';
    // $dbname = "api_foot24";
    $servername = "localhost";
    $username = "root";
    $password = '';
    $dbname = "laravel";


    $db = new PDO('mysql:host=localhost;dbname=' . $dbname . ';charset=utf8', $username, $password);


    // set attributes

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


?>