<?php
// src/controller/admin/subject/list.php

require('../../../models/Class.php');
require('../../../models/PDO.php');

if (isset($_GET['subject_id'])) {
    $subjectId = $_GET['subject_id'];
    $subjectInfo = getSubjectById($subjectId);
    $listClasses = loadClassesBySubject($subjectId);
} else {
    // Nếu không có subject_id, có thể chuyển hướng hoặc xử lý theo nhu cầu của bạn
    header("Location: ../subjects/list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Lớp Học - <?= $subjectInfo['subjectName'] ?></title>
</head>
<body>

<h1>Danh Sách Lớp Học - <?= $subjectInfo['subjectName'] ?></h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên Lớp Học</th>
        <th>Mã Lớp Học</th>
        <th>Chỉnh Sửa</th>
        <th>Xóa</th>
    </tr>

    <?php foreach ($listClasses as $class): ?>
        <tr>
            <td><?= $class['id'] ?></td>
            <td><?= $class['className'] ?></td>
            <td><?= $class['classCode'] ?></td>
            <td><a href="update_class.php?id=<?= $class['id'] ?>">Sửa</a></td>
            <td>
                <a href="javascript:void(0);" onclick="confirmDelete(<?= $class['id'] ?>, '<?= $class['className'] ?>')">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<script>
    function confirmDelete(classId, className) {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa lớp học: " + className + " ?");
        if (confirmation) {
            window.location.href = "delete_class.php?action=delete&id=" + classId;
        }
    }
</script>

</body>
</html>
