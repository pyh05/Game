<?php

    session_start();

    $name = $_POST["name"];

    $made = $_POST["made"];


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "computer10";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT num, name, made, year, score FROM game where name = '$name' and made = '$made'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
       $name = $row["name"];
       $year = $row["year"];
       $score = $row["score"];
       $_SESSION["name"] = $name;
       echo "$name 의 발매일은 " .$year. "이고 평점은 " .$score. "점 입니다 <br>";
       echo "<a href='./logout.php'>다른정보</a><br>";
       echo "<a href='./list.php'>게임목록</a><br>";
    }
    } else {
    echo "레코드가 존재하지 않습니다";
    }

    mysqli_close($conn);
?>