<?php
require('../../../models/Users.php');
require('../../../models/PDO.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Danh sách giáo viên</title>
</head>
<body>
    <h1>Danh sách giáo viên</h1>

    <table border="1">
        <tr>
            <th>Id</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Mã giáo viên</th>
            <th>Họ và tên</th>
            <th>Ảnh đại diện</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>

        <?php
        $listTeachers = loadAllUsers();
        foreach ($listTeachers as $teacher):
            if ($teacher['roleId'] == getDefaultRoleTeacher()): ?>
                <tr>
                    <td><?= $teacher['id'] ?></td>
                    <td><?= $teacher['email'] ?></td>
                    <td><?= $teacher['password'] ?></td>
                    <td><?= $teacher['studentCode'] ?></td>
                    <td><?= $teacher['fullName'] ?></td>
                    <td><img src="<?= $teacher['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;"></td>
                    <td><a href="update.php?id=<?= $teacher['id'] ?>">Sửa</a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?= $teacher['id'] ?>, '<?= $teacher['fullName'] ?>')">Xóa</a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

    </table>
            <div><a href="create.php">Thêm giáo viên</a></div>
    <script>
        function confirmDelete(teacherId, teacherName) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa giáo viên: " + teacherName + " ?");
            if (confirmation) {
                // Chuyển hướng đến trang xóa với tham số action=delete và id của giáo viên
                window.location.href = "delete.php?action=delete&id=" + teacherId;
            }
        }
    </script>
</body>
</html>
