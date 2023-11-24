<?php
session_start();
$fullName = isset($_SESSION['user']['fullName']) ? $_SESSION['user']['fullName'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/css.css">
    <script src="https://kit.fontawesome.com/509cc166d7.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <header>
            <div class="userpage">
                <?php if ($fullName !== null): ?>
                    <a href="#">Xin chào <?php echo $fullName; ?></a>
                <?php else: ?>
                    <a href="#">Xin chào Khách</a>
                <?php endif; ?>
                <a href="index.php?act=logout">Đăng xuất</a>
            </div>
        </header>
        <main>
            <div class="box-left">
                <div class="logo">
                    <img src="../img/logo.jpg" alt="" width="100%">
                </div>
                <div class="menu-list" id="menuList">
                    <a href="index.php"><i class="fas fa-bell"></i> Thông Báo</a>
                    <a href="index.php?act=schedule" ><i class="far fa-calendar-alt"></i> Lịch Học</a>
                    <a href="index.php?act=poin"><i class="fas fa-graduation-cap"></i> Điểm</a>
                    <a href="#"><i class="fas fa-concierge-bell"></i> Dịch Vụ</a>
                </div>
            </div>
     