<?php 
$title ="Success page";
require_once 'include/header.php' ;
require_once 'db/conn.php' ;

if (isset($_POST['submit'])){

  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $specialty = $_POST['speciality'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $dob = $_POST['dob'];
  $null =null;

  $orig_file = $_FILES["avatar"]["tmp_name"];
  $ext= pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
  $target_dir ="uploads/";

  if($_FILES["avatar"]["tmp_name"]==null){
    $destination="uploads/blank_image.jpg";
  }
  else{
  $destination =$target_dir .$contact. ".".$ext;
  }
  move_uploaded_file($orig_file,$destination);


  $issuccess=$crud->insert($fname,$lname,$dob,$specialty,$email,$contact,$destination);
  $specialtyName = $crud->getSpecialtyById($specialty);



  if($issuccess){
    include 'include/successmsg.php';

  }else{

    include 'include/errormsg.php';

  }


}
?>
<div id="outer" style="min-height: 600px;">
  <h1 class="text-center">Registered member</h1>
  <br>
  <div class="row justify-content-center">
    <div class="card" style="width: 20rem">
    <img src="<?php echo empty($destination) ? "uploads/blank_image.jpg" : $destination?>" style="height:50%; width:60%;" class="m-auto rounded-circle" alt="person profile">
     <div class="card-body">
      <h5 class="card-title"><?php  echo $_POST['fname'].' '.$_POST['lname']?> </h5> 
      <h6 class="card-subtitle mb-2 text-muted"><?php  echo $specialtyName['name']?></h6><br>
      <p class="card-text">Email : <?php  echo $_POST['email'] ?></p>
      <p class="card-text">Contact no. : <?php  echo $_POST['contact'] ?></p>
      <p class="card-text">date of birth. : <?php  echo $_POST['dob'] ?></p>

    </div>
  </div>
  </div>
</div>
<?php  require_once 'include/footer.php'; ?>