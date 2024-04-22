<style>
    .thongtin {
        width: 100%;
        border-radius: 10px;
        padding: 20px;
        background: #f9f9f9;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    .thongtin p {
        font-size: 18px;
        color: #333;
        margin: 10px 0;
    }

    .thongtin h2 {
        font-size: 24px;
        color: #3498db;
        margin-bottom: 20px;
    }

    .thongtin span {
        color: #e74c3c;
    }

    .thongtin-details {
        padding: 15px;
        background: #fff;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .thongtin-details p {
        margin: 10px 0;
    }
</style>


<div class="thongtin">
<p>Thông tin cá nhân</p>

    <?php
    if(isset($_SESSION['dangky'])){
        echo '<h2>Xin chào: <span>'.$_SESSION['dangky'].'</span></h2>';
        $id = $_SESSION['dangky'];
        $sql_thongtin = "SELECT * FROM tbl_dangky WHERE taikhoan='$id' LIMIT 1";
        $query_thongtin = mysqli_query($connect, $sql_thongtin);
        
        while($row = mysqli_fetch_array($query_thongtin)){
            echo '<div class="thongtin-details">';
            echo '<p><strong>Họ và tên:</strong> '.$row['hovaten'].'</p>';
            echo '<p><strong>Email:</strong> '.$row['email'].'</p>';
            echo '<p><strong>Địa chỉ:</strong> '.$row['diachi'].'</p>';
            echo '<p><strong>Số điện thoại:</strong> '.$row['sodienthoai'].'</p>';
            echo '</div>';
        }
    }
    ?>
</div>
