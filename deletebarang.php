<?php 
include "koneksi.php";
$id = $_GET["id"];

$query = "DELETE FROM product WHERE id = $id";
$result = mysqli_query($connect, $query);

if($result){
	echo "<script>
		  alert('data berhasil dihapus!');
		  document.location.href = 'data product.php';	
		  </script>";
} else {
	echo "<script>
		  alert('data gagal dihapus!');
		  document.location.href = 'data product';	
	      </script>";
}

?>