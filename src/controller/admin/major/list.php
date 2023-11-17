<?php
require('../../../models/Major.php');
require('../../../models/PDO.php');// Tên file có thể thay đổi tùy theo cách bạn tổ chức mã nguồn của mình

$listMajors = getAllMajors();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Chuyên Ngành</title>
</head>
<body>

<h1>Danh Sách Chuyên Ngành</h1>

<table border="1">
    <tr>
        <th>Id</th>
        <th>Tên Chuyên Ngành</th>
        <th>Mã Chuyên Ngành</th>
        <th>Chỉnh Sửa</th>
        <th>Xóa</th>
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
            <td><a href="subject_list.php?major_id=<?= $major['id'] ?>">Xem Môn Học</a></td>

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