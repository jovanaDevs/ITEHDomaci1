<?php
include "../dbBroker.php";
session_start();
if (! empty($_POST["keyword"])) {
    $username=$_SESSION["username"];
    $preparedStatement = $connection->prepare("SELECT * FROM task JOIN user ON task.userID=user.userID WHERE user.username='$username' AND task.title LIKE ? ORDER BY task.title LIMIT 7;");
    $search = "{$_POST['keyword']}%";
    $preparedStatement->bind_param("s", $search);
    $preparedStatement->execute();
    $result = $preparedStatement->get_result();
    if (! empty($result)) {
        ?>
<ul id="taskList">
<?php
        foreach ($result as $task) {
            ?>
   <li
        onClick="selectTask('<?php echo $task["title"]; ?>');">
      <?php echo $task["title"]; ?>
    </li>
<?php
        } // end for
        ?>
</ul>
<?php
    } // end if not empty
}
?>