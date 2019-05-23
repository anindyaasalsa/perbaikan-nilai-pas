<?php
session_start();

$username = $_POST["username"];
$password = md5($_POST["password"]);


$koneksi = mysqli_connect("localhost","root","","latihan");
$sql = "select * from karyawan where username = '$username' and password='$password'";//eksekusi array
$result = mysqli_query($koneksi,$sql);//konversi ke array
$jumlah = mysqli_num_rows($result);

if ($jumlah == 0){
  $_SESSION["message"] = array("type" => "danger","message" => "Username/Password salah");
  header("location:login.php");
}else{
  $_SESSION["session_karyawan"] = mysqli_fetch_array($result);
  header("location:template.php");
}

if (isset($_GET["logout"])){

  session_destroy();
  header("location:login.php");
}
 ?>
