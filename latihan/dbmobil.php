<?php
session_start();
$koneksi = mysqli_connect("localhost","root","","latihan");
if (isset($_POST["action"])){
    $id_mobil = $_POST["id_mobil"];
    $nomor_mobil = $_POST["nomor_mobil"];
    $merk = $_POST["merk"];
    $jenis = $_POST["jenis"];
    $warna = $_POST["warna"];
    $tahun_pembuatan = $_POST["tahun_pembuatan"];
    $biaya_sewa_per_hari = $_POST["biaya_sewa_per_hari"];
    $filename = $_POST["image"];
    $action = $_POST["action"];

  if ($_POST["action"] == "insert"){
   $path = pathinfo($_FILES["image"]["name"]);
   $extensi = $path["extension"];
   $filename =$id_mobil."_".rand(1,1000).".".$extensi;

   $sql = "insert into mobil values('$id_mobil','$nomor_mobil','$merk','$jenis','$warna','$tahun_pembuatan','$biaya_sewa_per_hari','$filename')";


   if (mysqli_query($koneksi,$sql)) {
     // jika eksekusi berhasil
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_mobil/$filename");
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "Insert data has been success"
      );
   }else {
     // jika eksekusi gagal
     $_SESSION["message"] = array(
       "type" => "danger",
       "message" => mysqli_error($koneksi)
     );
   }
   header("location:template.php?page=mobil");
  }else if ($_POST["action"] == "update") {
    if (!empty($_FILES["image"]["name"])) {
      // jika gambar diedit
    $sql = "select * from mobil where id_mobil='$id_mobil'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    //hapus file lama
    if (file_exists("img_mobil/".$hasil["image"])){
      unlink("img_mobil/".$hasil["image"]);
    }
    $path = pathinfo($_FILES["image"]["name"]);
    $extensi = $path["extension"];
    $filename =$id_mobil."_".rand(1,1000).".".$extensi;

    // memebuat perintah $sql_update
    $sql = "update mobil set nomor_mobil='$nomor_mobil',merk='$merk',jenis='$jenis',warna='$warna',tahun_pembuatan='$tahun_pembuatan',biaya_sewa_per_hari='$biaya_sewa_per_hari',image='$filename' where id_mobil='$id_mobil'";

    if (mysqli_query($koneksi,$sql)) {
      //jika query sukses
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_mobil/$filename");
      $_SESSION["message"] = array(
        "type" => "success",
        "message" => "update data has been success"
      );
    }else {
      //jika query gagal
      $_SESSION["message"] = array(
        "type" => "danger",
        "message" => mysqli_error($koneksi)
      );
      }

    }else {
      //jika gambar tidak diedit
      $sql = "update mobil set nomor_mobil='$nomor_mobil',merk='$merk',jenis='$jenis',warna='$warna',tahun_pembuatan='$tahun_pembuatan',biaya_sewa_per_hari='$biaya_sewa_perhari',image='$filename' where id_mobil='$id_mobil'";
      if (mysqli_query($koneksi,$sql)){
        //jika query sukses
        $_SESSION["message"] = array(
          "type" => "success",
          "message" => "update data has been success"
        );
      }else {
        //jika query gagal
        $_SESSION["message"] = array(
          "type" => "danger",
          "message" => mysqli_error($koneksi)
        );
      }
    }
    header("location:template.php?page=mobil");
  }
}



if (isset($_GET["hapus"])){
  $id_mobil = $_GET["id_mobil"];
  $sql = "select * from mobil where id_mobil='$id_mobil'";
  $result = mysqli_query($koneksi,$sql);
  $hasil = mysqli_fetch_array($result);
  if (file_exists("img_mobil/".$hasil["image"])) {
    unlink("img_mobil/".$hasil["image"]);
  }
  $id_mobil = $_GET["id_mobil"];
  $sql = "delete from mobil where id_mobil = '$id_mobil'";
  if (mysqli_query($koneksi,$sql)) {
    // jika query sukses
    $_SESSION["message"] = array(
      "type" => "success",
      "message" => "delete data has been success"
    );
  }else{
    //jika query gagal
    $_SESSION["message"] = array(
      "type" => "danger",
      "message" => mysqli_error($koneksi)
    );
  }
}
  header("location:template.php?page=mobil");

 ?>
