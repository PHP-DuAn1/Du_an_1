<?php
require('../../../models/Major.php');
require('../../../models/PDO.php');

$listMajors = getAllMajors();
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
        <th>Xem sinh viên</th> <!-- Thêm cột mới -->
    </tr>

    <?php foreach ($listMajors as $major): ?>
        <tr>
            <td><?= $major['id'] ?></td>
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
