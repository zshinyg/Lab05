<?php 
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $conn = new mysqli("mysql.eecs.ku.edu", "c527g802", "rotaHea4", "c527g802");

    /* check connection */
    if ($conn->connect_errno) {
        printf("Connect failed: %s\n", $conn->connect_error);
        exit();
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