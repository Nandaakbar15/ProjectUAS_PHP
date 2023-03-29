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
            <a class="navbar-brand ps-3" href="index.html">Star Shoes Star</a>
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
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
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
                                        <?php 
                                        $id = $_GET["id"];
                                        $query = "SELECT * FROM product WHERE id = $id";
                                        $result = mysqli_query($connect, $query);
                                        foreach($result as $data) {


                                        ?>
                                        <form action="" method="POST" enctype="multipart/form-data">
                                        	<input type="hidden" name="id" value="<?php echo $data["id"]; ?>">
                                        	<input type="hidden" name="gambarLama" value="<?php echo $data["gambar"]; ?>">
                                        	<ul>
                                        		<li style="list-style: none;">
                                        			<label for="nama">Nama: </label>
                                        			<input type="text" name="nama" id="nama" required value="<?php echo $data["nama"]; ?>">
                                        		</li>
                                        		<br>
                                        		<li style="list-style: none;">
                                        			<label for="merek_sepatu">Merek: </label>
                                        			<input type="text" name="merek_sepatu" id="merek_sepatu" required value="<?php echo $data["merek_sepatu"]; ?>">	
                                        		</li>
                                        		<br>
                                        		<li style="list-style: none;">
                                        			<label for="stok">Stok: </label>
                                        			<input type="text" name="stok" id="stok" required value="<?php echo $data["stok"]; ?>">
                                        		</li>
                                        		<br>
                                        		<li style="list-style: none;">
                                        			<label for="harga">Harga: </label>
                                        			<input type="text" name="harga" id="harga" required value="<?php echo $data["harga"]; ?>">
                                        		</li>
                                        		<li style="list-style: none;">
                                        			<label for="gambar">Gambar: </label>
                                        			<img src="images/<?php echo $data["gambar"]; ?>" width="50">
                                        			<input type="file" name="gambar" id="gambar">
                                        		</li>
                                        	</ul>
                                        	<button type="submit" name="submit" class="btn btn-primary">Edit!</button>
                                        	<a href="index.php" class="btn btn-primary">Kembali</a>	
                                        </form>
                                    <?php } ?>
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
if(isset($_POST['submit'])){
        // Membuat variable setiap field inputan agar kodingan lebih rapi.
        $nama = $_POST['nama'];
        $merek = $_POST['merek_sepatu'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $gambarLama = $_POST['gambarLama'];
        
        // data gambar yang baru
        $filename = $_FILES['gambar']['name'];
        $error = $_FILES['gambar']['error'];
        $tmp_name = $_FILES['gambar']['tmp_name'];

        // jika ganti gambar
        if($filename != ''){
            $ekstensigambar1 = explode('.', $filename);
            $ekstensigambar2 = $ekstensigambar1[1];

            $namaFileBaru = 'images'.time().'.'.$ekstensigambar2;

            // menampung data format file yang diizinkan
            $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];

            // validasi format file
            if(!in_array($ekstensigambar2, $ekstensigambarvalid)){
                // jika format file tidak ada di dalam tipe diizinkan
                echo '<script>alert("Format file tidak diizinkan")</scrtip>';

            }else{
                unlink('images/'.$gambarLama);
                move_uploaded_file($tmp_name, 'images/'.$namaFileBaru);
                $namagambar = $namaFileBaru;
            }

        }else{
            // jika tidak ganti gambar
            $namagambar = $gambarLama;
                            
        }


      // Membuat Query
        $query = "UPDATE product SET nama = '$nama', merek_sepatu = '$merek', stok = '$stok', gambar = '$namagambar' WHERE id = '$id'";

        $result = mysqli_query($connect, $query);

        if($result){
            echo "<script>alert('Data Berhasil diupdate!');
                document.location.href = 'index.php';
              </script>";
        
        } else {
            echo "<script>alert('Data Gagal diupdate!');
                document.location.href = 'index.php';
              </script>";
        }

    }    

?>
