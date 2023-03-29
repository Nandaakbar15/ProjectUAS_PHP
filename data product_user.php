<?php 
session_start();

if($_SESSION['status']!="login"){
    header("location:login.php");
}

include 'koneksi.php';


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Halaman produk - User</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
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
                            <a class="nav-link" href="indexuser.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link" href="data product_user.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                List Produk
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION['level'];?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Produk</li>
                        </ol>

                        <h1><a href="tambahbarang.php"><font color="black">Tambah Barang</font></a></h1>
                        <br>

                        <form action="" method="post">
                            <input type="text" name="keyword" id="keyword" size="30" autofocus placeholder="Cari..">
                            <button type="submit" class="btn btn-primary" name="submit">Cari!</button>
                        </form>
                       
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                List produk
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Nama</th>
                                            <th>Merek</th>
                                            <th>Stok</th>
                                            <th>Harga</th>
                                            <th>Gambar</th>
                                        </tr>
                                        <?php 
                                        $no = 1;

                                        if(isset($_POST["submit"])){
                                            $keyword = $_POST["keyword"];

                                            $query = "SELECT * FROM product WHERE nama LIKE '%".$keyword."%' OR 
                                                                                  merek_sepatu LIKE '%".$keyword."%' OR
                                                                                  stok LIKE '%".$keyword."%' OR
                                                                                  harga LIKE '%".$keyword."%'";

                                        } else {
                                            $query = "SELECT * FROM product";
                                        }
                                        
                                        $result = mysqli_query($connect, $query);

                                        $jumlah = mysqli_num_rows($result);
                                        ?>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php if($jumlah > 0) { ?>
                                            <?php 
                                            foreach($result as $data) : ?>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $data["nama"]; ?></td>
                                            <td><?php echo $data["merek_sepatu"]; ?></td>
                                            <td><?php echo $data["stok"]; ?></td>
                                            <td><?php echo "Rp. " . $data["harga"]; ?></td>
                                            <td><img src="images/<?php echo $data["gambar"]; ?>" width="60" height="60"></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php } else { ?>
                                        <td colspan="7"><h4 align="center"><?php echo "Data tidak ditemukan"; ?></h4></td>
                                    <?php } ?>
                                    </tbody>
                                </table>
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
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
                                        