<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","latihan");
if (isset($_GET["sewa"])) {
  $id_mobil = $_GET["id_mobil"];
  $sql = "select * from mobil where id_mobil='$id_mobil'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  if (!in_array($hasil, $_SESSION["session_sewa"])) {
    array_push($_SESSION["session_sewa"],$hasil);
  }
  header("location:template.php?page=list_mobil");
}

if (isset($_GET["checkout"])) {
  $koneksi = mysqli_connect("localhost","root","","latihan");
  //kita siapkan data untuk tabel pinjam
  $id_sewa = rand(1,100000).date("dmY");
  $id_pelanggan = $_SESSION["session_pelanggan"]["id_pelanggan"];
  $tgl_sewa = date("Y-m-d");
  $sql = "insert into sewa values ('$id_sewa','$id_pelanggan','$tgl_sewa')";
  mysqli_query($koneksi,$sql);

  foreach ($_SESSION["session_sewa"] as $hasil) {
    $id_mobil = $hasil["id_mobil"];
    $lama_sewa = $_POST['lama_sewa'.$hasil["id_mobil"]];
    $biaya_sewa_per_hari = $hasil["biaya_sewa_per_hari"];
    $sql = "insert into detail_sewa values('$id_sewa','$id_mobil','$lama_sewa','$biaya_sewa_per_hari')";
    mysqli_query($koneksi,$sql);
  }
  $_SESSION["session_sewa"] = array();
  header("location:template.php?page=nota&id_sewa=$id_sewa");
}

if (isset($_GET["hapus"])) {
  $id_mobil = $_GET["id_mobil"];
  $index = array_search($id_mobil, array_column($_SESSION["session_sewa"],"id_mobil"));
  array_splice($_SESSION["session_sewa"],$index,1);
  header("location:template.php?page=list_sewa");
}
