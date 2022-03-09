<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

 if ($password != $cpassword ){
     echo "please enter passwords that match";
 }else {
    
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
    $connect,"INSERT INTO mis_users(firstName, lastName,gender,telephone, nationality,email, username,password) VALUES ('$firstName','$lastName', '$gender','$telephone','$nationality','$email', '$username','$password')");
     if($connect){
    
       header("Location: index.php");
       exit();
    }else{
       echo "Error Occurred: ".mysqli_error($connect);
    }
    
   
  }
?>





