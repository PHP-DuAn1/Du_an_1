<!-- src/controller/admin/subject/list.php -->

<?php
require('../../../models/Subject.php');
require('../../../models/PDO.php');

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
</head>
<body>

<h1>Danh Sách Môn Học - <?= $majorName ?></h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Tên Môn Học</th>
        <th>Mã Môn Học</th>
        <th>Chỉnh Sửa</th>
        <th>Xóa</th>
        <th>Xem Lớp Học</th>
    </tr>

    <?php foreach ($listSubjects as $subject): ?>
        <tr>
            <td><?= $subject['id'] ?></td>
            <td><?= $subject['subjectName'] ?></td>
            <td><?= $subject['subjectCode'] ?></td>
            <td><a href="update_subject.php?name=<?= $subject['id'] ?>">Sửa</a></td>
            <td>
                <a href="javascript:void(0);" onclick="confirmDelete('<?= $subject['id'] ?>', '<?= $subject['subjectName'] ?>')">Xóa</a>
            </td>
            <!-- Truyền subject_id qua URL khi ấn nút "Xem Lớp Học" -->
            <td><a href="../class/list.php?subject_id=<?= $subject['id'] ?>">Xem Lớp Học</a></td>
        </tr>
    <?php endforeach; ?>

</table>

<script>
    function confirmDelete(subjectName, subjectDisplayName) {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa môn học: " + subjectDisplayName + " ?");
        if (confirmation) {
            window.location.href = "delete_subject.php?action=delete&name=" + subjectName;
        }
    }
</script>

</body>
</html>
