<?php
$host="localhost";
$username="root";
$password="";
$database="next_do";

$connection= new mysqli($host,$username,$password,$database);
if($connection->connect_errno){
    echo "Konekcija nije uspela".$connection->connect_errno;
    die();
}
$connection->set_charset("utf8");

?>