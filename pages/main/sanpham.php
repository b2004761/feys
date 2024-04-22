<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết sản phẩm</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add your custom styles here */
        .warpper_deital {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-bottom: 20px;
        }
        .hinhanh_sanpham img {
            max-width: 200px;
            height: auto;
        }
        .chitiet_sanpham {
            margin-left: 20px;
        }
        .themgiohang {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            // Your PHP code here
            $sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
            $query_chitiet = mysqli_query($connect, $sql_chitiet);
            while ($row_chitiet = mysqli_fetch_array($query_chitiet)) {
        ?>
        <div class="warpper_deital">
            <div class="hinhanh_sanpham">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>" class="img-fluid" alt="Hình ảnh sản phẩm">
            </div>
            <form action="pages/main/giohang/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham'] ?>" method="POST">
                <div class="chitiet_sanpham">
                    <h3><?php echo $row_chitiet['tensanpham'] ?></h3>
                    <p>Mã: <?php echo $row_chitiet['masanpham'] ?></p>
                    <p>Giá: <?php echo number_format($row_chitiet['giasanpham'],0,',','.').'vnd' ?></p>
                    <p>Số lượng: <?php echo $row_chitiet['soluong'] ?></p>
                    <p>Danh mục sản phẩm: <?php echo $row_chitiet['tendanhmuc'] ?></p>
                    <button type="submit" name="themgiohang" class="btn btn-primary themgiohang">Thêm Giỏ Hàng</button>
                </div>
            </form>
        </div>
        <?php
            }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
