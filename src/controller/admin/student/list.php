<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Users.php');

$kyw = isset($_POST['kyw']) ? $_POST['kyw'] : "";

$listStudent = loadAllUsers($kyw);
$perPage = 10;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <script src="https://kit.fontawesome.com/4a2609ef57.js" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <h1>Danh Sách Sinh Viên </h1>
    <div class="box_search">
        <form action="" method="POST">
            <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm">
            <input type="submit" name="timkiem" value="Tìm Kiếm">
        </form>
    </div>

   <table border="1">
    <thead>
        <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Chỉnh sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
        <?php $counter = 1; ?>
        <?php
        $listStudent = loadAllUsers($kyw);
        foreach ($listStudent as $student) :
            if ($student['roleId'] == getDefaultRoleStudent()) : ?>

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
            <?php endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>

    <div class="pagination">
        <button onclick="changePage(-1)"><i class="fa-solid fa-angle-left"></i></button>
        <button onclick="changePage(1)"><i class="fa-solid fa-angle-right"></i></button>
    </div>

    <div><a href="?act=qlStudent&action=create">Thêm sinh viên</a></div>
    <script>
    // Biến để theo dõi trang hiện tại
    var currentPage = 1;
    // Số lượng sinh viên hiển thị trên mỗi trang
    var perPage = <?= $perPage ?>;

    // Hiển thị trang đầu tiên mặc định khi trang được tải lên
    changePage(0);

    // Hàm xác nhận xóa sinh viên
    function confirmDelete(studentId, studentName) {
        var confirmation = confirm("Bạn có chắc chắn muốn xóa sinh viên: " + studentName + " ?");
        if (confirmation) {
            // Chuyển hướng đến trang xóa với tham số action=delete và id của sinh viên
            window.location.href = "?act=qlStudent&action=delete&id=" + studentId;
        }
    }

    
    function changePage(offset) {
       
        var rows = document.querySelectorAll('table tbody tr');
        rows.forEach(function (row) {
            row.style.display = 'none';
        });

        
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