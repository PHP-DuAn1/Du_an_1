<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');

require(dirname(__FILE__) . '/../../../models/Users.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách giáo viên</title>
    <style>
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #3f4857;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: left;
            color: #3f4857;
        }

        th {
            background-color: #3f4857;
            color: white;
        }

        a {
            text-decoration: none;
            color: #3f4857;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #1d2430;
        }
    </style>
</head>

<body>
    <div class="box_search">
        <form action="" method="POST">
            <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm">
            <input type="submit" name="timkiem" value="Tìm Kiếm">
        </form>
    </div>
    <h1>Danh sách giáo viên</h1>

    <table border="1">
        <tr>

            <th>STT</th>

            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Mã giáo viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
        <?php $counter = 1; ?>
        <?php
        $kyw = isset($_POST['kyw']) ? $_POST['kyw'] : "";
        $listTeachers = loadAllUsers($kyw);
        foreach ($listTeachers as $teacher) :
            if ($teacher['roleId'] == getDefaultRoleTeacher()) : ?>
                <tr>
                    <td><?= $counter++  ?></td>
                    <td><?= $teacher['email'] ?></td>
                    <td><?= $teacher['password'] ?></td>
                    <td><?= $teacher['studentCode'] ?></td>
                    <td><?= $teacher['fullName'] ?></td>
                    <td><?= $teacher['gender'] ?></td>
                    <td><?= $teacher['age'] ?></td>
                    <td><img src="<?= $teacher['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;"></td>
                    <td><a href="update.php?id=<?= $teacher['id'] ?>">Sửa</a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?= $teacher['id'] ?>, '<?= $teacher['fullName'] ?>')">Xóa</a>
                    </td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

    </table>
    <div><a href="teacher/create.php">Thêm giáo viên</a></div>
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