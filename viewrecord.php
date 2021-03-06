
<?php 
$title ="view members";

require_once 'include/header.php' ;

require_once 'include/auth_check.php' ;
require_once 'db/conn.php' ;

$result=$crud->viewRecord();
?>


<br>
<br>
<div class="row justify-content-center">
<div class="col-8" style="min-height: 600px;">

    <table class="table">
    <thead class="thead-light">
        <tr>
        <th scope="col">#ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Specialty</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

    <?php while($r=$result->fetch(PDO::FETCH_ASSOC))  {       ?>
        <tr>
        <th scope="row"><?php echo $r['attendee_id']  ?></th>
        <td><?php echo $r['fname']  ?></td>
        <td><?php echo $r['lname']  ?></td>
        <td><?php echo $r['name']  ?></td>
        <td>
            <a href="view.php?id=<?php echo $r['attendee_id']  ?>" class="btn btn-primary">view</a>
            <a href="edit.php?id=<?php echo $r['attendee_id']  ?>" class="btn btn-warning">edit</a>
            <a onclick="return confirm('Are you sure you want to delete this record!')" 
            href="delete.php?id=<?php echo $r['attendee_id']  ?>" class="btn btn-danger">delete</a>
        </td>
        </tr>
  <?php  }?>
    </tbody>
    </table>
        
    </div>
    </div>
<?php  require_once 'include/footer.php'; ?>