<?php
    $name = $_POST["name"];

    $made = $_POST["made"];

    $year = $_POST["year"];

    $score = $_POST["score"];



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

    $sql = "INSERT INTO game (name, made, year, score)
    VALUES ('$name', '$made', '$year','$score')";

    if (mysqli_query($conn, $sql)) {
    echo "데이터가 저장되었습니다.";
    } else {
    echo "오류 : " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    echo "<br>";
    
?>
<div>
    <a href='./login.php'>홈으로</a>
    <a href='./list.php'>게임목록</a>
</div>