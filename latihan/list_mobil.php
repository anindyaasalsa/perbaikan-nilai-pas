<?php
$koneksi = mysqli_connect("localhost","root","","latihan");
$sql = "select * from mobil";
$result = mysqli_query($koneksi,$sql);
 ?>

 <div class="row">
   <?php foreach ($result as $hasil):?>
     <div class="card col-sm-4">
       <div class="card-body">
         <img src="img_mobil/<?php echo $hasil["image"];?>" class="img" width="100%" height="300">
       </div>
       <div class="card-footer">
         <h5 class="text-center"><?php echo $hasil["merk"]; ?></h5>
         <h6 class="text-center">jenis: <?php echo $hasil["jenis"]; ?></h6>
         <h6 class="text-center">Biaya Sewa Perhari: <?php echo $hasil["biaya_sewa_per_hari"]; ?></h6>
         <a href="db_sewa.php?sewa=true&id_mobil=<?php echo $hasil["id_mobil"];?>">
         <button type="button" class="btn btn-info btn-block">
         SEWA
         </button>
       </a>
       </div>
     </div>
   <?php endforeach; ?>
 </div>
