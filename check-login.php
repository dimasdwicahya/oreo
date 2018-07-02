<?php
session_start(); //memulai session

//check apakah ada akses post dari halaman login?, jika tidak kembali kehalaman depan
if( !isset($_POST['username']) ) { header('location:index.php'); exit(); }
$error = ''; //set nilai default dari error,

require ( 'dbconfig.php' );
$username = trim( $_POST['username'] );
$password = trim( $_POST['password'] );

if( strlen($username) < 2 )
{
 //validasi username tidak bpleh kosong
 $error = 'Username tidak boleh kosong';
}else if( strlen($password) < 2 )
{
 //validasi password tidak boleh kosong
 $error = 'Password Tidak boleh kosong';
}else{
 //mengubah semua karakter ke bentuk string
 $username = $db->escape_string($username);
 $password = $db->escape_string($password);

 //hash dengan md5
 $password = md5($password);

 //SQL command untuk memilih data berdasarkan parameter $username dan $password yang diinputkan
 $sql = "SELECT nama, level FROM tb_user
   WHERE username='$username'
   AND password='$password' LIMIT 1";

 //melakukan perintah
 $query = $db->query($sql);

 //check query
 if( !$query )
 {
  die( 'Oops!! Sepertinya ada kesalahan database '. $db->error );
 }

 //check hasil perintah
 if( $query->num_rows == 1 )
 {
  //jika data yang dimaksud ada maka akan ditampilkan
  $row =$query->fetch_assoc();

  //data nama disimpan di session browser
  $_SESSION['nama_u'] = $row['nama'];
  $_SESSION['akses']    = $row['level'];

  if( $row['level'] === 'manager')
  {
   //data hak Admin di set
   $_SESSION['saya_manager']= 'TRUE';
   //menuju halaman sesuai hak akses
  header('location:manager/index.php');
  exit();
  }

 else if( $row['level'] === 'teknisi')
  {
   //data hak Admin di set
   $_SESSION['saya_teknisi']= 'TRUE';
   //menuju halaman sesuai hak akses
  header('location:teknisi/index.php?page=dashboard');
  exit();
  }
  

 }else{

  //jika data yang dimaksud tidak ada
  $error = '<div class="alert alert-danger" role="alert">Username dan Password Tidak ditemukan </div>';
 }

}

if( !empty($error) )
{
 //simpan error pada session
 $_SESSION['error'] = $error;
 header('location:'.$url.'/');
 exit();
}
?>
