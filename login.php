<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Next do login</title>
</head>
<body >


  <div class="container ">
  <ul class="nav navbar-nav navbar-right">
    <li><img src="img/logo2.jpg" alt="" width="170" height="65" ></li>
</ul>
  </div>

    
    
  

<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Prijavi se </h2>       
        <div class="form-group">
            <input name="username" type="text" class="form-control" placeholder="Korisničko ime" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Lozinka" required="required">
        </div>
        <div class="form-group">
            <button type="submit" name="logIn" class="btn  btn-block">Prijava</button>
        </div>
        <?php  
    include "model/User.php";
    include "dbBroker.php";
    if(isset($_POST["username"]) && isset($_POST["password"])){
        
        $user=new User($_POST["username"], $_POST["password"]);
        $loginResult=User::logIn($user,$connection);
        if($loginResult->num_rows==1){
            session_start();
           $row=$loginResult->fetch_array();
            $_SESSION["userID"]=$row["userID"];
            $_SESSION["username"]=$user->getUsername();
            header("Location: home.php");
            exit();
            
        }else{
            echo '<div class="alert alert-danger" role="alert">
            Pogrešno korisničko ime i/ili lozinka!
          </div>';
        }
    }else{
        
    }
    ?>
    </form>
</div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    
</body>
</html>