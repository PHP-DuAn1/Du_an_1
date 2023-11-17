<?php
require('../../../models/Major.php');
require('../../../models/PDO.php');

// Lấy danh sách môn học với thông tin chuyên ngành
$listMajorSubjects = getAllMajorSubjects();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Môn Học</title>
</head>
<body>

<h1>Danh Sách Môn Học</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên Môn Học</th>
        <th>Mã Môn Học</th>
        <th>Chuyên Ngành</th>
        <th>Chỉnh Sửa</th>
        <th>Xóa</th>
    </tr>

    <?php foreach ($listMajorSubjects as $subject): ?>
        <tr>
            <td><?= $subject['id'] ?></td>
            <td><?= $subject['subjectName'] ?></td>
            <td><?= $subject['subjectCode'] ?></td>
            <td><?= isset($subject['majorName']) ? $subject['majorName'] : "" ?></td>
            <td><a href="update.php?id=<?= $subject['id'] ?>">Chỉnh Sửa</a></td>
            <td>
                <a href="delete.php?action=delete&id=<?= $subject['id'] ?>" onclick="return confirmDelete('<?= $subject['subjectName'] ?>')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<script>
    function confirmDelete(subjectName) {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa môn học: " + subjectName + " ?");
        return confirmation;
    }
</script>

</body>
</html>
