<?php
require "../dbBroker.php";
require "../model/Task.php";
session_start();
if(isset($_POST["category"]) && $_POST["title"] && $_POST["description"]){
    $date=date("Y-m-d");
    $newTask= new Task(null, $_POST["title"], $_POST["description"],$date,false,$_POST["category"],$_SESSION["userID"]);
   $status=Task::addTask($newTask,$connection);
        if($status){
        echo "Success";
        }
        else{
            echo "Failed";
            echo $status;
        }
    
}
?>