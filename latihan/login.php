<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>LOGIN Karyawan</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script type="assets/js/jquery.min.js"></script>
    <script type="assets/js/popper.min.js"></script>
    <script type="assets/js/bootstrap.min.js"></script>
    <style media="screen">
      .gambar{
        background-image: url('bgd.jpg');
        background-size: ;
      }
    </style>
  </head>
  <body class="gambar">
    <div class="container my-5">
      <div class="row justify-content-center align-items-center">
        <div class="col-sm-4 card">
          <div class="card-header">
          <h3 class="">   LOGIN `rentcar`</h3>
        </div>
        <div class="card-body">
          <?php if (isset($_SESSION["message"])): ?>
            <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
              <?php echo $_SESSION["message"]["message"]; ?>
              <?php unset ($_SESSION["message"]); ?>
            </div>
          <?php endif; ?>
            <form action="proses_login.php" method="post">
              <input type="text" name="username" class="form-control mb-2" placeholder="username" required>
              <input type="password" name="password" class="form-control mb-2" placeholder="password" required>
              <button type="sumbit" class="btn btn-primary btn-block">LOGIN</button>
           </form>
         </div>
       </div>
      </div>
    </div>
  </body>
</html>
