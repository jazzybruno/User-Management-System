<?php

session_start();
require "../auth.php";

$id = $_POST['prod_id'];
$name = $_POST['name'];
$qty = $_POST['quantity'];
$unit_price = $_POST['unit_price'];
$creator = $_SESSION['email'];
$total_price = $qty * $unit_price;
$date = date("Y-m-d H:i:s");

  $DB_server = "localhost";
   $DB_name = "users";
   $DB_user_name = "bruno";
   $DB_user_password = "Bruno@1980";
$connect = mysqli_connect($DB_server,$DB_user_name,$DB_user_password,$DB_name);
   if(!$connect){
       echo mysqli_connect_error();
   }
   if ($connect) {
       echo "Database connected" ;
   }

      $addQuery=mysqli_query(
        $connect,"UPDATE products SET prod_name = '$name' , quantity='$qty' , unit_price='$unit_price' , total_price='$total_price' WHERE prod_id = '$id'");
        if($addQuery){
            header("Location: index.php");
    }else{   
        $_SESSION['message'] = "Please try again";
        header("Location: ../../error.php");
    }
    ?>





