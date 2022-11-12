<?php
class User{
    private $username;
    private $password;

public function __construct($username,$password)
{
    $this->username=$username;
    $this->password=$password;
}
public static function logIn($user, $connection){
    $query="SELECT * FROM user where username='$user->username' and password='$user->password' limit 1";
     return $connection->query($query);
  
}
}

?>