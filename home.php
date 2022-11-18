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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dde68f0f66.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">


    <title>Next do</title>
</head>

<body>
    <!--<div class="container beforeTasks">
        <ul class="nav navbar-nav navbar-right">
            <li><img src="img/logo2.jpg" alt="" width="120" height="65"></li>

        </ul>


    </div>-->

    <div class="mainDiv">
        <div class="container">
            <div class="container d-flex justify-content-between headerClass">
            <a href='logout.php' class="link-info">Log out</a>
                <h1 class="display-2 text-center">Next do lista zadataka</h1>


                <img src="img/logo2.jpg" alt="" width="180" height="65">

            </div>
            <br>
            <p class="lead text-center"><b><?php echo $_SESSION["username"] ?> dobrodošli u Next do</b></p>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <!--navigation buttons-->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <button type="button" class="btn btn-success btn-primary btn-lg" data-toggle="modal" data-target="#addModal">Dodaj novi zadatak</button>
                                </li>
                                <li class="nav-item">
                                    <button type="button" class="btn btn-success btn-primary btn-lg" data-toggle="modal" data-target="#updateModal">Izmeni zadatak</button>
                                </li>
                                <li class="nav-item">
                                    <select class="form-select " id="selectCategory" aria-label="Default select example">
                                        <option selected>Filtriraj prema prioritetu</option>
                                        <option value="3">Nizak</option>
                                        <option value="2">Normalan</option>
                                        <option value="1">Visok</option>
                                    </select>

                                </li>
                            </ul>
                        </div>
                </nav>


                <!-- List of tasks-->
                <div class="row mainTasks ">
                    <ul id="popuni" class="listMain col-lg-6 col-8 mx-auto">

                        <?php
                        try {
                            $rezultat = Task::getAll($connection, $_SESSION["username"]);
                        } catch (Exception $e) {
                            echo $e->getMessage();
                            die();
                        }
                        if ($rezultat->num_rows == 0) {
                            echo "<div class=\"d-flex nodata justify-content-between\"><h2>Nema nijedan još uvek nijedan zadatak!</h2><i class=\"fa-solid fa-file fa-2xl \"></i></div>";
                        } else {
                            while ($red = $rezultat->fetch_array()) :

                        ?>


                                <li>
                                    <div class="container">
                                        <?php
                                        switch ($red["categoryID"]):
                                            case 1:
                                                echo "<span style=\"color: Tomato;\">
                                        <i class=\"fa-solid fa-circle\"></i>
                                      </span>";
                                                break;
                                            case 2:
                                                echo "<span style=\"color: orange;\">
                                        <i class=\"fa-solid fa-circle\"></i>
                                      </span>";
                                                break;
                                            case 3:
                                                echo "<span style=\"color: green;\">
                                        <i class=\"fa-solid fa-circle\"></i>
                                      </span>";
                                                break;
                                        endswitch;

                                        ?>

                                        <div class="d-flex title justify-content-between">

                                            <label><?php echo $red["title"]; ?></label>

                                            <input type="radio" name="radioSelect" value=<?php echo $red["taskID"] ?>>
                                            <!-- <span class="checkmark"></span>-->

                                        </div>

                                        <div class="d-flex description justify-content-between">

                                            <p class="descText"><?php echo $red["description"]; ?></p>
                                            <div class="date d-flex align-items-end">
                                                <p><?php echo $red["createDate"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                        <?php
                            endwhile;
                        }
                        ?>
                    </ul>


                </div>
                <div class="row container">
                    <button id="btnObrisi" type="button" class="btn btn-primary btn-success btn-lg mx-auto btnHide">Obriši</button>
                </div>
            </div>


            <!-- Add new task modal -->
            <div class="modal" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalCenteredLabel">Kreiraj novi zadatak</h3>



                        </div>
                        <div class="modal-body">
                            <form action="" method="post" id="formAdd">
                                <div class="form-group ">
                                    <input name="title" type="text" class="form-control" placeholder="Naslov zadatka" required="required">
                                </div>
                                <div class="form-group ">
                                    <textarea name="description" class="form-control" rows="3" placeholder="Dodaj opis"></textarea>
                                </div>

                                <div class="form-group">
                                    Prioritet zadatka:<br>
                                    <input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "high") ?>value="1"> Visok
                                    <input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "normal") ?> value="2"> Normalan
                                    <input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "low")  ?> value="3"> Nizak
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-primary btn-lg">Dodaj</button>
                                    <button type="button" class="btn btn-success btn-primary btn-lg" data-dismiss="modal">Zatvori</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
            <!--Update task modal-->
            <div class="modal" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalCenteredLabel">Izmeni zadatak</h3>



                        </div>
                        <div class="modal-body">
                            <form action="" method="post" id="formUpdate">
                                <h5>Izaberite zadatak koji menjate:</h5>
                                <div class="frmSearch">

                                    <input type="text" name="searchBox" id="searchBox" placeholder="Pretrazi zadatke" />
                                    <div id="suggesstionBox"></div>


                                </div>
                                <br>

                                <div class="form-group ">
                                    <input name="title" id="title" type="text" class="form-control" placeholder="Izmeni naslov zadatka" required="required">
                                </div>
                                <div class="form-group ">
                                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Izmeni opis"></textarea>
                                </div>
                                <!--<div class="form-group">
                                    <input class="form-check-input" type="checkbox" value="checkboxDone" id="checkboxDone">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Zadatak je uradjen
                                </div>-->
                                <div class="form-group">
                                    Prioritet zadatka:<br>
                                    <input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "high") ?>value="1"> Visok
                                    <input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "normal") ?> value="2"> Normalan
                                    <input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "low")  ?> value="3"> Nizak
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-primary btn-lg">Izmeni</button>
                                    <button type="button" class="btn btn-success btn-primary btn-lg" data-dismiss="modal">Zatvori</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>


            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="js/main.js"></script>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">


            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</body>

</html>