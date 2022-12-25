<!DOCTYPE html>
<html lang="en">
<head>
    <style>

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
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet">   
    <script src="https://kit.fontawesome.com/e97edb3ba1.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management System</title>
    <link rel="stylesheet" href="../assets/output.css">
    <link rel="shortcut icon" href="crud.gif" type="image/x-icon">
</head>
<body>

    
<div class="bg-green-300">
    <h1 class=" font-extrabold text-2xl text-center p-3">User Management System</h1>
    
</div> 



   <div class=" mt-28 ml-96">
       <div class="flex ">
       <a href="./index.php" class=" p-4 rounded-md bg-green-300 shadow-md mt-7  decoration-none hover:bg-white ">All Users   <i class="fa-solid fa-user ml-1"></i></a>
       </div>
     
       <?php
       
       $DB_server = "localhost";
       $DB_name = "users";
       $DB_user_name = "bruno";
       $DB_user_password = "Bruno@1980";

       $search = $_POST['search'];

    $connect = mysqli_connect($DB_server,$DB_user_name,$DB_user_password,$DB_name);
       if(!$connect){
           echo mysqli_connect_error();
       }
       if ($connect) {
           echo "" ;
       }

       $query = mysqli_query($connect, "SELECT id,firstName,lastName,telephone,gender,nationality,username,email FROM mis_users WHERE username  = '$search'") or die("Error".mysqli_error());
       
    
       ?>
       
       
    <table class="mt-10 ">
        <tr class="bg-gray-800  ">
            <th class="p-4 text-white">ID</th>
            <th class="p-4 text-white">Username</th>
            <th class="p-4 text-white">First Name</th>
            <th class="p-4 text-white">Last Name</th>
            <th class="p-4 text-white">Telephone</th>
            <th class="p-4 text-white">Email</th>
            <th class="p-4 text-white">Gender</th>
            
            <th class="p-4 text-white">Nationality </th>
            <th class="p-4 text-white">Action</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($query)){?>
        <tr>
            <td><?=$row["id"]?></td>
            <td> <?=$row['username']?> </td>    
            <td><?=$row["firstName"]?></td>
            <td><?=$row["lastName"]?></td>
            <td><?=$row["telephone"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["gender"]?></td>
            
            <td><?=$row["nationality"]?></td>
            <td>
            <!-- <div class=" h-12 w-16 shadow-md" > <a href=""><i class="fa-solid fa-pencil  ml-5 mt-2  hover:text-green-500 text-2xl"></i></a> </div> -->
                <div class="flex gap-3">
                
                     
                    <div class="h-12 w-18 shadow-md bg-red-300 rounded-md "><h4 class="pt-3 px-2" ><?php echo "<a href=delete.php?userid=".$row["id"]  ."> Delete </a> "?> </h4></div>
                </div>
            </td>
        </tr>

        <?php }?>  

    </table>
   </div>


</body>
</html>