<?php
require('../../../models/Class.php');
require('../../../models/PDO.php');

// Kiểm tra xóa lớp học
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $classId = $_GET['id'];

    // Gọi hàm xóa lớp học
    deleteClass($classId);

    // Chuyển hướng người dùng về trang danh sách
    header("Location: listClass.php");
    exit();
}
?>