<?php
if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = md5($_POST['password']);
    $sql = "SELECT * FROM tbl_dangky ,tbl_admin WHERE tbl_dangky.taikhoan='" . $taikhoan . "' AND tbl_dangky.matkhau='" . $matkhau . "'  LIMIT 1";
    $row = mysqli_query($connect, $sql);
    $count = mysqli_num_rows($row);
    if ($count > 0) {
        $row_data = mysqli_fetch_array($row);
        $_SESSION['dangky'] = $row_data['taikhoan'];
        $_SESSION['email'] = $row_data['email'];
        $_SESSION['id_khachhang'] = $row_data['id_khachhang'];
        header("Location:index.php");
    } elseif ($taikhoan == 'admin') {
        header("Location:admincp/login.php");
    } else {
        $error_message = 'Mật khẩu hoặc Email sai, vui lòng nhập lại.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
   
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="text-center">ĐĂNG NHẬP</h1>
                        <form id="loginForm" action="" method="POST">
                            <div class="form-group">
                                <label for="taikhoan">Tài Khoản</label>
                                <input type="text" class="form-control" id="taikhoan" name="taikhoan">
                            </div>
                            <div class="form-group">
                                <label for="matkhau">Mật khẩu</label>
                                <input type="password" class="form-control" id="matkhau" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="dangnhap">Đăng Nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script_login.js"></script>
</body>
</html>
