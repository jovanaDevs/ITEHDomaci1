<?php
include "../dbBroker.php";
include "../model/Task.php";
session_start();

if (isset ($_GET["categoryID"])){
    $id=$_GET["categoryID"];

    $rezultat = Task::filterByCategory($connection,$_SESSION["username"],$id);


while($red = $rezultat->fetch_array()){
    
echo "<li>";
    echo "<div class=\"container\">";
   
    switch ($id):
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

    

   echo "<div class=\"d-flex title justify-content-between\">";
$title=$red["title"];
     echo   "<label>$title</label>";
       $taskID=$red["taskID"];
    echo "<input type=\"radio\" name=\"radioSelect\" value= $taskID >";
  

    echo "</div>";

   echo "<div class=\"d-flex description justify-content-between\">";
$description=$red["description"];
       echo "<p class=\"descText\">$description</p>";
        echo "<div class=\"date d-flex align-items-end\">";
        $date=$red["createDate"];
         echo "  <p>$date</p>";
        echo "</div>";
    echo "</div>";
echo "</div>";
echo "</li>";

 }



}



?>