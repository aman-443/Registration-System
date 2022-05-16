
<?php 
$title ="Index page";
require_once 'include/header.php' ;
require_once 'db/conn.php' ;

$result=$crud->viewSpecialties();
if(!isset($_GET['id'])){
    
include 'include/errormsg.php';

}
else{

    $id=$_GET['id'];
    $attendee=$crud->viewSingleRecord($id);

?>

<h2 class="text-center"> Edit Details</h2>

<div class="row justify-content-center">
<div class="col-5 ">

<form method="post" action="postedit.php">

  <div class="form-group">

    <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>" >

    <label for="fname">First name</label>
    <input type="text"value="<?php echo $attendee['fname'] ?> " class="form-control" id="fname" name="fname">
  </div>

  <div class="form-group">
    <label for="lname">Last name</label>
    <input type="text" value="<?php echo $attendee['lname'] ?> " class="form-control" id="lname" name="lname">
  </div>

  <div class="form-group">
    <label for="dob">Date of birth</label>
    <input type="date" value="<?php echo $attendee['dob'] ?>" class="form-control" id="dob" name="dob">
  </div>

  <div class="form-group">
    <label for="speciality">Area of expertise </label>
    <select class="form-control" id="speciality" name="speciality">
    <?php while($r=$result->fetch(PDO::FETCH_ASSOC))  {       ?>
      <option value="<?php echo $r['specialty_id']?>" <?php if($r['specialty_id']==$attendee['specialty_id'])echo 'selected'?>>
      <?php echo $r['name']  ?></option>
      <?php  }?>
    </select>
  </div>

  <div class="form-group">
    <label for="email">Email address</label>
    <input type="email" value="<?php echo $attendee['email'] ?>" class="form-control" id="email" aria-describedby="emailHelp" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>

  <div class="form-group">
    <label for="contact">Contact number</label>
    <input type="number" value="<?php echo $attendee['phone']?>"class="form-control" id="contact" name="contact">
    <small id="contactHelp" class="form-text text-muted">We'll never share your phone no. with anyone else.</small>
  </div>


  <button type="submit" class="btn btn-primary" name="submit">Save Changes</button>
  <a href="viewrecord.php" class="btn btn-info">Go back</a>

</form>
<br>
</div>
</div>
<?php  }?>
<?php  require_once 'include/footer.php'; ?>



