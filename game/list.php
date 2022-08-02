<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게임 목록</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./style.css" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js" defer></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js" defer></script>
</head>
<body>
<div class="listmodal-container">
<?php
    echo "<h1>게임목록</h1>";
    
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

    $sql = "SELECT num, name, made, year, score FROM game";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<div> 일련번호 : " . $row["num"]. " - 이름 : " . $row["name"]. " - 제작사 : " . $row["made"]. " - 발매일 : " . $row["year"] . " - 평점 : " . $row["score"] . "<br>" . "<a href='./deleteok.php?num=" . $row['num'] . "'>[삭제]</a>" . "<a href='./updata.php?num= " . $row['num'] . "'>[수정]</a>" . "</div>";
    }
    } else {
    echo "레코드가 존재하지 않습니다";
    }

    mysqli_close($conn);
?>

    <div>
        <a href="./login.php">홈으로</a>
        <a href="./register.html">게임등록</a>
    </div>
</div>
</body>
</html>