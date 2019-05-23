<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","latihan");
if (isset($_POST["action"])){
  $id_karyawan = $_POST["id_karyawan"];
  $nama_karyawan = $_POST["nama_karyawan"];
  $alamat_karyawan= $_POST["alamat_karyawan"];
  $kontak = $_POST["kontak"];
  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  $action = $_POST["action"];

  if ($action == "insert"){

  $sql = "insert into karyawan values('$id_karyawan','$nama_karyawan','$alamat_karyawan','$kontak','$username','$password')";
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
  header("location:template.php?page=karyawan");
} else if($action == "update"){
    $sql = "update karyawan  set nama_karyawan='$nama_karyawan', alamat_karyawan='$alamat_karyawan',kontak='$kontak',username='$username',password='$password' where id_karyawan='$id_karyawan'";

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

     header("location:template.php?page=karyawan");
   }

     if (isset($_GET["hapus"])) {
       $id_karyawan = $_GET["id_karyawan"];
       $sql = "select * from karyawan where id_karyawan='$id_karyawan'";
       $result = mysqli_query($koneksi,$sql);
       $hasil = mysqli_fetch_array($result);
      $id_karyawan = $_GET["id_karyawan"];
       $sql = "delete from karyawan where id_karyawan='$id_karyawan'";

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
         header("location:template.php?page=karyawan");
       ?>
