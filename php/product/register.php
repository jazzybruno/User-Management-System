<?php

session_start();
require "../auth.php";

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

   $queryExecuted = mysqli_query($connect , "SELECT * FROM products WHERE prod_name = '$name'" ); 
    $data = mysqli_fetch_assoc($queryExecuted);
    if($data['name'] == $name){
        $_SESSION['message'] = "Product already exists";
        header("Location: ../../error.php");
    }else{
      $addQuery=mysqli_query(
        $connect,"INSERT INTO products(prod_name, added_time , quantity , user_register, unit_price , total_price) VALUES ('$name','$date', '$qty','$creator','$unit_price','$total_price')");
        if($addQuery){
            header("Location: index.php");
    }else{   
        $_SESSION['message'] = "Please try again";
        header("Location: ../../error.php");
    }
    
}

?>





