<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlysanpham&query=them">Quản lý sản phẩm</a>
            </li>
            <?php if (isset($_SESSION['dangnhap']) && $_SESSION['dangnhap'] == 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlynguoidung&query=them">Quản lý người dùng</a>
            </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?action=quanlydonhang&query=them">Quản lý đơn hàng</a>
            </li>
        </ul>
    </div>
</body>
</html>
