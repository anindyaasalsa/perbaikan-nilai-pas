<?php session_start(); ?>
<?php if (isset($_SESSION["session_karyawan"])): ?>
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Home</title>
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <style media="screen">
        .gambar{
          background-image: url('bgd.jpg');
          background-size: cover;
        }
      </style>
    </head>
    <body class="gambar">
      <nav class="navbar navbar-expand-md bg-primary navbar-dark sticky-top">
        <a href="#" class="text-white">
          <h3> Car Rentals</h3>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-targer="menu">
          <span class="navbar navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
          <ul class="navbar-nav">
            <li class="nav-item"><a href="template.php?page=pelanggan" class="nav-link">Pelanggan</a></li>
            <li class="nav-item"><a href="template.php?page=karyawan" class="nav-link">Karyawan</a></li>
            <li class="nav-item"><a href="template.php?page=mobil" class="nav-link">Mobil</a></li>
            <li class="nav-item"><a href="template.php?page=list_mobil" class="nav-link">Sewa</a></li>
            <li class="nav-item"><a href="template.php?page=daftar_penyewaan" class="nav-link">Daftar Penyewaan</a></li>
            <li class="nav-item"><a href="proses_login.php?logout=true" class="nav-link">Logout</a></li>
          </ul>
        </div>
        <a href="template.php?page=list_sewa">
          <b class="text-white">Sewa: <?php echo count($_SESSION["session_sewa"]); ?></b>
        </a>
      </nav>
      <div class="container my-2">
        <?php if (isset($_GET["page"])): ?>
          <?php if ((@include $_GET["page"].".php") === true): ?>
            <?php include $_GET["page"].".php"; ?>

          <?php endif; ?>
        <?php endif; ?>


      </div>
    </body>
  </html>
<?php else: ?>
  <?php echo "You have not log in!"; ?>
  <br>
  <a href="login.php">
    Login Here!
  </a>
<?php endif; ?>
