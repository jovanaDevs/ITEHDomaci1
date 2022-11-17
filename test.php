
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post" action="">
    Prioritet zadatka:<br>
<input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "high") ?>value="1"> Visok
<input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "normal") ?> value="2"> Normalan 
<input class="form-check-input" type="radio" name="category" <?php if (isset($category) && $category == "low")  ?> value="3"> Nizak 
<button type="submit"></button>
</form>
</body>
</html>
<?php
echo $_POST["category"];
?>


