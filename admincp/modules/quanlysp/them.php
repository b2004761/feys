<br><br><center><h1>Thêm sản phẩm</h1></center>
<div class="container">
    <form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tensanpham">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="tensanpham" name="tensanpham" required>
                </div>
                <div class="form-group">
                    <label for="masp">Mã sản phẩm</label>
                    <input type="text" class="form-control" id="masp" name="masp" required>
                </div>
                <div class="form-group">
                    <label for="giasp">Giá</label>
                    <input type="number" class="form-control" id="giasp" name="giasp" required>
                </div>
                <div class="form-group">
                    <label for="soluong">Số lượng</label>
                    <input type="number" class="form-control" id="soluong" name="soluong" required>
                </div>
                <div class="form-group">
                    <label for="hinhanh">Hình ảnh</label>
                    <input type="file" class="form-control-file" id="hinhanh" name="hinhanh" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tomtat">Tóm tắt</label>
                    <textarea class="form-control" id="tomtat" name="tomtat" rows="5" style="resize: none;" required></textarea>
                </div>
                <div class="form-group">
                    <label for="noidung">Nội dung</label>
                    <textarea class="form-control" id="noidung" name="noidung" rows="5" style="resize: none;" required></textarea>
                </div>
                <div class="form-group">
                    <label for="danhmuc">Danh mục sản phẩm</label>
                    <select class="form-control" id="danhmuc" name="danhmuc" required>
                        <?php
                        $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
                        $query_danhmuc = mysqli_query($connect, $sql_danhmuc);
                        while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) {
                        ?>
                            <option value="<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hienthi">Tình trạng</label>
                    <select class="form-control" id="hienthi" name="hienthi" required>
                        <option value="1">Mới</option>
                        <option value="0">Cũ</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="themsanpham">Thêm sản phẩm</button>
        </div>
    </form>
</div>
