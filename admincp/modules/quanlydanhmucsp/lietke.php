<?php
    $sql_lietke = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $result_lietke = mysqli_query($connect, $sql_lietke);
?>
<br><br><center><h1>Liệt kê danh mục sản phẩm</h1></center><br><br>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Thứ tự</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result_lietke)) {
                $i++;
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['tendanhmuc'] ?></td>
                    <td><?php echo $row['thutu'] ?></td>
                    <td>
                        <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc'] ?>" class="btn btn-danger">Xóa</a>
                        <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc'] ?>" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
