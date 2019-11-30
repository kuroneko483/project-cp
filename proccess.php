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
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['buy']))
        {
            $fname = $_POST['buyerfname'];
            $lname = $_POST['buyerlname'];
            $down = $_POST['downpay'];
            $mtp = $_POST['mtp'];
            $brand = $_POST['brand'];
            $model = $_POST['model'];
            $proprice = $_POST['proprice'];

            if(empty($mtp) && empty($down))
            {

            }
            else if(!empty($mtp) && !empty($down))
            {
                function loan($pdown,$pmtp,$pprice)
                {
                    $interest = "";
                    if($pmtp == 3)
                    {
                        $interest = 0;
                    }
                    else if($pmtp == 6)
                    {
                        $interest = 25;
                    }
                    else if($pmtp == 12)
                    {
                        $interest = 50;
                    }

                    else if($pmtp == 24)
                    {
                        $interest = 75;
                    }

                    else if($pmtp == 36)
                    {
                        $interest = 100;
                    };
                    $interestvalue = $interest/100;
                    $remainingbalance = $pprice - $pdown;
                    $monthlypayment = $remainingbalance / $pmtp;
                    $interestpermonth = $monthlypayment * $interestvalue;
                    $totalpayment = $monthlypayment + $interestpermonth;
                    
                    return $loanresult = array("int"=>$interest."%","down"=>"Php ".number_format($pdown),"price"=>"Php ".number_format($pprice),"taop"=>"Phpp ".number_format($totalpayment));
                }

                echo loan($down,$mtp,$proprice);
                $int = $loanresult["int"];
                $down = $lonaresult["down"];
            }

        }
    ?>
</body>
</html>