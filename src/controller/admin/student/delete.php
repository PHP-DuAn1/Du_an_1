<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Users.php');

// Kiểm tra xóa sinh viên
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $studentId = $_GET['id'];
    // Gọi hàm xóa sinh viên
    deleteUsers($studentId);

    // Chuyển hướng người dùng về trang danh sách
    header("Location: /list.php");
    exit();
}
