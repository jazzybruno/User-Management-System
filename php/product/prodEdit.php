<?php 
session_start() ;
require ".././auth.php";
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
    <title>Update Product</title>
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
    
    <div class=" mt-24   ml-48">
        <div class="flex ">
        <a href= ./index.php class=" p-4 rounded-md bg-green-300 shadow-md mt-0  decoration-none hover:bg-white ">All Products </a>
        </div>
       
            <div class="user mt-5">
                      <h1 class="text-2xl text-center"> Update Product </h1>
                      <h2 class=" font-thin text-gray-600  text-center ">Use the form bellow to update a product</h2>
                      <form action="./update.php" method="post">
 
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
                                    $id = $_GET['prodid'];
                                    
                                    $query = mysqli_query($connect , "SELECT * From products where prod_id= '$id'  ");
                                    if(!$query) {
                                       echo mysqli_query_error();
                                    }else{
                                    
                                        
                                        while($row=mysqli_fetch_assoc($query)){

                            ?>
                            
                             <div class="user mt-5">
                       <div class="mx-96 mt-9">
                        <input type="hidden" name="prod_id" value="<?php echo $row["prod_id"];?>">
                       <div class="flex flex-col mt-5 mb-6"><label >Product Name</label><input  required name="name" class="w-full h-10  mt-2  p-4 shadow-lg  border-gray-800 "  value="<?php echo $row["prod_name"];?>" type="text" placeholder="Enter Name"></div>
                       <div class="flex flex-col mt-5 mb-6"><label >Quantity</label><input  required name="quantity" class="w-full h-10  mt-2  p-4 shadow-lg  border-gray-800 "  value="<?php echo $row["quantity"];?>" type="number" placeholder="Enter Quantity"></div>
                       <div class="flex flex-col mt-5 mb-6"><label >Unit Price</label><input required name="unit_price" class="w-full h-10  mt-2  p-4 shadow-lg  border-gray-800 " value="<?php echo $row["unit_price"];?>" type="number" placeholder="Enter unit price"></div>
                    
                     <button class="w-full h-10  mt-5  shadow-lg   rounded-md bg-green-300 type="submit"  type="submit">Save Changes</button>

                       </div>

                      <?php }}}?>
                      </form>
            </div>   
</body>
</html>