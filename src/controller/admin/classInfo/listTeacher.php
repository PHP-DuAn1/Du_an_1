<?php
require(dirname(__FILE__) . '/../../../models/Users.php');
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/classInfo.php');
require(dirname(__FILE__) . '/../../../models/class.php');

$mess = [];
$perPage = 10;

if (isset($_GET['id'])) {
    $classId = $_GET['id'];
    
}

// Kiểm tra nếu form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy giá trị của classId và userId
    $userId = $_POST['userId'];
   
    // Kiểm tra và thêm sinh viên vào lớp
    $existingRecord = getClassInfoByUserAndClass($userId, $classId);

    if (!$existingRecord) {
        // Kiểm tra xem sinh viên đã đăng ký lớp chưa
        if (!isStudentEnrolledInClass($userId, $classId)) {
            // Nếu chưa, thêm sinh viên vào lớp
            createClassInfo($userId, $classId);
            $mess[] = "Thêm sinh viên vào lớp thành công";
        } else {
            $mess[] = "Sinh viên đã tồn tại trong lớp";
        }
    } else {
        $mess[] = "Sinh viên đã tồn tại trong lớp";
    }
}

$listStudent = loadAllUsers();
$class = getAllClasses();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách giáo viên</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

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

        img {
            max-width: 100%;
            height: auto;
            border-radius: 50%;
        }

        a {
            text-decoration: none;
            color: #3f4857;
            transition: color 0.3s ease-in-out;
        }

        a:hover {
            color: #1d2430;
        }

        .create-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .create-link a {
            padding: 10px 20px;
            background-color: #3f4857;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .create-link a:hover {
            background-color: #1d2430;
        }

        script {
            margin-top: 20px;
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
    <h1>Danh sách giáo viên</h1>
    <div>
        <input type="text" placeholder="Tìm kiếm sinh viên">
        <input type="submit" name="submit" value="tìm kiếm">
    </div>
    <table border="1">
    <thead>

        <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Mã giáo viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Thêm vào lớp</th>
        </tr>
    <thead>

        <?php $counter = 1; ?>
        <?php foreach ($listStudent as $student) : ?>
            <?php if ($student['roleId'] == getDefaultRoleTeacher()) : ?>
                <form action="" method="post">
                    <tr>
                        <td><?= $counter++ ?></td>
                        <td><?= $student['email'] ?></td>
                        <td><?= $student['studentCode'] ?></td>
                        <td><?= $student['fullName'] ?></td>
                        <td><?= $student['gender'] ?></td>
                        <td><?= $student['age'] ?></td>
                        <td><img src="<?= $student['avatar'] ?>" alt="Avatar" style="width: 50px; height: 50px;"></td>
                         
                        <input type="hidden" name="userId" value="<?= $student['id'] ?>">
                        <td><input type="submit" name="submit" value="Thêm"></td>
                    </tr>
                </form>
            <?php endif; ?>
        <?php endforeach; ?>
    </table>
    <div class="pagination">
        <button onclick="changePage(-1)"><i class="fa-solid fa-angle-left"></i></button>
        <button onclick="changePage(1)"><i class="fa-solid fa-angle-right"></i></button>
    </div>

    <?php foreach ($mess as $message) : ?>
        <p><?= $message ?></p>
    <?php endforeach; ?>
    <div class="back-link">
            <a href="?act=qlMajor&action=return">Quay về </a>
        </div>

        <script>
        
        var currentPage = 1;
    // Số lượng sinh viên hiển thị trên mỗi trang
    var perPage = <?= $perPage ?>;

    // Hiển thị trang đầu tiên mặc định khi trang được tải lên
    changePage(0);

    function changePage(offset) {
        // Ẩn tất cả các dòng trong bảng
        var rows = document.querySelectorAll('table tbody tr');
        rows.forEach(function (row) {
            row.style.display = 'none';
        });

        // Hiển thị các dòng của trang mới
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
