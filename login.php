<?php 
$title ="User Login";

require_once 'include/header.php' ;
require_once 'db/conn.php' ;

// if data was submitted via a form Login post request , then...
if($_SERVER['REQUEST_METHOD']=="POST"){
if($_POST['submit']=="Login"){
$username=strtolower(trim($_POST['username']));
$password=$_POST['password'];
$new_password= md5($password.$username);

$result = $user1->getUser($username,$new_password);

if(!$result){
    echo '<div class="text-center alert alert-danger">Username or Password is incorrect</div>';
}
else{
    $_SESSION['username']=$username;
    $_SESSION['id']=$result['id'];
    header('location: viewrecord.php');
}
}

// if data was submitted via a form signup post request , then...
else if($_POST['submit']=="Signup"){
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

}
?>


<div id="body2">
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

        
        <div class="login">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                <label class="label2" for="chk" aria-hidden="true">Login</label>
                <input class="input2"   type="text" name="username" placeholder="username"  
                value="<?php if($_SERVER['REQUEST_METHOD']=="POST") echo $_POST['username']; ?>" required>

                <input class="input2"  type="password" name="password" placeholder="Password" required>

                <a href="#" class="anchor">forgot password ?</a>
                
                <input class="button2" type="submit" name="submit" value="Login">
            </form>
        </div>

        <div class="signup" >
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">
                <label class="label2" for="chk" aria-hidden="true">Sign up</label>
                <input class="input2"  type="text" name="username" placeholder="User name" required>
                <input class="input2"   type="email" name="email" placeholder="Email" required>
                <input class="input2"  type="password" name="pswd" placeholder="Password" required>
                <input class="input2"  type="password" name="confirm_pswd" placeholder="Confirm Password" required>
                <input type="submit" name="submit" value="Signup" class="button2">
            </form>
        </div>
	</div>
    
</div>
<?php  require_once 'include/footer.php'; ?>