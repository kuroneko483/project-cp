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
    <title>Laptops | for sale</title>
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

    $laptop = $conn->query("SELECT * FROM laptop ORDER BY id DESC");
    
    ?> 
    <h1 class="greeting" style="float:left; width: 25%; text-align: center;font-family: verdana">LAPTOP SECTION</h1>
    <div class="navigation">
        <ul>
            <li>
                <a class="btn btn-primary" href="index.php">HOME</a>
            </li>
            <li>
                <a class="btn btn-primary" href="#">SHOP</a>
                <ul>
                    <li>
                        <a class="btn btn-primary" href="laptop.php">LAPTOPS</a>
                    </li>
                    <li>
                        <a class="btn btn-primary" href="cellphone.php">MOBILE PHONES</a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="btn btn-primary" href="#">YOU</a>  
                <ul>
                    <li>
                        <a class="btn btn-primary" href="edit.php">EDIT INFO</a>
                    </li>
                    <li>
                        <a class="btn btn-primary" href="logout.php">LOG OUT</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <center>
        <div class="left">
            
        </div>
        <div class="body"> 

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>BRAND</th>
                    <th>MODEL</th>
                    <th>PRICE</th>
                    <th><a class="btn btn-primary" href="">ADD</a></th>
                </tr>
            </thead>
            <?php
                while($dev = $laptop->fetch(PDO::FETCH_ASSOC))
                {

                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>".$dev['Brand']."</td>";
                            echo "<td>".$dev['Model']."</td>";
                            echo "<td> Php ".number_format($dev['Price'])."</td>";
                            echo "<td><a class=\"btn btn-primary\" href= \"buy.php?id=".$dev['id']."\">BUY</a></td>";
                        echo "</tr>";
                    echo "</tbody>";
                }
            ?>
        </table>
            
        </div>
        <div class="right">
            
        </div>
        <div class="footer">
            
        </div>
    </center>
    </div>
</body> 
</html>