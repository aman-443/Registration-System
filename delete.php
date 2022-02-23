<?php

require_once 'db/conn.php' ;

if(!isset($_GET['id'])){

include 'include/errormsg.php';

}
else{

    $id=$_GET['id'];
$crud->deleteRecord($id);
header("location:viewrecord.php");
include 'include/successmsg.php';
}

?>