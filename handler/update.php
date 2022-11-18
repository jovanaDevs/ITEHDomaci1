<?php
require "../dbBroker.php";
require "../model/Task.php";
session_start();
if (isset($_POST["searchBox"]) && isset($_POST["title"]) && isset($_POST["description"])
    && isset($_POST["category"])) {
        $sql=Task::getIDByTaskTitle($connection,$_SESSION["username"],$_POST["searchBox"]);
        $resultSet=$sql->fetch_array();
        if (isset($_POST["checkboxDone"])) {
            $done = true;
          } else {
            $done = false;
          }
    $status = Task::updateTask($resultSet["taskID"],$_POST["title"],$_POST["description"],$_POST["category"],$done,$connection);
    
    if ($status) {
        echo 'Success';
    } else {
        echo 'Failed';
        echo $status;
       
    }
}else{
    echo "console.log(\"Nije sve setovano\")";
    
}
?>