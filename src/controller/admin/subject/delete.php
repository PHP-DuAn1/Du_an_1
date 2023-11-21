<?php
require('../../../models/Subject.php');
require('../../../models/PDO.php');

// Kiểm tra xóa môn học
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $subjectId = $_GET['id'];

    // Gọi hàm xóa môn học
    deleteSubject($subjectId);

    // Chuyển hướng người dùng về trang danh sách
    header("Location: list.php");
    exit();
}
?>
