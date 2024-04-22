<br><br><center><h1>Thêm danh mục sản phẩm</h1></center><br><br>
<div class="container">
    <form method="POST" action="modules/quanlydanhmucsp/xuly.php">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tendanhmuc">Tên danh mục</label>
                    <input type="text" class="form-control" id="tendanhmuc" name="tendanhmuc" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="thutu">Thứ tự</label>
                    <input type="number" class="form-control" id="thutu" name="thutu" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm danh mục sản phẩm</button>
        </div>
    </form>
</div>
