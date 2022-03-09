<?php
$id = $_GET['userid'];
$DB_server = "localhost";
   $DB_name = "users";
   $DB_user_name = "bruno";
   $DB_user_password = "Bruno@1980";
$connect = mysqli_connect($DB_server,$DB_user_name,$DB_user_password,$DB_name);
   if(!$connect){
       echo mysqli_connect_error();
   }
   if ($connect) {
    //    echo "Database connected" ;
   }

   $addQuery=mysqli_query(
    $connect,"DELETE FROM  mis_users WHERE  user_id = '$id'");
   
if($connect){
    header("Location: index.php");
    exit();


}
else{
   echo "Error Occurred: ".mysqli_error();
}

?>