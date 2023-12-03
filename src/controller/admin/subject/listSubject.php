<?php
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\Subject.php');
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\PDO.php');

if (isset($_GET['major_name'])) {
    $majorName = $_GET['major_name'];
    $listSubjects = loadSubjectsByMajorName($majorName);
} else {
    header("Location: ../major/list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Môn Học - <?= $majorName ?></title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Arial', sans-serif;
        }

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

        .add-subject-link {
            text-align: left;
            margin-top: 20px;
        }

        .btn-add-major {
            padding: 10px 20px;
            background-color: #3f4857;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .btn-add-major:hover {
            background-color: #1d2430;
            color: #fff;
        }
    </style>
</head>

<body>

    <h1>Danh Sách Môn Học - <?= $majorName ?></h1>

    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên Môn Học</th>
            <th>Mã Môn Học</th>
            <th>Chỉnh Sửa</th>
            <th>Xóa</th>
            <th>Xem Lớp Học</th>
            <th>Xem Điểm</th>
        </tr>
        <?php $stt = 1; ?>

        <?php foreach ($listSubjects as $subject) : ?>
            <tr>
                <td><?= $stt++ ?></td>
                <td><?= $subject['subjectName'] ?></td>
                <td><?= $subject['subjectCode'] ?></td>
                <td><a href="update.php?id=<?= $subject['id'] ?>">Sửa</a></td>
                <td>
                    <a href="javascript:void(0);" onclick="confirmDelete('<?= $subject['id'] ?>', '<?= $subject['subjectName'] ?>')">Xóa</a>
                </td>
                <td><a href="../class/listClass.php?subject_id=<?= $subject['id'] ?>">Xem Lớp Học</a></td>
                <td><a href="../point/list.php?id=<?= $subject['id'] ?>">Xem </a></td>
            </tr>
        <?php endforeach; ?>

    </table>
    <div class="add-subject-link">
        <a href="create.php" class="btn-add-major">Thêm môn học</a>
    </div>
    <script>
        function confirmDelete(subjectId, subjectName) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa môn học: " + subjectName + " ?");
            if (confirmation) {
                window.location.href = "delete.php?action=delete&id=" + subjectId;
            }
        }
    </script>

</body>

</html>