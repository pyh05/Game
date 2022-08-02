<?php
    $num = $_POST["num"];
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

    $sql = "UPDATE game SET name='$name', made = '$made', year = '$year', score = '$score' WHERE num = " . $num;

    if (mysqli_query($conn, $sql)) {
    echo "정보가 수정되었습니다";
    } else {
    echo "정보 수정에 오류가 있습니다 : " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>

<div>
    <a href="./list.php">게임목록</a>
    <a href="./register.html">게임등록</a>
</div>