<?php
session_start();
include "koneksi.php";

if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['id_admin'] = $data['id_admin'];
        $_SESSION['nama'] = $data['nama'];

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | Sistem Manajemen Perpustakaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-primary text-white text-center rounded-top-4">

                    <h3 class="mt-2">📚 Sistem Manajemen Perpustakaan</h3>
                    <p class="mb-2">Silakan Login</p>

                </div>

                <div class="card-body p-4">

                    <?php
                    if(isset($error)){
                    ?>

                    <div class="alert alert-danger">
                        <?php echo $error; ?>
                    </div>

                    <?php
                    }
                    ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                Username
                            </label>

                            <input
                                type="text"
                                name="username"
                                class="form-control"
                                placeholder="Masukkan Username"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Masukkan Password"
                                required>

                        </div>

                        <div class="d-grid">

                            <button
                                type="submit"
                                name="login"
                                class="btn btn-primary">

                                Login

                            </button>

                        </div>

                    </form>

                </div>

                <div class="card-footer text-center">

                    <small>
                        © <?php echo date('Y'); ?> Sistem Manajemen Perpustakaan
                    </small>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>