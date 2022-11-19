<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body{ 
            background-image: url("img/logout.jpg");
            background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    font-family: 'Roboto', serif;
        height: 90vh;
     overflow: hidden;
     padding-top: 10px;
        }
        #info{
            background-color: #ABB0B8;
            opacity: 0.99;
            width: 1000px;
            margin: auto;
            color: white;
            border: 1px solid #4C4E52;
            border-radius: 12px;
            margin-top: 60px;
            box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.3);
    padding: 10px;
        }
    </style>
</head>
<body>
<?php
session_start();
session_destroy();
//echo '<p class="text-center"> Izlogovali ste se! <a href="login.php">Prijavi se opet</a></p>';
echo '<div class="text-center" id="info"><p><h1> Izlogovali ste se! <a href="login.php">Prijavi se opet</a></h1></div></p>';
?>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>