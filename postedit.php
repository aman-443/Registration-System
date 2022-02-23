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




$result=$crud->editAttendee($id,$fname,$lname,$dob,$specialty,$email,$contact);

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