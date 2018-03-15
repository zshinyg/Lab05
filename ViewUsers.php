<?php 
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $servername = "mysql.eecs.ku.edu";
    $username = "c527g802";
    $password = "rotaHea4";
    $dbname = "myDB";
    //Connect to server
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $table = "SELECT user_id FROM Users";
    $tableResult = $conn->query($table);
    
    if($tableResult->num_rows > 0){
        while($row = $tableResult->fetch_assoc()) {
            echo $row['user_id'] . "<br>";
        }
    } else {
        echo "No usernames have been created.";
    }

    $conn->close();
?>