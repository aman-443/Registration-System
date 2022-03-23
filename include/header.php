 <!doctype html>
 <html lang="en">

 <head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

   <link rel="stylesheet" type="text/css" href="css/home.css" />
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

   <!-- google fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@500&display=swap" rel="stylesheet">
   <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

   <!-- jquery link -->
   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


   <title> <?php echo $title ?></title>
 </head>

 <body id="demo">

   <div class="container-fluid">

     <nav id="nav1" class="p-2 navbar navbar-expand-lg navbar-light ">

       <a class="navbar-brand" style="margin-left: 10%;" href="index.php">Logo</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <div class="navbar-nav">
           <a class="nav-item nav-link <?= $_SERVER['PHP_SELF'] == '/attendance/index.php' ? 'active1' : '' ?>" href="index.php">Home<span class="sr-only">(current)</span></a>
           <a class="nav-item nav-link <?= $_SERVER['PHP_SELF'] == '/attendance/registration.php' ? 'active1' : '' ?>" href="registration.php">Registration<span class="sr-only">(current)</span></a>
           <a class="nav-item nav-link <?= $_SERVER['PHP_SELF'] == '/attendance/viewrecord.php' ? 'active1' : '' ?>" id="viewscreen" href="viewrecord.php">View Members</a>
         </div>
       </div>
     </nav>