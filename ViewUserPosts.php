<?php 
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $conn = new mysqli("mysql.eecs.ku.edu", "c527g802", "rotaHea4", "c527g802");

    /* check connection */
    if ($conn->connect_errno) {
        printf("Connect failed: %s\n", $conn->connect_error);
        exit();
    }
    $user = $_POST['userSelect'];
    $table = "SELECT content FROM Posts
    WHERE author_id = $user";
    $tableResult = $conn->query($table);

    echo "<link rel='stylesheet' href='styles.css' type='text/css'>";

    echo "<table class='userTable'>";
    echo "<tr>";
    echo "<th>Posts</th>";
    echo "<tbody>";
    echo "</tr>";

    if($tableResult->num_rows > 0){
        while($row = $tableResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td align='center'>" . $row['content'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "No posts have been created.";
    }

    echo "</tbody>";
    echo "</table>";

    $conn->close();
?>