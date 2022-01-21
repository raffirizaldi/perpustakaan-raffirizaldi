<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SI Perpustakaan TB</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.15.4-web/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-3">
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col">
                    <?php
                    include('koneksi.php');
                    if (isset($_POST['login'])) {
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        $queryCheck = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username = '$username' AND password = '$password'");
                        $check = mysqli_num_rows($queryCheck);
                        echo $check;

                        if ($check === 1) {
                            session_start();
                            $_SESSION['jabatan'] = "petugas";
                            ?>
                            <script>
                                alert('Anda Berhasil Login');
                                window.location.href='admin.php';
                            </script>
                            <?php                    
                        }else{
                            ?>
                            <script>
                            alert('Anda Gagal Login');
                            window.location.href='login.php';
                            </script>
                            <?php
                        }
                    }
                    ?>
                    <div class="container">
                        <div>
                        <center>
                        <h1>SI Perpustakaan TB</h1>
                        </center>
                        <form action="" method="POST">
                            <div class="form-group">
                                <input name="username" class="form-control" type="text" class="text" placeholder="username">
                            </div>
                            <div class="form-group mt-3">
                                <input name="password" class="form-control" type="password" class="text" placeholder="password">   
                            </div>
                            <div class="form-group mt-3">
                                <button class="btn btn-primary" type="submit" name="login">Login</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"></div>
                </div>
            </div>
            <div class="col-3">
            </div>

        </div>
    </div>
</body>
</html>