<div class="card col-sm-12">
  <div class="card-header">
    <h3>Nota Penyewaan</h3>
  </div>
  <div class="card-body">
    <?php
    $koneksi = mysqli_connect("localhost","root","","latihan");
    $id_sewa = $_GET["id_sewa"];
    //data transaksi
    $sql ="select t.id_sewa, p.nama_pelanggan, t.tgl_sewa
    from sewa t inner join pelanggan p
    on t.id_pelanggan = p.id_pelanggan
    where t.id_sewa='$id_sewa'";

    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);


    $sql2 = "select b.*, dt.lama_sewa, dt.biaya_sewa_per_hari
    from mobil b inner join detail_sewa dt
    on b.id_mobil = dt.id_mobil
    where dt.id_sewa='$id_sewa'";

    $result2 = mysqli_query($koneksi,$sql2);
    ?>

    <h4>ID.Sewa: <?php echo $hasil["id_sewa"];?></h4>
    <h4>Nama Pemesan: <?php echo $hasil["nama_pelanggan"];?></h4>
    <h4>Tgl Sewa: <?php echo $hasil["tgl_sewa"];?></h4>

    <table class="table">
    <thead>
      <tr>
        <th>Id Mobil</th>
        <th>Nomor Mobil</th>
        <th>Merk</th>
        <th>Jenis</th>
        <th>Warna</th>
        <th>Tahun Pembuatan</th>
        <th>Lama Sewa</th>
        <th>biaya Sewa Perhari</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <?php $total = 0; foreach($result2 as $mobil):?>
        <tr>
          <td><?php echo $mobil["id_mobil"]; ?></td>
          <td><?php echo $mobil["nomor_mobil"]; ?></td>
          <td><?php echo $mobil["merk"]; ?></td>
          <td><?php echo $mobil["jenis"]; ?></td>
          <td><?php echo $mobil["warna"]; ?></td>
          <td><?php echo $mobil["tahun_pembuatan"]; ?></td>
          <td><?php echo $mobil["lama_sewa"]; ?></td>
          <td><?php echo "Rp ".number_format($mobil["biaya_sewa_per_hari"]); ?></td>
          <td><?php echo "Rp ".number_format($mobil["biaya_sewa_per_hari"]*$mobil["lama_sewa"]); ?></td>
        </tr>
        <?php
        $total += $mobil["biaya_sewa_per_hari"]*$mobil ["lama_sewa"];
        endforeach ?>

      </tbody>
    </table>
    <h2 class="text-right text-success">
      <?php echo "Rp ".number_format($total_bayar); ?>
    </h2>
  </div>
</div>
