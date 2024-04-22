<?php
    $sql_lietke_nguoidung = "SELECT * FROM tbl_dangky ORDER BY id_khachhang DESC";
    $result_lietke_nguoidung = mysqli_query($connect, $sql_lietke_nguoidung);
?>
<br><br><center><h1>Danh sách người dùng</h1></center><br><br>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Account</th>
                <th>Email</th>
                <th>Number phone</th>
                <th>Address</th>
                <th colspan="2">Actions</th>
                <th>Chức vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result_lietke_nguoidung)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['hovaten'] ?></td>
                    <td><?php echo $row['taikhoan'] ?></td>
                    <td><?php echo $row['email'] ?></td>
                    <td><?php echo $row['sodienthoai'] ?></td>
                    <td><?php echo $row['diachi'] ?></td>
                    <td>
                        <a href="?action=quanlynguoidung&query=sua&idnguoidung=<?php echo $row['id_khachhang'] ?>" class="btn btn-primary">Sửa</a>
                    </td>
                    <td>
                        <a href="modules/quanlynguoidung/xuly.php?idnguoidung=<?php echo $row['id_khachhang'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                    <td><?php echo ($row['chucvu'] == 1) ? "Bán hàng" : "Không"; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
