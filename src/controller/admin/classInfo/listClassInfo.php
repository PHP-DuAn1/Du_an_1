<?php
require('../../../models/ClassInfo.php');
require('../../../models/PDO.php');
 
if (isset($_GET['class_id'])) {
    $subjectId = $_GET['class_id'];
    $listClasses = loadClassInfoBySClasses($ClassId);
    $listUser = getAllUsers();
}  
else {
    header("Location: ../class/listClass.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Lớp Học</title>
</head>
<body>

<h1> Lớp Học</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên Lớp Học</th>
        <th>Mã Lớp Học</th>
        <th>Chỉnh Sửa</th>
        <th>Xóa</th>
        <th>Xem lớp học</th> 
    </tr>

    <?php foreach ($listClasses as $class): ?>
        <tr>
            <td><?= $class['id'] ?></td>
            <td><?= $class['className'] ?></td>
            <td><?= $class['classCode'] ?></td>
            <td><a href="update.php?id=<?= $class['id'] ?>">Sửa</a></td>
            <td>
                <a href="javascript:void(0);" onclick="confirmDelete('<?= $class['id'] ?>', '<?= $class['className'] ?>')">Xóa</a>
            </td>
            <td>
                <a href="../classInfo/listclassInfo.php?id=<?= $class['id'] ?>">Xem</a> 
            </td>
        </tr>
    <?php endforeach; ?>

</table>

<script>
    function confirmDelete(classId, className) {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa lớp học: " + className + " ?");
        if (confirmation) {
            window.location.href = "delete.php?action=delete&id=" + classId;
        }
    }
</script>

</body>
</html>
