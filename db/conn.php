<?php 
$host ="localhost";
$db="attendance_db";
$user="root";
$pass="";
$charset="utf8mb4";

$dsn="mysql:host=$host;dbname=$db;charset=$charset";

try {
 $pdo=new PDO($dsn,$user,$pass);
 $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {

echo'<script>
document.getElementById("demo").innerHTML=`<h1 class="text-danger text-center">no database found</h1>`;
</script>';
//    throw new PDOException($e->getMessage());
   
}
require_once 'crud.php';
$crud = new crud($pdo); 



?>