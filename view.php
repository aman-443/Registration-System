<?php 
$title ="view";
require_once 'include/header.php' ;
require_once 'db/conn.php' ;

if(!isset($_GET['id'])){
    
  include 'include/errormsg.php';

}
else{

    $id=$_GET['id'];
    $result=$crud->viewSingleRecord($id);

?>
<div style="min-height: 600px;">
<br><br>
<h1 class="text-center">Employee personal Details </h1>
<br>
<div class="row justify-content-center">
<div class="card" style="width: 20rem">
  <div class="card-body">
    <h4 class="card-title"><?php  echo $result['fname'].' '.$result['lname']?> </h4> 
    <h6 class="card-subtitle mb-2 text-muted"><?php  echo $result['name'] ?></h6><br>
    <p class="card-text">Email : <?php  echo $result['email'] ?></p>
    <p class="card-text">Contact no. : <?php  echo $result['phone'] ?></p>
    <p class="card-text">date of birth. : <?php  echo $result['dob'] ?></p>

  </div>
</div>

</div>
<br>
    <div class="row justify-content-center">
            <a href="viewrecord.php" class="btn btn-primary">back</a>
            <a  href="edit.php?id=<?php echo $result['attendee_id']  ?>" class="btn btn-warning mx-2">edit</a>
            <a onclick="return confirm('Are you sure youw want to delete this record!')" 
            href="delete.php?id=<?php echo $result['attendee_id']  ?>" class="btn btn-danger">delete</a>

      </div>

 <?php } ?>

 </div>







<?php  require_once 'include/footer.php'; ?>