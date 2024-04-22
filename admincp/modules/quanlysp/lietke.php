<?php     
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham ,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham DESC";
    $result_lietke_sp = mysqli_query($connect, $sql_lietke_sp);
?>

<br><br><center><h1>Liệt kê danh mục sản phẩm</h1></center>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Mã sản phẩm</th>
                <th>Tóm tắt</th>
                <th>Trạng thái</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result_lietke_sp)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['tensanpham'] ?></td>
                    <td>
                        <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="150" alt="Hình ảnh sản phẩm">
                    </td>
                    <td><?php echo number_format($row['giasanpham'], 0, ',', '.') . 'VNĐ' ?></td>
                    <td><?php echo $row['soluong'] ?></td>
                    <td><?php echo $row['tendanhmuc'] ?></td>
                    <td><?php echo $row['masanpham'] ?></td>
                    <td><?php echo $row['tomtat'] ?></td>
                    <td><?php echo ($row['trangthai'] == 1) ? "Mới" : "Cũ"; ?></td>
                    <td>
                        <a href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham'] ?>" class="btn btn-danger">Xóa</a>
                        <a href="?action=quanlysanpham&query=sua&idsanpham=<?php echo $row['id_sanpham'] ?>" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
