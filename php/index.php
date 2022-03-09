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
       <a href="../form.html" class=" p-4 rounded-md bg-green-300 shadow-md mt-7  decoration-none hover:bg-white ">New user   <i class="fa-solid fa-user ml-1"></i></a>
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

       $query = mysqli_query($connect, "SELECT * FROM mis_users") or die("Error".mysqli_error());?>

       
    <table class="mt-10 ">
        <tr class="bg-gray-800  ">
            <th class="p-4 text-white">ID</th>
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
            <td><?=$row["user_id"]?></td>
            <td><?=$row["firstName"]?></td>
            <td><?=$row["lastName"]?></td>
            <td><?=$row["telephone"]?></td>
            <td><?=$row["email"]?></td>
            <td><?=$row["gender"]?></td>
            <td><?=$row["nationality"]?></td>
            <td>
                <div class="flex gap-3">
                    <div class=" h-12 w-16 shadow-md" > <a href=""><i class="fa-solid fa-pencil  ml-5 mt-2  hover:text-green-500 text-2xl"></i></a> </div>
                    <div class=" h-12 w-16 shadow-md"> <a href=""><i class="fa-solid fa-xmark ml-6  mt-2  hover:text-green-500 text-2xl "></i></a> </div>
                </div>
            </td>
        </tr>

        <?php }?>  

    </table>
   </div>


</body>
</html>