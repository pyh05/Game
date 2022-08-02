<?php
    $num = $_GET["num"];
    

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

    $sql = "SELECT num, name, made, year, score FROM game where num = " . $num;

    // echo $sql;

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    ($row = mysqli_fetch_assoc($result)); 

    $num = $row["num"];
    $name = $row["name"];
    $made = $row["made"];
    $year = $row["year"];
    $score = $row["score"];
    }
    
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정보 수정</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="./style.css" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js" defer></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js" defer></script>
    <!------ Include the above in your HEAD tag ---------->
</head>

<body>
    <!-- <a href="#" data-toggle="modal" data-target="#login-modal">Login</a> -->
    <div class="loginmodal-container">
        <h1>게임 정보 수정</h1><br>
        <form action="./updataok.php" method="post">
            <input type="hidden" name="num" value="<?php echo $num;?>">
            <input type="text" name="name" placeholder="이름" value = "<?php echo $name; ?>">
            <input type="text" name="made" placeholder="제작사" value = "<?php echo $made; ?>">
            <input type="text" name="year" placeholder="발매일" value = "<?php echo $year; ?>">
            <input type="text" name="score" placeholder="평점" value = "<?php echo $score; ?>">
            <input type="submit" name="login" class="login loginmodal-submit" value="수정">
        </form>
    </div>
</body>

</html>