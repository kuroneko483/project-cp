<?php
    include_once("config.php");
    session_start();
    $empfname ="";
    $emplname ="";
    $empage ="";
    $empgen ="";
    $empuser ="";
    $emppswd ="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Be a Member</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="icon.jpg">
</head>
<body>
    <?php
    if(isset($_POST['register']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $age = $_POST['age'];
        $gen = $_POST['gender'];
        $user = $_POST['userreg'];
        $pswd = $_POST['pswdreg'];

        if(empty($fname) || empty($lname) || empty($age) || empty($gen) || empty($user) || empty($pswd))
        {
            if(empty($fname))
            {
                $empfname = "Firstname is empty";
                echo $empfname . "<br/>";
            }
            if(empty($lname))
            {
                $empfname = "Lasttname is empty";
                echo $emplname . "<br/>";
            }
            if(empty($age))
            {
                $empage = "age is empty";
                echo $empage . "<br/>";
            }
            if(empty($gen))
            {
                $empgen = "select gender";
                echo $empgen . "<br/>";
            }
            if(empty($user))
            {
                $empuser = "username is empty";
                echo $empuser . "<br/>";
            }
            if(empty($pswd))
            {
                $emppswd = "password is empty";
                echo $emppswd . "<br/>";
            }
            $back = "<br/><a href='javascript:self.history.back();'>Go Back</a>"; 

            echo $back;
        }

        else
        {
            $sql = "INSERT INTO members(fname, lname, gender, age, username, password) VALUES(:fname, :lname, :gender, :age, :username, :password)";
		$query = $conn->prepare($sql);
                
        $query->bindparam(':fname', $fname);
        $query->bindparam(':lname', $lname);
        $query->bindparam(':gender', $gen);
		$query->bindparam(':age', $age);
		$query->bindparam(':username', $user);
		$query->bindparam(':password', $pswd);
		$query->execute();
         echo "<p>REGISTRATION COMPLETE!</p>";
        echo "Click <a href=\"login.php\">here</a> to Log-in";
        
        }
       
    }
    ?>
</body>
</html>