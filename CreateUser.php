<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $mysqli = new mysqli("mysql.eecs.ku.edu", "c527g802", "rotaHea4", "c527g802");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $userName = $_POST['userName'];
    $query = "SELECT user_id FROM User WHERE user_id = '$userName'";
    $checkUsername = $mysqli->query($query);
    $insertUsername = "INSERT INTO User (user_id)
    VALUES ('$userName')";

    if($userName == ""){
        echo "<div class='alert alert-danger' role='alert'>";
        echo "<strong>Invalid Username</strong>";
        echo "</div>";
        die();
    } elseif (($checkUsername->num_rows != 0)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "<strong>Username already exists</strong>";
        echo "</div>";
    }

    if ($mysqli->query($insertUsername) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $insertUsername . "<br>" . $mysqli->error;
    }
    
    $mysqli->close();

?>
