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
            }
            if(empty($lname))
            {
                $empfname = "Lasttname is empty";
            }
            if(empty($age))
            {
                $emp = "age is empty";
            }
            if(empty($gen))
            {
                $empgen = "select gender";
            }
            if(empty($user))
            {
                $empuser = "username is empty";
            }
            if(empty($pswd))
            {
                $emppswd = "password is empty";
            }
            $back = "<br/><a href='javascript:self.history.back();'>Go Back</a>";
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
        }
        header("location:index.php");
        
    }
    ?>
</body>
</html>