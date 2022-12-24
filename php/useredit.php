<?php 
session_start() ;
require "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
         *{
            font-family: 'Poppins', sans-serif;
        } 
        .user{
            margin-top: 30px;
        }

        input{
            border-top: none;
            border-bottom: 2px !important;
            border-color: black !important;
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
    <title>New User</title>
    <link rel="stylesheet" href="../assets/output.css">
    <link rel="shortcut icon" href="crud.gif" type="image/x-icon">

</head>
<body>
    
<div class="main-header-contanier bg-green-300">
             <div class="main-header-text  font-extrabold text-2xl text-center p-3">Product Managemnt System</div>
             <div class="main-header-user-info">
                <div> 
                    <img src="../user.png" alt="">
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
    
    <div class=" mt-24   ml-48">
        <div class="flex ">
        <a href= ./index.php class=" p-4 rounded-md bg-green-300 shadow-md mt-0  decoration-none hover:bg-white ">All users  <i class="fa-solid fa-user ml-1"></i></a>
        </div>
       
            <div class="user mt-5">
                      <h1 class="text-2xl text-center"> Update User </h1>
                      <h2 class=" font-thin text-gray-600  text-center ">Use the form bellow to update a  user</h2>
                      <form action="update.php" method="post">
 
                                         <!-- database connection                       -->
                          <?php
                           
                           
                           
                                $DB_server = "localhost";
                                $DB_name = "users";
                                $DB_user_name = "bruno";
                                $DB_user_password = "Bruno@1980";
                             $connect = mysqli_connect($DB_server,$DB_user_name,$DB_user_password,$DB_name);
                                if(!$connect){
                                    echo mysqli_connect_error();
                                }
                                if($connect) 
                                   {
                                    $id = $_GET['userid'];
                                    
                                    $query = mysqli_query($connect , "SELECT * From mis_users where id= '$id'  ");
                                    if(!$query) {
                                       echo mysqli_query_error();
                                    }else{
                                    
                                        
                                        while($row=mysqli_fetch_assoc($query)){
                                            
                                        


                            ?>


                       <div class="mx-96 mt-9">
                        <div class="flex gap-60 align-middle">
                            <input type="hidden"  value="<?php echo $row["id"];?>" name="user">
                            <div class="flex flex-col"><label >First Name</label><input value="<?php echo $row["firstName"];?>" required name="firstName" class="w-80 h-10 mt-2  p-4  shadow-lg  border-gray-800 " type="text" placeholder="Enter First Name"></div>
                            <div class="flex flex-col "><label >Last Name</label><input    required  name="lastName" class="w-96 h-10 mt-2  p-4 shadow-lg  border-gray-800 " type="text" placeholder="Enter Last  Name" value="<?=$row['lastName']?>"></div>
                        </div>
                         <div class="flex flex-col mt-5"><label >Email</label><input value=<?php echo $row["email"]; ?> required name="email" class="w-full h-10  mt-2  p-4 shadow-lg  border-gray-800 " type="text" placeholder="Enter Last  Name"></div>

                        <div class="flex gap-60 mt-5 ">
                            <div class="flex flex-col "><label >Telephone</label><input required name="telephone"  value="<?php echo $row["telephone"]; ?>" class="w-80 h-10 mt-2  p-4  shadow-lg  border-gray-800 " type="text" placeholder=" Enter phone number"></div>
                            <div class="flex flex-col "><label >Username</label><input required  value="<?php echo $row["username"]; ?>" name="username" class="w-96 h-10 mt-2  p-4 shadow-lg  border-gray-800 " type="text" placeholder="Enter username"></div>
                        </div>

                         <div class="flex gap-60"> 
                        <div class="flex flex-col">
                       <div class="mb-3 mt-5  "> <label > Nationality</label></div>
                           <div> <select class=" bg-white w-96 h-10 shadow-lg first-letter:" name="nationality" required >
                            <option name="nationality"><?php echo $row["nationality"];?></option>
                            <option value="Rwanda">Rwanda</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Kenya">Kenya</option>
                        </select>
                        </div>
                        </div>

                        <div>
                            <div class="flex flex-col mb-3 ml-12     mt-5">
                              <label > Gender</label>
                            </div>
                            <div class="flex gap-8 mt-7">
                            <?php if($row["gender"]=="Male"){?>

                                <div class="flex  "><input type="radio" name="gender" value="Male" required checked >  <p class="ml-3" >Male</p></div>
                                <div class="flex  "><input type="radio" name="gender" value="Female" required> <p class="ml-3">Female</p></div>
                                <?php } else{?>
                                    <div class="flex  "><input type="radio" name="gender" value="Male" required>  <p class="ml-3" >Male</p></div>
                                <div class="flex  "><input type="radio" name="gender" value="Female" required checked > <p class="ml-3">Female</p></div>
                                <?php }?>

                            </div>
                        </div>
                       </div>
                       
                        <div class="flex flex-col mt-5 "><label  > Password</label><input value="<?php echo $row["password"]; ?>" required name="password" class="w-full h-10 mt-2 p-4   shadow-lg  border-gray-800 " type="password" placeholder="Enter First Name" ></div>
                        <!-- <div class="flex flex-col "><label >Confirm Password</label><input required name="cpassword" class="w-96 h-10 mt-2 p-4  shadow-lg  border-gray-800 " type="hidden" placeholder="confrim password"></div> -->
                    
                     <button class="w-full h-10  mt-5  shadow-lg   rounded-md bg-green-300 type="submit"  type="submit">Save Changes</button>

                       </div>
                       
                      </form>

                      <?php }}}?>
                      
            </div>   
</body>
</html>