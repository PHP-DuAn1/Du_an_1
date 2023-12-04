<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Users.php');

$kyw = isset($_POST['kyw']) ? $_POST['kyw'] : "";

$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 10;

$start = ($page - 1) * $perPage;

$listStudent = loadAllUsers($kyw, $start, $perPage);

$totalPages = ceil($totalStudents / $perPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* CSS cho phần trang */
        .pagination {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .pagination div {
            cursor: pointer;
        }

        .pagination i {
            font-size: 24px;
        }
    </style>
</head>

<body>
    <h1>Danh Sách Sinh Viên</h1>
    <div class="box_search">
        <form action="" method="POST">
            <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm">
            <input type="submit" name="timkiem" value="Tìm Kiếm">
        </form>
    </div>

    <table border="1">
        <!-- Các thẻ tiêu đề -->
        <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Mã giáo viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
        <?php $counter = 1; ?>
        <?php foreach ($listStudent as $student) : ?>
            <!-- Các dòng dữ liệu -->
            <tr>
                <td><?= $counter++ ?></td>
                <td><?= $student['email'] ?></td>
                <td><?= $student['password'] ?></td>
                <td><?= $student['studentCode'] ?></td>
                <td><?= $student['fullName'] ?></td>
                <td><?= $student['gender'] ?></td>
                <td><?= $student['age'] ?></td>
                <td><img src="<?= $student['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;"></td>
                <td><a href="?act=qlStudent&action=update&id=<?= $student['id'] ?>">Sửa</a></td>
                <td>
                    <a href="javascript:void(0);" onclick="confirmDelete(<?= $student['id'] ?>, '<?= $student['fullName'] ?>')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- Hiển thị phân trang -->
    <div class="pagination">
        <div class="prev" onclick="changePage(<?php echo $page - 1; ?>)">
            <i class="fas fa-angle-left"></i>
        </div>
        <div class="next" onclick="changePage(<?php echo $page + 1; ?>)">
            <i class="fas fa-angle-right"></i>
        </div>
    </div>

    <div><a href="?act=qlStudent&action=create">Thêm sinh viên</a></div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>
    <script>
        function changePage(newPage) {
            // Kiểm tra xem newPage có hợp lệ không (nằm trong khoảng từ 1 đến totalPages)
            if (newPage >= 1 && newPage <= <?php echo $totalPages; ?>) {
                // Chuyển hướng đến trang mới
                window.location.href = "?act=qlStudent&action=create&page=" + newPage;
            }
        }

        function confirmDelete(studentId, studentName) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa sinh viên: " + studentName + " ?");
            if (confirmation) {
                // Chuyển hướng đến trang xóa với tham số action=delete và id của giáo viên
                window.location.href = "?act=qlStudent&action=delete&id=" + studentId;
            }
        }
    </script>
</body>

</html>
