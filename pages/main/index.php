<?php
if (isset($_GET['trang'])) {
	$page = $_GET['trang'];
} else {
	$page = 1;
}
if ($page == '' || $page == 1) {
	$begin = 0;
} else {
	$begin = ($page * 10) - 10;
}
// GET id là lấy id từ bên MENU.php 
$sql_show = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,10";
$query_show = mysqli_query($connect, $sql_show);


?>




<ul class="product_list">

	<?php
	while ($row = mysqli_fetch_array($query_show)) {
	?>
		<li>
			<a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
				<img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
				<p class="title_product"> <?php echo $row['tensanpham'] ?></p>
				<p class="price_product">Giá: <?php echo number_format($row['giasanpham'], 0, ',', '.') . 'vnd' ?></p>
				<p><?php echo $row['tendanhmuc'] ?></p>
			</a>

		</li>

	<?php
	}
	?>
</ul>
<div style="clear:both;"></div>
<style type="text/css">
	ul.pagination {
		padding: 0;
		margin: 0;
		list-style: none;
		display: flex;
		justify-content: center;
	}

	ul.pagination li {
		margin: 0 5px;
	}

	ul.pagination li a {
		color: #000;
		text-align: center;
		text-decoration: none;
		padding: 5px 10px;
		border: 1px solid #ccc;
		border-radius: 3px;
	}

	ul.pagination li.active a {
		background: brown;
		color: #fff;
	}
</style>
<?php
$sql_trang = mysqli_query($connect, "SELECT * FROM tbl_sanpham");
$row_count = mysqli_num_rows($sql_trang);
$trang = ceil($row_count / 10);
?>
<center><p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?> </p></center>

<ul class="pagination">
	<?php
	for ($i = 1; $i <= $trang; $i++) {
	?>
		<li <?php if ($i == $page) {
				echo 'class="active"';
			} ?>>
			<a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a>
		</li>
	<?php
	}
	?>
</ul>
