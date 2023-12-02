<?php
require('../../../models/PDO.php');

require('../../../models/Major.php');

$listMajors = getAllMajors();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Chuyên Ngành</title>
    <style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
    height: 100vh;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

nav {
    background-color: #1d2430;
    padding: 10px;
}

nav a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    margin: 0 10px;
}

nav a:hover {
    background-color: #3f4857;
}

.container {
    width: 100%;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    min-height: 100%;
}

h1, h2, h3 {
    color: #3f4857;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
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
.btn-add-major {
    display: block;
    width: 150px; /
    margin: 20px 0 0 0px; 
    padding: 10px;
    font-size: 14px; 
    background-color: #3f4857;
    color: #fff;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease-in-out;
}

.btn-add-major:hover {
    background-color: #1d2430;

    padding: 8px; 
    font-size: 13px; /
}

    </style>
</head>

<body>
    <div class="container">
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
                    <td><a href="update.php?id=<?= $major['id'] ?>">Sửa</a></td>
                    <td>
                        <a href="javascript:void(0);" onclick="confirmDelete(<?= $major['id'] ?>, '<?= $major['majorName'] ?>')">Xóa</a>
                    </td>
                    <td><a href="../subject/listSubject.php?major_name=<?= urlencode($major['majorName']) ?>">Xem Môn Học</a></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <div class="add-major-link">
        <div><a href="create.php" class="btn-add-major">Thêm chuyên ngành</a></div>

        </div>
    </div>

    <script>
        function confirmDelete(majorId, majorName) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa chuyên ngành: " + majorName + " ?");
            if (confirmation) {
                // Chuyển hướng đến trang xóa với tham số action=delete và id của chuyên ngành
                window.location.href = "delete.php?action=delete&id=" + majorId;
            }
        }
    </script>
</body>

</html>
