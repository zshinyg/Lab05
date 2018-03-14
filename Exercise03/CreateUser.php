<?php
    $mysq = new mysqli("mysql.eecs.ku.edu", "c527g802", "rotaHea4", "c527g802");

    /* check connection */
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }

    $userName = $_POST["userName"];

    if($userName == ""){
        echo "<div class='alert alert-danger' role='alert'><strong>Invalid Username</strong></div>";
    }




?>