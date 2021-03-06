<?php
$title = "Index page";
require_once 'include/header.php';
require_once 'db/conn.php';

$result = $crud->viewSpecialties();
?>
<br>
<br>
<h2 class="text-center"> Registration for IT confernce</h2>

<div class="row justify-content-center">
  <div class="col-5 ">
    <form method="post" action="success.php" enctype="multipart/form-data">

      <div class="form-group">
        <label for="fname">First name</label>
        <input required type="text" class="form-control" id="fname" name="fname">
      </div>

      <div class="form-group">
        <label for="lname">Last name</label>
        <input required type="text" class="form-control" id="lname" name="lname">
      </div>

      <div class="form-group">
        <label for="dob">Date of birth</label>
        <input required type="date" class="form-control" id="dob" name="dob">
      </div>

      <div class="form-group">
        <label for="speciality">Area of expertise </label>
        <select class="form-control" id="speciality" name="speciality">
          <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) {       ?>
            <option value="<?php echo $r['specialty_id']  ?>"><?php echo $r['name']  ?></option>
          <?php  } ?>
        </select>
      </div>

      <div class="form-group">
        <label for="email">Email address</label>
        <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>

      <div class="form-group">
        <label for="contact">Contact number</label>
        <input type="number" class="form-control" id="contact" name="contact">
        <small id="contactHelp" class="form-text text-muted">We'll never share your phone no. with anyone else.</small>
      </div>

      <div class="custom-file">
        <label for="avatar" class="custom-file-label">Select profile image</label>
        <input type="file" accept="image/*" class="custom-file-input" id="avatar" name="avatar">
        <small class="form-text text-mute">upload image is optional</small>
      </div>

      <br>
      <br>

      <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
    </form>

  </div>
</div>
<br>

<?php require_once 'include/footer.php'; ?>