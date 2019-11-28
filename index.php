<?php
include_once("config.php");
session_start();
    if(isset($_SESSION['login']))
    {
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

    $user = $query->fetch(PDO::FETCH_ASSOC);

    
    ?> 
    <h1 class="greeting" style="float:left; width: 25%; text-align: center;font-family: verdana">WELCOME BACK! <?php echo $user['fname']?> </h1>
    <div class="navigation">
        <ul>
            <li>
                <a href="index.php">HOME</a>
            </li>
            <li>
                <a href="">SHOP</a>
                <ul>
                    <li>
                        <a href="laptop.php">LAPTOPS</a>
                    </li>
                    <li>
                        <a href="cellphone.php">MOBILE PHONES</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="">YOU</a>  
                <ul>
                    <li>
                        <a href="edit.php">EDIT INFO</a>
                    </li>
                    <li>
                        <a href="logout.php">LOG OUT</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <center>
        <div class="left">
            
        </div>
        <div class="body"> 

        </div>
        <div class="right">
            
        </div>
        <div class="footer">
            
        </div>
    </center>
    </div>
</body> 
</html>