<?php

require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/classInfo.php');
require(dirname(__FILE__) . '/../../../models/Users.php');
require(dirname(__FILE__) . '/../../../models/Point.php');

if (isset($_GET['id'])) {
    $classId = $_GET['id'];
    $listStudent = getClassInfoByUsers($classId);
}
$perPage = 10;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
          body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #3f4857;
        }

        .box_search {
    text-align: center;
    margin: 20px 0;
}

.box_search input[type="text"] {
    padding: 8px;
}

.box_search input[type="submit"] {
    padding: 8px 16px;
    background-color: #3f4857;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.box_search input[type="submit"]:hover {
    background-color: #1d2430;
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
    </style>
</head>

<body>
    <div class="box_search">
        <form action="" method="POST">
            <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm">
            <input type="submit" name="timkiem" value="Tìm Kiếm">
        </form>
    </div>
    <h1>Danh Sách Sinh Viên</h1>

    <table border="1">
        <thead>
        <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Điểm</th>
            <th>Thêm</th>
        </tr>  
        </thead>
        <?php $getAllPoints = getAllPoints();  ?> 
        <?php $counter = 1; ?>
        <?php foreach ($listStudent as $student) : ?>
        <?php foreach ($getAllPoints as $points) : ?>
            <?php if ($student['roleId'] == getDefaultRoleStudent()) : ?>
                <form action="" method="post">
                    <tr>
                        <td><?= $counter++ ?></td>
                        <td><?= $student['email'] ?></td>
                        <td><?= $student['studentCode'] ?></td>
                        <td><?= $student['fullName'] ?></td>
                        <td><?= $student['gender'] ?></td>
                        <td><?= $student['age'] ?></td>
                        <td><img src="<?= $student['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;"></td>
                        <input type="hidden" name="userId" value="<?= $student['id'] ?>">
                        <td><input type="text" name="point" value="<?= $points['point'] ?> " ></td>
                        <td><input type="submit" name="submit" value="Thêm"></td>
                    </tr>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php endforeach; ?>

    </table>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['submit'])) {
            $point = $_POST['point'];
            $userId = $_POST['userId'];

            if ($point !== "" && $userId !== "") {
                insertPoint($userId, $classId, $point);
                echo "Thêm điểm cho sinh viên thành công";
            } else {
                echo "Vui lòng nhập điểm để thêm";
            }
        }
    }
    ?>



      <script>
        
        var currentPage = 1;
    // Số lượng sinh viên hiển thị trên mỗi trang
    var perPage = <?= $perPage ?>;

    // Hiển thị trang đầu tiên mặc định khi trang được tải lên
    changePage(0);

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
