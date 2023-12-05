<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');

require(dirname(__FILE__) . '/../../../models/Class.php');


if (isset($_GET['subject_id'])) {
    $subjectId = $_GET['subject_id'];
    $listClasses = loadClassesBySubjectId($subjectId);
  
} 
$perPage = 10;
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Danh Sách Lớp Học - <?= $subjectInfo['subjectName'] ?></title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
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
        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination button {
            display: inline-block;
            padding: 8px 16px;
            margin: 0 5px;
            background-color: #3f4857;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .pagination button:hover {
            background-color: #1d2430;
        }
    </style>

</head>

<body>

    <h1>Danh Sách Lớp Học</h1>

    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên Lớp Học</th>
            <th>Mã Lớp Học</th>
            <th>Chỉnh Sửa</th>
            <th>Xóa</th>
            <th>Xem lớp học</th>
        </tr>
        <?php $stt = 1; ?>

        <?php foreach ($listClasses as $class) : ?>
            <tr>
                <td><?= $stt++ ?></td>
                <td><?= $class['className'] ?></td>
                <td><?= $class['classCode'] ?></td>
                <td><a href="?act=qlMajor&action=updateClass&id=<?= $class['id'] ?>">Sửa</a></td>
                <td>
                    <a href="javascript:void(0);" onclick="confirmDelete('<?= $class['id'] ?>', '<?= $class['className'] ?>')">Xóa</a>
                </td>
                <td>
                    <a href="?act=qlMajor&action=classInfo&id=<?= $class['id'] ?>">Xem</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>
    <div class="pagination">
        <button onclick="changePage(-1)"><i class="fa-solid fa-angle-left"></i></button>
        <button onclick="changePage(1)"><i class="fa-solid fa-angle-right"></i></button>
    </div>
    <div class="add-subject-link">
        <a href="?act=qlMajor&action=createClass" class="btn-add-major">Thêm lớp học</a>
    </div>
    <script>
        
        var currentPage = 1;
    // Số lượng sinh viên hiển thị trên mỗi trang
    var perPage = <?= $perPage ?>;
    changePage(0);
        function confirmDelete(classId, className) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa lớp học: " + className + " ?");
            if (confirmation) {
                window.location.href = "?act=qlMajor&action=deleteClass?action=delete&id=" + classId;
            }
        }
        function changePage(offset) {
        // Ẩn tất cả các dòng trong bảng
        var rows = document.querySelectorAll('table tbody tr');
        rows.forEach(function (row) {
            row.style.display = 'none';
        });

        // Hiển thị các dòng của trang mới
        currentPage += offset;
        var startIndex = (currentPage - 1) * perPage;
        for (var i = startIndex; i < startIndex + perPage; i++) {
            if (rows[i]) {
                rows[i].style.display = '';
            }
        }
    }
    </script>

</body>

</html>