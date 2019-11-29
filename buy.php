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
    <title>Buy | Any device that you want!</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="icon.jpg">
</head>
<body>
    <?php
        $id = $_GET['id'];
        $sql = "SELECT * from laptop WHERE id=:id";
        $query = $conn->prepare($sql);
        $query->execute(array(':id'=>$id));

        while($dev=$query->fetch(PDO::FETCH_ASSOC))
        {
            $brand = $dev['Brand'];
            $model = $dev['Model'];
            $price = $dev['Price'];
        }
    ?>
    <form action="proccess.php" method="POST">
        
        <label for="Name">First Name:</label><br>
        <input type="text" name="buyerfname" id=""><br><br>
        <label for="Last">Last Name:</label><br>
        <input type="text" name="buyerlname" id=""><br><br>
        <label for="button">Payment Method:</label><br> 
            <button type="button" id="loan" class="btn btn-primary">installment</button>
            <button type="button" id="pay" onclick="pay()" class="btn btn-primary">Full Paid</button>
       <script>
           $(document).ready(function()
           {
               $("#loan").click(function(){
                   $(".loanform").show();
               });
               $("#pay").click(function(){
                   $(".loanform").hide();
               });
           });
          
       </script>
        </div>
        <div class="loanform">
            <p>If you want to purchase through installment, Please fill up this form</p>
           <label for="">Downpayment:</label><br>
           <input type="number" placeholder="minimum of Php 500" min=500><br><br>
           <label for="">Months to Pay:</label><br>
           <select name="mtp" id="">
               <option value="3">3 months</option>
               <option value="6">6 months</option>
               <option value="12">1 year</option>
               <option value="24">2 years</option>
               <option value="36">3 years</option>
           </select>
        </div>
        <hr>
        <h3>Your Item of Purchased</h3>
        <label for="">Brand:</label><p><?php echo $brand?></p>
        <label for="">Model:</label><p><?php echo $model?></p>
        <label for="">Price:</label><p><?php echo "Php ".number_format($price)?></p>

        <button onclick="pay()" type="submit" class="btn btn-primary">BUY</button>
    </form>
<script>
function pay()
{
    alert("are you sure?");
}
</script>
</body>
</html>