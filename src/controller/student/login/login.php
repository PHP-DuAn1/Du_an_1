<?php
require('../../../models/PDO.php');
require('../../../models/Users.php');
session_start(); // Bắt đầu phiên đăng nhập
 
$error = ''; // Sửa tên biến

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kiểm tra xem người dùng có tồn tại hay không
    $user = checkUser($email, $password);

    if ($user) {
        // Đăng nhập thành công
        $_SESSION['user'] = $user; // Lưu thông tin người dùng vào phiên đăng nhập

        // Chuyển hướng đến trang chủ
        header('Location: ../index.php');
        exit(); // Đảm bảo dừng việc thực thi mã nguồn sau header
    } else {
        // Đăng nhập thất bại
        $error = 'Sai email hoặc mật khẩu'; // Sửa tên biến
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/register.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="content-left">
            <form class="form-all" method="post" action=""> <!-- Thêm method và action vào form -->
                <h1>ĐĂNG NHẬP</h1>
                <div class="form-all">
                    <input type="email" name="email" id="" class="input-form" placeholder="Email" />
                </div>
                <div class="form-all">
                    <input type="password" name="password" id="" class="input-form" placeholder="Mật khẩu" />
                </div>
                <div>
                <?php echo $error; ?> 
            </div>
            <br>
                <div class="submit-container">
                    <input type="submit" value="Đăng nhập" class="submit-form" />
                </div>
            </form>
            <div class="footer-links">
                <a href="#">Quay về home</a>
            </div>
          
        </div>
        <div class="content-right">
            <img src="../../../img/loginStudent.jpg" alt="" />
        </div>
    </div>
</body>
</html>
