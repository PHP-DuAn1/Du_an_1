<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Subject.php');
require(dirname(__FILE__) . '/../../../models/Major.php');


$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $subjectName = $_POST['subjectName'];
    $subjectCode = $_POST['subjectCode'];
    $majorId = $_POST['majorId'];

    if (empty($subjectName) || empty($subjectCode) || empty($majorId)) {
        $message = "Vui lòng điền đầy đủ thông tin!";
    } else {
        // Kiểm tra xem môn học đã được thêm thành công hay chưa
        if (createSubject($subjectName, $subjectCode, $majorId)) {
            $message = "Thêm môn học thành công!";
        } else {
            $message = "Tên môn học đã tồn tại trong chuyên ngành!";
        }
    }
}

// Lấy danh sách chuyên ngành để hiển thị trong form
$majors = getAllMajors();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Môn Học Mới</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Arial', sans-serif;
        }

        form {
            background-color: #fff;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #3f4857;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #3f4857;
        }

        input[type="text"],
        select {
            width: 90%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #3f4857;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 150px;
        }

        input[type="submit"]:hover {
            background-color: #1d2430;
        }

        .back-link {
            text-align: left;
            margin-top: 20px;
        }

        .back-link a {
            display: inline;
            margin-right: 10px;
            /* Adjust the spacing between the link and the button */
            color: #3f4857;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .back-link a:hover {
            color: #1d2430;
        }
    </style>
</head>

<body>

    <h1>Tạo Môn Học Mới</h1>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <div>
            <label for="subjectName">Tên Môn Học</label>
            <input type="text" name="subjectName" placeholder="Tên Môn Học">
        </div>
        <div>
            <label for="subjectCode">Mã Môn Học</label>
            <input type="text" name="subjectCode" placeholder="Mã Môn Học">
        </div>
        <div>
            <label for="majorId">Chọn Chuyên Ngành</label>
            <select name="majorId">
                <?php foreach ($majors as $major) : ?>
                    <option value="<?= $major['id'] ?>"><?= $major['majorName'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit" name="submit" value="Tạo Môn Học">
        </div>
        <div class="back-link">
            <a href="?act=qlMajor&action=return">Quay về </a>
        </div>
    </form>

</body>

</html>