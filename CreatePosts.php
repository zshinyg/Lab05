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
    $queryUser = "SELECT user_id FROM Users WHERE user_id = '$userName'";
    $checkUsername = $mysqli->query($queryUser);

    $postID = "int NOT NULL AUTO_INCREMENT";
    $userPost = $_POST['userPost'];
    $insertPost = "INSERT INTO Posts (post_id, content, author_id)
    VALUES ('$postID','$userPost', '$userName')";
    $query = "SELECT content FROM Post WHERE content = '$userPost'";


    if($userName == ""){
        echo "<div class='alert alert-danger' role='alert'>";
        echo "<strong>Invalid Username</strong>";
        echo "</div>";
        die();
    } elseif (($checkUsername->num_rows == 0)) {
        echo "<div class='alert alert-danger' role='alert'>";
        echo "<strong>Username does not exist</strong>";
        echo "</div>";
        die();
    }

    if($userPost == ""){
        echo "You must post something.";
        die();
    }


    if ($mysqli->query($insertPost) === TRUE) {
        echo "New post created successfully";
    } else {
        echo "Error: " . $insertUsername . "<br>" . $mysqli->error;
    }

    $mysqli->close();

?>
