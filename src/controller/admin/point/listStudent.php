<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Users.php');
require(dirname(__FILE__) . '/../../../models/Point.php');



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
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
    </style>
</head>

<body>
    <h1>Danh sách sinh viên</h1>
    <div>
        <input type="text" placeholder="Tìm kiếm sinh viên">
        <input type="submit" name="submit" value="tìm kiếm">
    </div>
    <table border="1">
        <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Mã sinh viên</th>
            <th>Họ và tên</th>
            <th>Giới tính</th>
            <th>Tuổi</th>
            <th>Ảnh đại diện</th>
            <th>Chon môn</th>
            <th>Thêm vào lớp</th>
        </tr>
        <?php $counter = 1; ?>
        <?php
        $listStudent = loadAllUsers($kyw);
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
                        <td>
                            <select name="subjectId">
                                <?php foreach ($class as $subjectId) : ?>
                                    <option value="<?= $subjectId['id'] ?>"><?= $subjectId['className'] ?></option>

                                <?php endforeach; ?>
                            </select>
                        </td>
                        <input type="hidden" name="userId" value="<?= $student['id'] ?>">
                        <td><input type="submit" name="submit" value="Thêm"></td>
                </form>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>

    </table>

    <?php
    $mess = [];
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Access the values of subjectId and userId
        $subjectId = $_POST['subjectId'];
        $userId = $_POST['userId'];



        createClassInfo($userId, $subjectId);
        echo "Thêm sinh sinh viên vào lớp thành công";
    }



    ?>
</body>

</html>