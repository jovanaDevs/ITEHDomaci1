<?php
class Task{

private $title;
private $description;
private $done;
private $createDate;
private $categoryID;
private $userID;

public function _construct($title,$description,$done,$createDate,$categoryID,$userID){
    $this->title=$title;
    $this->description=$description;
    $this->done=$done;
    $this->createDate=$createDate;
    $this->categoryID=$categoryID;
    $this->userID=$userID;
}

}





?>