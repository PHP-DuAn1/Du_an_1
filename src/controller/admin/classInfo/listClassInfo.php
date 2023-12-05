<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Users.php');
require(dirname(__FILE__) . '/../../../models/classInfo.php');
require(dirname(__FILE__) . '/../../../models/Class.php');

if (isset($_GET['id'])) {
    $classId = $_GET['id'];
    $listStudent = getClassInfoByUsers($classId);
}
$perPage = 10;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

.box_search {
    text-align: center;
    margin: 20px 0;
}

.box_search input[type="text"] {
    padding: 8px;
}

.box_search input[type="submit"] {
    padding: 8px 16px;
    background-color: #3f4857;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.box_search input[type="submit"]:hover {
    background-color: #1d2430;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
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

.h1-teachers {
    float: left;
    margin-right: 20px;
   padding-left : 20px;

    font-size: 25px; /* Điều chỉnh kích thước chữ theo mong muốn */
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
   
    <h1>Danh Sách Lớp học</h1>

    <table border="1">
        <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Xóa</th>
        </tr>
        <?php
        $counter = 1;
        $listClass = getAllClasses();
        ?>

        <h1 class="h1-teachers">Giảng viên : 
            <?php 
            foreach ($listStudent as $teacher) : 
                foreach ($listClass as $class) : 
                    if ($teacher['roleId'] == getDefaultRoleTeacher()) : 
                        echo $teacher['fullName']; 
                        echo '-' . ''  .$teacher ['studentCode'] ;
                    endif;
                endforeach; 
            endforeach; 
            ?>
        </h1>


        <?php foreach ($listStudent as $student) : 
            foreach ($listClass as $class) : 
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
                        <td>
                            <a href="javascript:void(0);" onclick="confirmDelete(<?= $student['id'] ?>, '<?= $student['fullName'] ?>')">Xóa</a>
                        </td>
                    </tr>

                <?php endif; ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </table>
    <div class="pagination">
        <button onclick="changePage(-1)"><i class="fa-solid fa-angle-left"></i></button>
        <button onclick="changePage(1)"><i class="fa-solid fa-angle-right"></i></button>
    </div>
    <div><a href="?act=qlMajor&action=point&id=<?= $class['id'] ?> ">Xem điểm lớp </a></div>
    <div><a href="?act=qlMajor&action=listStudent">Thêm sinh viên</a></div>
    <div><a href="?act=qlMajor&action=listTeacher">Thêm giáo viên</a></div>

    <script>
          var currentPage = 1;
    // Số lượng sinh viên hiển thị trên mỗi trang
    var perPage = <?= $perPage ?>;
    changePage(0);
        function confirmDelete(studentId, studentName) {
            var confirmation = confirm("Bạn có chắc chắn muốn xóa sinh viên: " + studentName + " ?");
            if (confirmation) {
                window.location.href = "?act=qlMajor&action=deleteClassInfo?action=delete&id=" + studentId;
            }
        }
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
