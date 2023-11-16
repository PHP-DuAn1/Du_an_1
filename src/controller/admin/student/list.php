<?php
require('../../../models/Users.php');
require('../../../models/PDO.php');
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
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Ảnh đại diện</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>

        <?php
        $listStudents = loadAllUsers();
        foreach ($listStudents as $student):
        ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['email'] ?></td>
                <td><?= $student['password'] ?></td>
                <td><?= $student['studentCode'] ?></td>
                <td><?= $student['fullName'] ?></td>
                <td><img src="<?= $student['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;"></td>
                <td><a href="update.php?id=<?= $student['id'] ?>">Sửa</a></td>
                <td>
                    <a href="javascript:void(0);" onclick="confirmDelete(<?= $student['id'] ?>, '<?= $student['fullName'] ?>')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <script>
        function confirmDelete(studentId, studentName) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa sinh viên: " + studentName + " ?");
            if (confirmation) {
                // Chuyển hướng đến trang xóa với tham số action=delete và id của sinh viên
                window.location.href = "delete.php?action=delete&id=" + studentId;
            }
        }
    </script>
</body>
</html>
