<?php
require('../../../models/Users.php');
$listStudents = loadAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
</head>
<body>
    <h1>Danh sách sinh viên</h1>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Chức vụ</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Ảnh đại diện</th>
            <th>Chỉnh sửa</th>
        </tr>

        <?php foreach ($listStudents as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['roleId'] ?></td>
                <td><?= $student['email'] ?></td>
                <td><?= $student['password'] ?></td>
                <td><?= $student['studentCode'] ?></td>
                <td><?= $student['fullName'] ?></td>
                <td><img src="<?= $student['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;"></td>
                <td><a href="update.php?id=<?= $student['id'] ?>">Sửa</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>