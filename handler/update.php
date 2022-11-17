<?php
require "../dbBroker.php";
require "../model/Task.php";

if (isset($_POST["selectTask"]) && isset($_POST["title"]) && isset($_POST["description"])
    && isset($_POST["category"])) {
        if (isset($_POST["checkboxDone"])) {
            $done = true;
          } else {
            $done = false;
          }
    $status = Task::updateTask($_POST["selectTask"],$_POST["title"],$_POST["description"],$_POST["category"],$done,$connection);
    
    if ($status) {
        echo 'Success';
    } else {
        echo 'Failed';
        echo $status;
       
    }
}else{
    echo "console.log(\"Nije sve setovano\")";
    $puk=$_POST["selectTask"];
    echo "console.log($puk)";
}
?>