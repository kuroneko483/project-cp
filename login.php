<?php
include_once("config.php");
session_start();
if(isset($_SESSION['login']))
{
    header("location:index.php");
}
?>
<?php
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
                        $emptyuser = "username is empty!";
                    }
                if(empty($pswd))
                    {
                        $emptypswd = "password is empty!";
                    }
            }
        else
            {
            $sql = "select * from aicsdb.members where username = :username AND password = :password";
            $query = $conn -> prepare($sql);
            $query -> bindParam(':username', $user);
            $query -> bindParam(':password', $pswd);
            $query -> execute();

            $result = $conn->query("SELECT * FROM members ORDER BY id DESC");
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $count = $query->rowCount();
            if($count > 0)
                {
                    $_SESSION['login'] = $user['ID'];
                    header("location:index.php");
                }
                else
                {
                    header("location:tryagain.php");
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
    <title>Log In</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="icon.jpg">
    
</head>
<body>

    <div class="container">
    <form action="login.php" class="login" method="POST">
    <h3>Are you a member already?</h3>
        <div class="form-group">
            <label for="">Enter username:</label><br>
            <input type="text" class="user" placeholder="Enter username" name="user">
           <p style="color:red"><?php echo "$emptyuser" ?><br></p>
        </div>
        <div class ="form-group">
            <label for="">Enter password:</label><br>
            <input type="password" class="pswd" class="username" name="pswd" placeholder="Enter password">
            <p style="color:red"><?php echo "$emptypswd" ?><br></p>
        </div>
        <button type="submit" name="login" class="btn btn-primary">Log-In</button>
    </form>
    <a href="register.html">Sign-up</a>
    </div>
</body>
</html>