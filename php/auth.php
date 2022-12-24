<?php 

if($_SESSION['username'] == null){
    $_SESSION['message'] = "You are not logged in";
    header("Location: error.php");
}else{
    $_SESSION['message'] = "You are logged in";
}
?>