<div class="card col-sm-12">
 <div class="card-header">
   <h4>Mobil yang akan disewa</h4>
 </div>
 <div class="card-body">
   <form action="db_sewa.php?checkout=true" method="post"
   onsubmit="return confirm('Apakah anda yakin dengan pesanan ini?')">

   <table class="table">
     <thead>
       <tr>
         <th>Id Mobil</th>
         <th>Merk</th>
         <th>Image</th>
         <th>Lama Sewa</th>
         <th>Biaya Perhari</th>
         <th>Option</th>
       </tr>
     </thead>
     <tbody>
       <?php foreach ($_SESSION["session_sewa"] as $hasil): ?>
         <tr>
           <td><?php echo $hasil["id_mobil"]; ?></td>
           <td><?php echo $hasil["merk"]; ?></td>
           <td><img src="img_mobil/<?php echo $hasil["image"];?>" width="200" height="200" alt=""></td>
           <td>
             <input type="number" name="lama_sewa<?php echo $hasil["id_mobil"];?>" min="1">
           </td>

           <td><?php echo $hasil["biaya_sewa_per_hari"]; ?></td>
           <td>
               <a href="db_sewa.php?hapus=true&id_mobil=<?php  echo $hasil["id_mobil"];?>">
                 <button type="button" class="btn btn-block btn-dark">
                   Hapus
                 </button>
               </a>
           </td>
         </tr>
       <?php endforeach; ?>
     </tbody>
   </table>
   <a href="db_sewa.php?checkout=true" onclick="return confirm('apakah anda yakin dengan pesanan ini?')">
     <button type="button" class="btn btn-danger">Checkout</button>
   </a>
 </div>
</div>
