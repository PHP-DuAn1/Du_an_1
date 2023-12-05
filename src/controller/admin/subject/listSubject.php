<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Subject.php');


if (isset($_GET['major_name'])) {
    $majorName = $_GET['major_name'];
    $listSubjects = loadSubjectsByMajorName($majorName);
} 
$perPage = 10;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Môn Học  - <?= $majorName ?> </title>
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

    <h1>Danh Sách Môn Học - <?= $majorName ?></h1>

    <table border="1">
        <tr>
            <th>STT</th>
            <th>Tên Môn Học</th>
            <th>Mã Môn Học</th>
            <th>Chỉnh Sửa</th>
            <th>Xóa</th>
            <th>Xem Lớp Học</th>
        </tr>
        <?php $stt = 1; ?>

        <?php foreach ($listSubjects as $subject) : ?>
            <tr>
                <td><?= $stt++ ?></td>
                <td><?= $subject['subjectName'] ?></td>
                <td><?= $subject['subjectCode'] ?></td>
                <td><a href="?act=qlMajor&action=updateSubject&id=<?= $subject['id'] ?>">Sửa</a></td>
                <td>
                    <a href="javascript:void(0);" onclick="confirmDelete('<?= $subject['id'] ?>', '<?= $subject['subjectName'] ?>')">Xóa</a>
                </td>
                <td><a href="?act=qlMajor&action=class&subject_id=<?= $subject['id'] ?>">Xem Lớp Học</a></td>
       
            </tr>
        <?php endforeach; ?>

    </table>
    <div class="pagination">
        <button onclick="changePage(-1)"><i class="fa-solid fa-angle-left"></i></button>
        <button onclick="changePage(1)"><i class="fa-solid fa-angle-right"></i></button>
    </div>
    <div class="add-subject-link">
        <a href="?act=qlMajor&action=createSubject" class="btn-add-major">Thêm môn học</a>
    </div>
    <script>
           var currentPage = 1;
    // Số lượng sinh viên hiển thị trên mỗi trang
    var perPage = <?= $perPage ?>;
    changePage(0);

        function confirmDelete(subjectId, subjectName) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa môn học: " + subjectName + " ?");
            if (confirmation) {
                window.location.href = "?act=qlMajor&action=deleteSubject?action=delete&id=" + subjectId;
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