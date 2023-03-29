<?php 
$connect = mysqli_connect("localhost", "root", "", "barang");

if($connect){
	echo "koneksi ke database berhasil";
} else {
	echo "koneksi ke database gagal";
}

?>