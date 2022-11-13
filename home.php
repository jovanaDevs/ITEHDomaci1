<?php
include "dbBroker.php";
include "model/Task.php";
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

    <script src="https://kit.fontawesome.com/dde68f0f66.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">

    <title>Next do</title>
</head>

<body>
    <div class="container beforeTasks">
        <ul class="nav navbar-nav navbar-right">
            <li><img src="img/logo2.jpg" alt="" width="120" height="65"></li>

        </ul>
        <!-- <h1 class="display-2 text-center">Next do</h1>-->

    </div>

    <div class="mainDiv">
        <div class="container">

            <ul class="nav navbar-nav navbar-right">
                <li><img src="img/logo2.jpg" alt="" width="180" height="65"></li>
            </ul>

        </div>
        <p class="lead text-center">Dobrodošli u Next do</p>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="nav nav-pills nav-justified">
                            <li class="nav-item">
                                <button type="button" class="btn btn-success btn-primary btn-lg">Dodaj novi zadatak</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-success btn-primary btn-lg">Izmeni zadatak</button>
                            </li>
                            <li class="nav-item">
                                <button type="button" class="btn btn-success btn-primary btn-lg">Pretrazi zadatke</button>
                            </li>
                        </ul>
                    </div>
            </nav>


            <div class="row mainTasks">
                <ul id="list" class="listMain col-lg-6 col-8 mx-auto">

                    <?php
                    try {
                        $rezultat = Task::getAll($connection);
                    } catch (Exception $e) {
                        echo $e->getMessage();
                        die();
                    }
                    if ($rezultat->num_rows == 0) {
                        echo "<div class=\"d-flex nodata justify-content-between\"><h2>Nema nijedan još uvek nijedan zadatak!</h2><i class=\"fa-solid fa-file fa-2xl \"></i></div>";
                    }
                    ?>


                    <li>
                        <div class="container">
                            <div class="d-flex title justify-content-between">
                                <div>
                                    <h4>Dodaj novi zadatak</h4>
                                </div>
                                <div class="check"><input type="checkbox" class=" form-check-input "></div>
                            </div>

                            <div class="d-flex description justify-content-between">
                                <div>
                                    <p class="descText">OvoLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                                </div>
                                <div class="date">
                                    <p>12-5-2022</p>
                                </div>
                            </div>
                        </div>
                    </li>



                  
            <div class="row">
                <button id="btnClr" type="button" class="btn btn-primary btn-success btn-lg mx-auto btnHide">Obriši sve</button>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</body>

</html>