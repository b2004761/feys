<?php
// Truy vấn để lấy danh sách các danh mục từ cơ sở dữ liệu
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($connect, $sql_danhmuc);
?>

<?php
// Xử lý đăng xuất: Nếu biến GET 'dangxuat' tồn tại và có giá trị là 1, hủy phiên đăng nhập bằng cách loại bỏ biến 'dangky' từ phiên
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['dangky']);
}
?>

<div class="menu">
    <!-- Menu chính của trang web -->
    <ul class="menu_list">
        <li><a href="index.php">Trang chủ</a></li> <!-- Liên kết đến trang chủ -->

        <li><a href="index.php?quanly=contact">Liên hệ hỗ trợ</a></li> <!-- Liên kết đến trang liên hệ -->

        <li><a href="index.php?quanly=giohang">Giỏ hàng</a></li> <!-- Liên kết đến trang giỏ hàng -->

        <li><a href="#">Danh mục</a> <!-- Danh sách các danh mục sản phẩm -->
            <ul class="menu_danhmuc">
                <?php
                // Hiển thị các danh mục sản phẩm
                while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                ?>
                    <li><a href="index.php?quanly=danhmuclist&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
                <?php
                }
                ?>
            </ul>
        </li>

        <?php
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION['dangky'])) {
        ?>
            <!-- Nếu đã đăng nhập, hiển thị các liên kết điều hướng đến trang thông tin cá nhân và đăng xuất -->
            <li><a href="index.php?quanly=thongtin">Thông Tin Cá Nhân</a></li>
            <li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
        <?php
        } else {
        ?>
            <!-- Nếu chưa đăng nhập, hiển thị các liên kết điều hướng đến trang đăng nhập và đăng ký -->
            <li><a href="index.php?quanly=dangnhap">Đăng nhập</a></li>
            <li><a href="index.php?quanly=dangky">Đăng ký</a></li>
        <?php
        }
        ?>

        <!-- Form tìm kiếm sản phẩm -->
        <li>
            <form method="POST" action="index.php?quanly=timkiem">
                <input type="text" placeholder="Tìm kiếm....." name="tukhoa">
                <input type="submit" name="timkiem" value="Tìm Kiếm">
            </form>
        </li>
    </ul>
</div>
