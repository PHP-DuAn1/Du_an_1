<?php
require('../../../models/Users.php');
require('../../../models/PDO.php');

if (isset($_GET['major_id'])) {
    $majorId = $_GET['major_id'];
    $listStudents = loadUsersByMajor($majorId);
    $majorName = getMajorNameById($majorId);
} else {
    // Nếu không có major_id, có thể chuyển hướng hoặc xử lý theo nhu cầu của bạn
    header("Location: ../majors/list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sinh Viên - <?= $majorName ?></title>
</head>
<body>

<h1>Danh Sách Sinh Viên - <?= $majorName ?></h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Email</th>
        <th>Mật khẩu</th>
        <th>Mã Sinh Viên</th>
        <th>Họ và Tên</th>
        <th>Ảnh Đại Diện</th>
    </tr>

    <?php foreach ($listStudents as $student): ?>
        <tr>
            <td><?= $student['id'] ?></td>
            <td><?= $student['email'] ?></td>
            <td><?= $student['password'] ?></td>
            <td><?= $student['studentCode'] ?></td>
            <td><?= $student['fullName'] ?></td>
            <td><img src="<?= $student['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;"></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
