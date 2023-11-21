<?php
require('../../models/PDO.php');

session_start();
if (isset($_SESSION['user'])) {
    // Nếu đã đăng nhập, gán thông tin người dùng vào biến $user
    $user = $_SESSION['user'];
} else {
    // Nếu chưa đăng nhập, có thể chuyển hướng hoặc xử lý khác (ví dụ: đưa về trang đăng nhập)
    header("Location: ../../controller/student/login/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/css.css">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="userpage">
                <a href="#">Xin Chào , <?php echo $user['fullName']   ?></a>
                <a href="#">Đăng xuất</a>
            </div>
            
        </header>
        <main>
    <div class="box-left">
        <div class="menu-list" id="menuList">
            <a href="index.php"><i class="fas fa-bell"></i> Thông Báo</a>
            <a href="index.php?act=schedule" ><i class="far fa-calendar-alt"></i> Lịch Học</a>
            <a href="index.php?act=poin"><i class="fas fa-graduation-cap"></i> Điểm</a>
            <a href="#"><i class="fas fa-concierge-bell"></i> Dịch Vụ</a>
        </div>
    </div>        
    
        
        
        
        

        

       
