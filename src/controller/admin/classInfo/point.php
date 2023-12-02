<?php

     require('../../../models/PDO.php');
     require('../../../models/classInfo.php');
     require('../../../models/Users.php');
     require('../../../models/Point.php');

 if (isset($_GET['id'])){
     $classId = $_GET['id'];
     $listStudent = getClassInfoByUsers($classId) ;
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
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
    </style>
</head>

<body>
    <div class="box_search">
        <form action="" method="POST">
            <input type="text" name="kyw" placeholder="Từ khóa tìm kiếm">
            <input type="submit" name="timkiem" value="Tìm Kiếm">
        </form>
    </div>
        <h1>Danh Sách Sinh Viên </h1>

        <table border="1">
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Mã sinh viên</th>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Tuổi</th>
                <th>Ảnh đại diện</th>
                <th>Điểm </th>
                <th>Thêm </th>
             
            </tr>
            <?php $counter = 1; ?>
            <?php
            foreach ($listStudent as $student) :
                if ($student['roleId'] == getDefaultRoleStudent()) : ?>
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
                        <td  ><input type="text" name = "point" ></td>
                        <td><input type="submit" name="submit" value="Thêm"></td>
                    </tr>
</form>
                   

                <?php endif; ?>
            <?php endforeach; ?>

        </table>
       
<?php
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $point = isset($_POST['point']) ? $_POST['point'] : null;
            $userId = isset($_POST['userId']) ? $_POST['userId'] : null;
            $classId = isset($_POST['classId']) ? $_POST['classId'] : null;
        
            insertPoint($userId, $point, $classId);
            echo "Thêm điểm cho sinh viên thành công";
        }

      
     
    ?>
</body>

</html>
