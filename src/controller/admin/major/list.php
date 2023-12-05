<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Major.php');

$listMajors = getAllMajors();
$perPage = 10;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Chuyên Ngành</title>
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

        .box_search {
            text-align: center;
            margin-bottom: 20px;
        }

        .box_search input[type="text"] {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .box_search input[type="submit"] {
            padding: 10px 20px;
            background-color: #3f4857;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .box_search input[type="submit"]:hover {
            background-color: #1d2430;
        }
    </style>
</head>

<body>
   
        <h1>Danh Sách Chuyên Ngành</h1>

        <table border="1">
            <tr>
                <th>STT</th>
                <th>Tên Chuyên Ngành</th>
                <th>Mã Chuyên Ngành</th>
                <th>Chỉnh Sửa</th>
                <th>Xóa</th>
                <th>Xem môn học</th>
            </tr>

            <?php $stt = 1; ?>
            <?php foreach ($listMajors as $major) : ?>
                <tr>
                    <td><?= $stt++ ?></td>
                    <td><?= $major['majorName'] ?></td>
                    <td><?= $major['majorCode'] ?></td>
                    <td><a href="?act=qlMajor&action=update&id=<?= $major['id'] ?>">Sửa</a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?= $major['id'] ?>, '<?= $major['majorName'] ?>')">Xóa</a>
                    </td>
                    <td><a href="?act=qlMajor&action=subject&major_name=<?= urlencode($major['majorName']) ?>">Xem Môn Học</a></td>

                </tr>
            <?php endforeach; ?>
        </table>
        <div class="pagination">
        <button onclick="changePage(-1)"><i class="fa-solid fa-angle-left"></i></button>
        <button onclick="changePage(1)"><i class="fa-solid fa-angle-right"></i></button>
    </div>
        <div class="add-major-link">
            <div><a href="?act=qlMajor&action=create" class="btn-add-major">Thêm chuyên ngành</a></div>

        </div> 
    

    <script>
         var currentPage = 1;
    // Số lượng sinh viên hiển thị trên mỗi trang
    var perPage = <?= $perPage ?>;
    changePage(0);

        function confirmDelete(majorId, majorName) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa chuyên ngành: " + majorName + " ?");
            if (confirmation) {
                // Chuyển hướng đến trang xóa với tham số action=delete và id của chuyên ngành
                window.location.href = " ?act=qlMajor&action=delete?action=delete&id=" + majorId;
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