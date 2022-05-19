<?php 

require_once 'db/conn.php';

if (isset($_POST['submit'])){
  $id=$_POST['id'];
  $fname= $_POST['fname'];
  $lname= $_POST['lname'];
  $specialty = $_POST['speciality'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $dob = $_POST['dob'];

  $orig_file = $_FILES["avatar"]["tmp_name"];
  $ext= pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
  $target_dir ="uploads/";
  if($_FILES["avatar"]["tmp_name"]==null){
    $destination=null;
  }
  else{
  $destination =$target_dir .$contact. ".".$ext;
  }
  move_uploaded_file($orig_file,$destination);





$result=$crud->editAttendee($id,$fname,$lname,$dob,$specialty,$email,$contact,$destination);

if($result){

header('location:viewrecord.php');
// echo "the record has been inserted";
}
else{

    echo "error";
}



}
else{

    echo "error";
}
?>