
<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
    
  $DB_server = "localhost";
   $DB_name = "users";
   $DB_user_name = "bruno";
   $DB_user_password = "Bruno@1980";
$connect = mysqli_connect($DB_server,$DB_user_name,$DB_user_password,$DB_name);
   if(!$connect){
       echo mysqli_connect_error();
   }
   if ($connect) {
   }
      //verify if the user is the true owner
      $queryExecuted = mysqli_query($connect , "SELECT * FROM mis_users WHERE email = '$email'" );
      $data = mysqli_fetch_assoc($queryExecuted);
      $newPassword = $data['password'];
      if($newPassword != $password){
         $_SESSION['message'] = "Invalid email or password";
         header("Location: error.php");
      }else{
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $data['username'];
        $_SESSION['firstName'] = $data['firstName'];
         $_SESSION['lastName'] = $data['lastName'];

         header("Location: ./product/index.php");
      }
?>





