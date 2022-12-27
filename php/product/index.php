<?php 
session_start() ;
require "../auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>

        .text{
            border : 2px solid black;
            height : 60px;
            margin-left : 1200px;
            margin-top : 100px;
            font-size: 15px;
            font-weight: 800;
            padding-left: 10px;
            
        }

        *{
            font-family: 'Poppins', sans-serif;
        }
        table, th , td{
            border-bottom: 3px solid rgba(212, 229, 233, 0.808);
        }

        td{
            padding-left: 40px;
        }
        th{
            padding-left: 20px;
        }
        
    .main-header-contanier{
     width: 100%;
     padding: 10px;
     display: flex;
     justify-content: space-between;
    }

    .main-header-text{

    }

    .main-header-user-info{
        display: flex;
        align-items: center;
        flex-direction: row;
        gap: 10px;
    }

    .main-header-user-info > div > img{
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-bottom: 10px;
        object-fit : cover;
    }

    .out{
        color: aliceblue;
        font-weight: 600;
        cursor: pointer;
    }
    </style>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">   
    <script src="https://kit.fontawesome.com/e97edb3ba1.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="../../assets/output.css">
    <link rel="shortcut icon" href="crud.gif" type="image/x-icon">
</head>
<body>

    
   <div class="main-header-contanier bg-green-300">
             <div class="main-header-text  font-extrabold text-2xl text-center p-3">Product Managemnt System</div>
             <div class="main-header-user-info">
                <div> 
                    <img src="../../user.png" alt="">
                </div>
                <div>
                    <div class="main-header-user-name">
                        <?php 
                            echo $_SESSION['firstName']." ".$_SESSION['lastName'];
                        ?>
                        
                    </div>
                    <div>
                        <a href="./logout.php"><p class="out">Logout</p></a>

                    </div>
                </div>
             </div>
   </div>

<div class="">
<form action="./search.php"  method="POST">
      <!-- <label class="font-bold text-right" >Search by username</label><br><br>   -->
      <input type="text" class="text text-xl  rounded-md "  name="search" >
      <input type="submit" value="Search" class="bg-green-300  ml-3 p-4 rounded-md " >
</form>
    </div>


   <div class=" mt-16 ml-96">
       <div class="flex ">
       <a href="./add.php" class=" p-4 rounded-md bg-green-300 shadow-md mt-7  decoration-none hover:bg-white ">New Product</a>
       </div>
     
       <?php
       
       $DB_server = "localhost";
       $DB_name = "users";
       $DB_user_name = "bruno";
       $DB_user_password = "Bruno@1980";
    $connect = mysqli_connect($DB_server,$DB_user_name,$DB_user_password,$DB_name);
       if(!$connect){
           echo mysqli_connect_error();
       }
       if ($connect) {
           echo "" ;
       }
        $email = $_SESSION['email'];
       $query = mysqli_query($connect, "SELECT * FROM products WHERE user_register = '$email' ") or die("Error".mysqli_error());?>


    <table class="mt-10 ">
        <tr class="bg-gray-800  ">
            <th class="p-4 text-white">ID</th>
            <th class="p-4 text-white">Name</th>
            <th class="p-4 text-white">Added</th>
            <th class="p-4 text-white">Quantity</th>
            <th class="p-4 text-white">Unit Price</th>
            <th class="p-4 text-white">Total Price</th>
            
            <th class="p-4 text-white">Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($query)){?>
        <tr>
            <td><?=$row["prod_id"]?></td>
            <td> <?=$row['prod_name']?> </td>    
            <td><?=$row["added_time"]?></td>
            <td><?=$row["quantity"]?></td>
            <td><?=$row["unit_price"]?></td>
            <td><?=$row["total_price"]?></td>            
            <td>
            
                <div class="flex gap-3">
                
                    <div class="h-12 w-18 shadow-md bg-green-300 rounded-md "><h4 class="pt-3 px-2" ><?php echo "<a href=prodEdit.php?prodid=".$row['prod_id']  ."> Update</a> "?> </h4></div>
                    <div class="h-12 w-18 shadow-md bg-red-300 rounded-md "><h4 class="pt-3 px-2" ><?php echo "<a href=delete.php?prodid=".$row['prod_id']  ."> Delete </a> "?> </h4></div>
                </div>
            </td>
        </tr>

        <?php }?>  

    </table>
   </div>


</body>
</html>