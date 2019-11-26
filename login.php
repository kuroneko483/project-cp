<?php
include_once("config.php");
session_start();
if(isset($_SESSION['tae']))
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
    <form action="register.php" method="POST" class="signup">
        <h3>Or are you new?</h3>
        <div class="form-group">
            <label for="">First name:</label><br>
            <input type="text" class="fnamereg" placeholder="first name" name="fname">
        </div>
        <div class="form-group">
            <label for="">Last name:</label><br>
            <input type="text" class="lnamereg" placeholder="last name" name="lname">
        </div>
        <div class="form-group">
            <label for="">Age:</label><br>
            <input type="text" class="agereg" placeholder="age" name="age">
        </div>
        <div class="form-group">
            <label for="">Gender:</label><br>
            <input type="radio" class="genreg" value="male" name="gender"><label>Male</label><br>
            <input type="radio" class="genreg" value="female" name="gender"><label>Female</label><br>
        </div>
        <div class="form-group">
            <label for="">username:</label><br>
            <input type="text" class="userreg" placeholder="new username" name="userreg">
        </div>
        <div class="form-group">
            <label for="">password:</label><br>
            <input type="password" class="pswdreg" placeholder="new password" name="pswdreg">
        </div>
        <button type="submit" name="register" class="btn btn-primary">Register</button>
    </form>
    </div>
</body>
</html>