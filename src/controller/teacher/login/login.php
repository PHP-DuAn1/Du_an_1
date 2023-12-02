<?php
require('../../../models/PDO.php');
require('../../../models/Users.php');
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = checkUser($email, $password);
    $checkStudent = getDefaultRoleTeacher();  
    if ($checkStudent && $user) {
        // Lưu thông tin người dùng vào session
        $_SESSION['user'] = $user;

        header('Location: ../index.php');
        exit();
    } else {
        $error = 'Sai email hoặc mật khẩu';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/register.css">
    <title>Đăng nhập</title>
</head>

<body>
    <div class="container">
        <div class="content-left">
            <form class="form-all" method="post" action="login.php">
                <h1>ĐĂNG NHẬP</h1>
                <div class="form-all">
                    <input type="email" name="email" id="" class="input-form" placeholder="Email" required />
                </div>
                <div class="form-all">
                    <input type="password" name="password" id="" class="input-form" placeholder="Mật khẩu" required />
                </div>
                <div class="error-message">
                    <?php echo $error; ?>
                </div>
                <br>
                <div class="submit-container">
                    <input type="submit" value="Đăng nhập" class="submit-form" />
                </div>
            </form>
            <div class="footer-links">
                <a href="#">Thoát</a>
            </div>
        </div>
        <div class="content-right">
            <img src="../../../img/loginStudent.jpg" alt="" />
        </div>
    </div>
</body>

</html>
