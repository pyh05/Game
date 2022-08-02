<?php
    session_start();

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
       $name = $row["name"];
       $year = $row["year"];
       $score = $row["score"];
    }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게임정보</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./style.css" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js" defer></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js" defer></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    <!-- <a href="#" data-toggle="modal" data-target="#login-modal">Login</a> -->
    <div class="listmodal-container">
        <h1>게임정보</h1><br>
        <?php
            if(isset($_SESSION["name"])){
                // header( 'Location: / member/loginok.php' );
                echo $_SESSION["name"]."의 발매일은 " .$year. "이고 평점은 " .$score. "점 입니다 <br>";
                echo "<a href= './logout.php'>다른정보</a>";
            }else {
        ?>
        <form action="./loginok.php" method="post">
            <input type="text" name="name" placeholder="이름">
            <input type="text" name="made" placeholder="제작사">
            <input type="submit" name="login" class="login loginmodal-submit" value="정보확인">
        </form>

        <div class="login-help">
            <a href="./register.html">게임등록</a>
        </div>
        <?php
            }
        ?>
    </div>
</body>

</html>