<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .cart-img {
            max-height: 200px;
            width: auto;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mt-4">Giỏ hàng của bạn</h2>
            <p>
                <?php
                if (isset($_SESSION['dangky'])) {
                    echo 'Xin chào: <span style="color:red">' . $_SESSION['dangky'] . '</span>';
                }
                ?>
            </p>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Thành tiền</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['cart'])) {
                            $i = 0;
                            $tongtien = 0;
                            foreach ($_SESSION['cart'] as $cart_item) {
                                $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                                $tongtien += $thanhtien;
                                $i++;
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><?php echo $cart_item['masp'] ?></td>
                                    <td><?php echo $cart_item['tensanpham'] ?></td>
                                    <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" class="img-fluid" style="max-height: 100px;"></td>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary btn-minus" data-id="<?php echo $cart_item['id'] ?>">-</button>
                                            </div>
                                            <input type="text" class="form-control text-center qty" value="<?php echo $cart_item['soluong'] ?>" readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary btn-plus" data-id="<?php echo $cart_item['id'] ?>">+</button>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo number_format($cart_item['giasanpham'], 0, ',', '.') . ' VNĐ' ?></td>
                                    <td><?php echo number_format($thanhtien, 0, ',', '.') . ' VNĐ' ?></td>
                                    <td><a href="pages/main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>" class="btn btn-danger">Xóa</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <td colspan="6" class="text-right">Tổng tiền:</td>
                                <td colspan="2"><strong><?php echo number_format($tongtien, 0, ',', '.') . ' VNĐ' ?></strong></td>
                            </tr>
                            <tr>
                                <td colspan="8">
                                    <?php
                                    if (isset($_SESSION['dangky'])) {
                                    ?>
                                        <a href="pages/main/thanhtoan/index.php?quanly=vanchuyen" class="btn btn-success">Đặt hàng</a>
                                    <?php
                                    } else {
                                    ?>
                                        <a href="index.php?quanly=dangnhap" class="btn btn-primary">Đăng nhập đặt hàng</a>
                                    <?php
                                    }
                                    ?>
                                    <a href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet" class="btn btn-danger ml-2">Xóa hết</a>
                                </td>
                            </tr>
                        <?php
                        } else {
                        ?>
                            <tr>
                                <td colspan="8" class="text-center">Hiện tại giỏ hàng trống</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $(".btn-plus").click(function() {
            var id = $(this).data('id');
            var qtyElement = $(this).closest('tr').find('.qty');
            var qty = parseInt(qtyElement.val());
            qty++;
            qtyElement.val(qty);
            updateCart(id, qty);
        });

        $(".btn-minus").click(function() {
            var id = $(this).data('id');
            var qtyElement = $(this).closest('tr').find('.qty');
            var qty = parseInt(qtyElement.val());
            if (qty > 1) {
                qty--;
                qtyElement.val(qty);
                updateCart(id, qty);
            }
        });

        function updateCart(id, qty) {
            // Gửi Ajax request để cập nhật số lượng sản phẩm trong giỏ hàng
        }
    });
</script>

</body>

</html>
