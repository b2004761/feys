<style>
    p {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .dangky {
        width: 50%;
        border-collapse: collapse;
    }

    .dangky tr td {
        padding: 10px;
        border: 1px solid #ddd;
    }

    .dangky input[type="text"],
    .dangky input[type="password"],
    .dangky textarea {
        width: calc(100% - 12px);
        padding: 6px;
        border: 1px solid #ddd;
        border-radius: 3px;
        font-size: 16px;
    }

    .dangky input[type="submit"] {
        padding: 10px 20px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .dangky input[type="submit"]:hover {
        background-color: #2980b9;
    }

    .error-message {
        color: red;
        margin-top: 5px;
    }

    .success-message {
        color: green;
        margin-top: 5px;
    }
</style>

<p>Đăng ký thành viên</p>
<form action="" method="POST">
    <table class="dangky">
        <tr>
            <td>Họ và tên</td>
            <td><input type="text" name="hovaten"></td>
        </tr>
        <tr>
            <td>Tài khoản</td>
            <td><input type="text" name="taikhoan"></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau"></td>
        </tr>
        <tr>
            <td>Nhập lại mật khẩu</td>
            <td><input type="password" name="rematkhau"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="dienthoai"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><textarea name="diachi" cols="30" rows="3"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="dangky" value="Đăng ký"></td>
            <td><a href="index.php?quanly=dangnhap">Đăng nhập nếu có tài khoản</a></td>
        </tr>
    </table>
</form>
<div>
    <?php
    if(isset($_POST['dangky'])) {
        $tenkhachhang = $_POST['hovaten'];
        $taikhoan= $_POST['taikhoan'];
        $matkhau = md5($_POST['matkhau']);
        $rematkhau=  md5($_POST['rematkhau']);
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];

        // Validate input
        $errors = [];
        if(empty($tenkhachhang) || empty($taikhoan) || empty($matkhau) || empty($rematkhau) || empty($email) || empty($dienthoai) || empty($diachi)) {
            $errors[] = "Vui lòng nhập đầy đủ thông tin.";
        }
        if($matkhau != $rematkhau) {
            $errors[] = "Mật khẩu không trùng khớp.";
        }

        // Display errors or success message
        if(!empty($errors)) {
            foreach($errors as $error) {
                echo '<p class="error-message">'.$error.'</p>';
            }
        } else {
            $sql_dangky = "INSERT INTO tbl_dangky(hovaten,taikhoan,matkhau,sodienthoai,email,diachi) VALUE('".$tenkhachhang."','".$taikhoan."','".$matkhau."','".$dienthoai."','".$email."','".$diachi."')";
            $query_dangky=mysqli_query($connect,$sql_dangky);
            if($query_dangky) {
                echo '<p class="success-message">Bạn đã đăng ký thành công.</p>';
                $_SESSION['dangky'] = $taikhoan;
                $_SESSION['email'] = $email;
                $_SESSION['id_khachhang'] = mysqli_insert_id($connect);
            }
        }
    }
    ?>
</div>
