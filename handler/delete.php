<?php

require "../dbBroker.php";
require "../model/Task.php";

if(isset($_POST['taskID'])){
    
    $status = Task::deleteById($_POST['taskID'], $connection);
    if($status){
        echo "Success";
    }else{
        echo "Failed";
    }
}

?>
