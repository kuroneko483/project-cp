<?php
    include_once("config.php");
    session_start();

    $emptyuser = "";
    $emptypswd = "";
    if(isset($_POST['login']))
    {
        $user = $_POST['user'];
        $pswd = $_POST['pswd'];

    if(empty($user) || empty($pswd))
    {
        if(empty($user))
        {
            $emptyuser = "your username is empty";
        }
        if(empty($pswd))
        {
            $emptypswd = "your password is empty";
        }
    }
    else
    {
        $sql = "select * from aicsdb.members where username = :puser AND password = :ppswd";
        $query = $conn -> prepare($sql);
        $query -> bindParam(':puser', $user);
        $query -> bindParam(':ppswd', $pswd);
        $query -> execute();

        $result = $conn->query("SELECT * FROM members ORDER BY id DESC");
        $user = $query->fetch(PDO::FETCH_ASSOC);
        $count = $query->rowCount();

        if($count > 0)
        {
            $_SESSION['login'] = $user['ID'];
            header("location:index.php");
        }
    } 
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wrong Username or Password | Try Again!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="icon.jpg">
</head>
<body>
    <div class="container">
        <form action="tryagain.php" method="POST">
            <div class="text-center" id="try">
                <p>We've Detected that the username or password that you inputted doesn't match to any existing account</p>
                <p>Please try again!</p>
                <label for="user">username:</label><br>
                <input type="text" name="user" placeholder="enter username" class="user">
                <p style="color:red"><?php echo "$emptyuser" ?><br></p>

                <label for="pswd">password:</label><br>
                <input type="password" name="pswd" placeholder="enter password" class="pswd">
                <p style="color:red"><?php echo "$emptypswd" ?><br></p>

            <button type="submit" name="login" class="btn btn-primary">LOG IN</button>
            </div>
        </form>
    </div>
</body>
</html>