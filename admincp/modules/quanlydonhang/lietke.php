<?php
    $sql_lietke_dh = "SELECT * FROM tbl_giohang ,tbl_dangky  WHERE tbl_giohang.id_khachhang=tbl_dangky.id_khachhang ORDER BY id_cart DESC";
    $result_lietke_dh = mysqli_query($connect, $sql_lietke_dh);
?>
<br><br> <center><h1>Danh sách đơn hàng của người dùng</h1></center><br><br>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Tài khoản</th>
                <th>Hình thức thanh toán</th>
                <th>Điện thoại</th>
                <th>Tình trạng</th>
                <th colspan="2">Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result_lietke_dh)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['code_cart'] ?></td>
                    <td><?php echo $row['hovaten'] ?></td>
                    <td><?php echo $row['diachi'] ?></td>
                    <td><?php echo $row['taikhoan'] ?></td>
                    <td><?php echo $row['cart_payment'] ?></td>
                    <td><?php echo $row['sodienthoai'] ?></td>
                    <td>
                        <?php 
                        if ($row['cart_status'] == 1) {
                            echo '<span class="badge badge-primary">Đơn hàng mới</span>';
                        } else {
                            echo '<span class="badge badge-success">Đã xem</span>';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="index.php?action=quanlydonhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>" class="btn btn-info">Xem đơn hàng</a>
                    </td>
                    <td>
                        <a href="modules/quanlydonhang/xuly.php?iddonhang=<?php echo $row['code_cart'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
