<?php
class Task{
public $id;
public $title;
public $description;
public $createDate;
public $done;
public $categoryID;
public $userID;

public function __construct($id=null, $title=null,$description=null,$createDate=null,$done=null,$categoryID=null,$userID=null){
    $this->id=$id;
    $this->title=$title;
    $this->description=$description;
    $this->done=$done;
    $this->createDate=$createDate;
    $this->categoryID=$categoryID;
    $this->userID=$userID;
}


public static function deleteById($taskID, mysqli $connection){
 $query="DELETE FROM task WHERE taskID=$taskID";
 return $connection->query($query);
}
public static function getById($taskID, mysqli $conn)
{
    $query = "SELECT * from task WHERE taskID=$taskID";
    $myArray = array();
    if ($result = $conn->query($query)) {

        while ($row = $result->fetch_array(1)) {
            $myArray[] = $row;
        }
    }
    return $myArray;
}
public static function getIDByTaskTitle(mysqli $connection,$username, $search){
    $query="SELECT * FROM task JOIN user ON task.userID=user.userID WHERE user.username='$username' AND task.title='$search' ";
    return $connection->query($query);
}

public static function getAll(mysqli $connection,$username){
    $query="SELECT * FROM task JOIN user ON task.userID=user.userID WHERE user.username='$username' order by createDate";
    return $connection->query($query);
}
public static function addTask(Task $task, mysqli $connection){
    $task->done?$done=1:$done=0;
    $query="INSERT INTO task(title,description,createDate,done,categoryID,userID) VALUES('$task->title','$task->description','$task->createDate',$done,$task->categoryID,$task->userID)";
    return $connection->query($query);
}
public static function updateTask($taskID,$title,$description,$categoryID,$done, mysqli $connection){
    $done?$done=1:$done=0;
    $query="UPDATE task set title='$title',description='$description',done=$done,categoryID=$categoryID WHERE taskID=$taskID";
    return $connection->query($query);
}


}





?>