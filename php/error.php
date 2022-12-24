<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .main-container-error{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .main-container-error-message{
            font-weight: bold;
            font-size: 30px;
            font-family: 'Poppins', sans-serif;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .main-container-error-link{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        .main-button-link{
            text-decoration: none;
            padding: 10px;
            border-radius: 10px;
            background: green;
            color: white;
            font-family: 'Poppins', sans-serif;
            font-weight: normal;
            font-size: 20px;
            cursor: pointer;
           margin-top: 20px;
        }
    </style>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/e97edb3ba1.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="main-container-error">
        <div class="main-container-error-img">
            <img src="../error.jpeg" alt="">
        </div>
        <div class="main-container-error-message  font-extrabold text-2xl text-center p-3"><?php 
         echo $_SESSION['message']
        ?></div>
        <div class="main-container-error-link">
        <div class="flex ">
          <a href="../index.html" class="main-button-link">
            <i class="fas fa-arrow-left"></i>
            <span>Back</span>
    </a>
       </div>
        </div>
    </div>
</body>
</html>