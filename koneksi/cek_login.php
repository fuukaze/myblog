<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

if(mysqli_num_rows($data)>0){
    $qry = mysqli_fetch_array($data);
    if($qry['level']=="admin"){
        header("location:../admin/dashboard.php");
    }else if($qry['level']=="user"){
        header("location:../user/dashboard.php");
    }else{
        header("location:../login/login.php");
    }
}
?>