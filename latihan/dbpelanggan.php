<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","latihan");
if (isset($_POST["action"])) {
  $id_pelanggan = $_POST["id_pelanggan"];
  $nama_pelanggan = $_POST["nama_pelanggan"];
  $alamat_pelanggan = $_POST["alamat_pelanggan"];
  $kontak = $_POST["kontak"];
  $username = $_POST["username"];
  $password = $_POST["password"];
  $action = $_POST["action"];

  if ($action == "insert") {

    $sql = "insert into pelanggan values('$id_pelanggan','$nama_pelanggan','$alamat_pelanggan','$kontak','$username','$password')";
    if (mysqli_query($koneksi,$sql)) {
      // JIKA BERHASIL

      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Data Uploaded"
      );
    }else {
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
    header("location:template.php?page=pelanggan");
  }else if ($action == "update") {

    $sql = "update pelanggan set nama_pelanggan='$nama_pelanggan',alamat_pelanggan='$alamat_pelanggan',kontak='$kontak',username='$username',password='$password' where id_pelanggan='$id_pelanggan'";
    if (mysqli_query($koneksi,$sql)) {


      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Data Uploaded"
      );
    }else {
      // JIKA GAGAL
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
    }
  }
    header("location:template.php?page=pelanggan");
  }
  if (isset($_GET["hapus"])) {
    $id_pelanggan = $_GET["id_pelanggan"];
    $sql = "select * from pelanggan where id_pelanggan='$id_pelanggan'";
    //eksekusi query
    $result = mysqli_query($koneksi,$sql);
    // konversi ke array
    $hasil = mysqli_fetch_array($result);

      // Jika yang dikirim adalah variable get Hapus
      $id_pelanggan = $_GET["id_pelanggan"];
      $sql = "delete from pelanggan where id_pelanggan='$id_pelanggan'";

  if (mysqli_query($koneksi,$sql)) {
    // JIKA BERHASIL
    $_SESSION["message"] = array(
      "type" => "success",
      "message" => "Data Deleted"
    );
  }else {
    // JIKA GAGAL
    $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
    );
  }
}
  header("location:template.php?page=pelanggan");
?>
