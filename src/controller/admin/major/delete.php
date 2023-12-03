
<?php
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\PDO.php');
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\Major.php');

// Kiểm tra xóa chuyên ngành
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $majorId = $_GET['id'];

    // Gọi hàm xóa chuyên ngành
    deleteMajor($majorId);

    // Chuyển hướng người dùng về trang danh sách chuyên ngành
    header("Location: list.php");
    exit();
}

// Nếu không có thông tin xóa, chuyển hướng người dùng về trang danh sách chuyên ngành
header("Location: list.php");
exit();
?>
