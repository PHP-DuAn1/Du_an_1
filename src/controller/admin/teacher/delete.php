<?php
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\Users.php');
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\PDO.php');

// Kiểm tra xóa giáo viên
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $teacherId = $_GET['id'];
    // Gọi hàm xóa giáo viên
    deleteUsers($teacherId);

    // Chuyển hướng người dùng về trang danh sách
    header("Location: list.php");
    exit();
}
