<?php 
include "koneksi.php";
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                           <ul class="form-floating mb-3">
                                               <li style="list-style: none;">
                                                   <label for="username">Username: </label> <br>
                                                   <input type="text" name="username" id="username">
                                               </li>
                                                <br>
                                               <li style="list-style: none;">
                                                   <label for="password">Password: </label> <br>
                                                   <input type="password" name="password" id="password">
                                               </li>
                                               <br>
                                               <li style="list-style: none;">
                                                   <label for="password2">Konfirmasi password: </label> <br>
                                                   <input type="password" name="password2" id="password2">
                                               </li>
                                               <br>
                                               <li style="list-style: none;">
                                                <label for="level">Daftar akun sebagai: </label>
                                                <select name="level" id="level">
                                                    <option value="admin">Admin</option>
                                                    <option value="user">User</option>
                                                </select>
                                               </li>
                                           </ul>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                               <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="login.php">Sudah punya akun? Langsung login saja</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Star Shoes</div>
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
    </body>
</html>

<?php 
if(isset($_POST["register"])){
    $username = strtolower(stripcslashes($_POST["username"]));
    $password = mysqli_escape_string($connect, $_POST["password"]);
    $password2 = mysqli_escape_string($connect, $_POST["password2"]);
    $level = stripslashes($_POST['level']);
    $level = mysqli_real_escape_string($connect, $level);

    // mengecek jika passwordnya sesuai apa tidak
    if($password !== $password2){
        echo "<script>alert('Konfirmasi passwordnya tidak sesuai!');</script>";
        exit;
    }
    
    // mengecek jika usernamenya sudah ada atau belum
    $result1 = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_fetch_assoc($result1)){
        echo "<script>alert('username yang dimasukan sudah ada!')</script>";
        exit;
    }

    $password = md5($password);

    $query = "INSERT INTO users (id, username, password, level) VALUES ('','$username','$password','$level')";

    $result2 = mysqli_query($connect, $query);

    if($result2){
        echo "<script>
                alert('Sukses membuat akun!');
                document.location.href = 'login.php';
              </script>";
    } else {
        echo "<script>
               alert('Gagal membuat akun!');
               document.location.href = 'register.php'; 
              </script>";
    }
}



?>
