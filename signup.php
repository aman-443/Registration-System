<?php
$title="Signup";
require_once 'include/header.php' ;
require_once 'db/conn.php' ;

// if data was submitted via a form post request , then...
if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=strtolower(trim($_POST['username']));
    $password=$_POST['pswd'];
    $confirm_password=$_POST['confirm_pswd'];
    $email=$_POST['email'];

 if($password!=$confirm_password){
    echo '<div class="text-center alert alert-danger"> password does not match </div>';

 }

 else{
    $result = $user1->createUser($username,$email,$password);
    
    if(!$result){
        echo '<div class="text-center alert alert-danger">User already exist </div>';
    }
    else{
        $_SESSION['username']=$username;
        header('location: viewrecord.php');
    }
    }
}


?>
