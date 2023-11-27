<?php
require('../../../models/Subject.php');
require('../../../models/PDO.php');

if (isset($_GET['major_name'])) {
    $majorName = $_GET['major_name'];
    $listSubjects = loadSubjectsByMajorName($majorName);
} else {
    // Nếu không có major_name, có thể chuyển hướng hoặc xử lý theo nhu cầu của bạn
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

<h1>Danh Sách Môn Học - <?= $majorName ?></h1>

<table border="1">
    <tr>
        <th>Name</th>
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
            <td><a href="../class/list.php?subject_name=<?= $subject['subjectName'] ?>">Xem Lớp Học</a></td>
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
