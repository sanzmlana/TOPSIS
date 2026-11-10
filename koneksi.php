<?php
$koneksi = mysqli_connect("localhost","root","","topsis");
if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
