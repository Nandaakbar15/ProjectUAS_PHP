<?php 
include "koneksi.php";

if($_SESSION['status']!="login"){
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">Star Shoes Store</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="data product.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Data produk
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Website
                            </div>
                            <div class="card-body">
                                <section>
                                    <article>
                                       <form action="" method="POST" enctype="multipart/form-data">
                                       	<ul>
                                       		<li style="list-style: none;">
                                       			<label for="nama">Nama: </label>
                                       			<input type="text" name="nama" id="nama" required>	
                                       		</li>
                                       		<br>
                                       		<li style="list-style: none;">
                                       			<label for="merek_sepatu">Merek: </label>
                                       			<input type="text" name="merek_sepatu" id="merek_sepatu" required>
                                       		</li>
                                       		<br>
                                       		<li style="list-style: none;">
                                       			<label for="stok">Stok: </label>
                                       			<input type="text" name="stok" id="stok" required>
                                       		</li>
                                       		<br>
                                       		<li style="list-style: none;">
                                       			<label for="harga">Harga: </label>
                                       			<input type="text" name="harga" id="harga">
                                       		</li>
                                       		<br>
                                       		<li style="list-style: none;">
                                       			<label for="gambar">Gambar: </label>
                                       			<input type="file" name="gambar" id="gambar">	
                                       		</li>
                                       		<br>
                                       	</ul>
                                       	<button type="submit" name="submit" class="btn btn-primary">Tambah!</button>
                                       	<a href="index.php" class="btn btn-primary">Kembali</a>	
                                       </form>
                                    </article>
                                </section>
                            </div>
                        </div>
                         
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>

<?php 
if (isset($_POST['submit'])) {
	$nama = $_POST["nama"];
	$merek = $_POST["merek_sepatu"];
	$stok = $_POST["stok"];
	$price = $_POST["harga"];

	$filename = $_FILES["gambar"]["name"];
	$error = $_FILES["gambar"]["error"];
	$tmp_name = $_FILES["gambar"]["tmp_name"];

	if($error === 4){
		echo "<script>alert('Upload gambar terlebih dahulu!');</script>";
	} 

	$ekstensigambar1 = explode('.', $filename);
	$ekstensigambar2 = $ekstensigambar1[1];

	$namaFileBaru = 'pasfoto'.time().'.'.$ekstensigambar2;

	$ekstensigambarValid = ['jpg','jpeg','png'];

	if(!in_array($ekstensigambar2, $ekstensigambarValid)){
		echo "<script>alert('Format yang di upload salah!');</script>";
	} else {
		move_uploaded_file($tmp_name, 'images/'.$namaFileBaru);

		$query = "INSERT INTO product (id, nama, merek_sepatu, stok, harga, gambar) VALUES ('','$nama','$merek','$stok','$price','$namaFileBaru')";

		$result = mysqli_query($connect, $query);

		if($result){
			echo "<script>
				   alert('data berhasil ditambahkan!');
				   document.location.href = 'index.php';	
			      </script>";
		} else {
			echo "<script>
				   alert('data gagal ditambahkan!');
				   document.location.href = 'index.php';	
			      </script>";
		}
	}
	
}


?>
