<?php
include_once("config.php");
session_start();
    if(isset($_SESSION['login']))
    {
         echo "<h1> WELCOME TO MOBILE LEGEND!</h1>";
    }
    else
    {
       header("location:login.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="icon.jpg">
</head>
<body>
    <div>
    <?php
    $sql = "SELECT * from members WHERE id = :id";
    $query = $conn -> prepare($sql);
    $query->bindParam(':id', $_SESSION['login']);
    $query->execute();

    $result = $conn->query("SELECT * FROM members ORDER BY id DESC");
    $user = $query->fetch(PDO::FETCH_ASSOC);

    
    ?>
    <h1>welcome back! <?php echo $user['fname']?> </h1>
        <ul>
        <li>

        </li>
        </ul>
    </div>
    <a href="logout.php">log-out</a>
</body> 
</html>