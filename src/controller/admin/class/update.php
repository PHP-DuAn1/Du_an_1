<?php
require(dirname(__FILE__) . '/../../../models/Subject.php');
require(dirname(__FILE__) . '/../../../models/Class.php');
require(dirname(__FILE__) . '/../../../models/PDO.php');

$message = '';

// Kiểm tra xem có tham số id được truyền vào không
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $classInfo = getClassById($id);

    // Kiểm tra xem môn học có tồn tại không
    if (!$classInfo) {
        // Nếu không, chuyển hướng về trang danh sách môn học hoặc thực hiện xử lý khác theo yêu cầu của bạn
        header("Location: list_class.php");
        exit();
    }
} else {
    // Nếu không có id, chuyển hướng về trang danh sách môn học
    header("Location: list_class.php");
    exit();
}

// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $className = $_POST['className'];
    $classCode = $_POST['classCode'];
    $subjectId = $_POST['subjectId'];

    // Kiểm tra xem các trường thông tin cần thiết đã được điền đầy đủ không
    if (empty($className) || empty($classCode) || empty($subjectId)) {
        $message = "Vui lòng điền đầy đủ thông tin!";
    } else {
        // Cập nhật thông tin môn học
        updateclass($id, $className, $classCode, $subjectId);

        // Chuyển hướng về trang danh sách môn học sau khi cập nhật
        echo "Thành công"
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật lớp học</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
    }

    h1 {
        text-align: center;
        color: #3f4857;
    }

    form {
        background-color: #fff;
        max-width: 400px;
        margin: 20px auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #3f4857;
    }

    input[type="text"],
    select {
        width: 100%;
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
        display: block;
        width: 100%;
    }

    input[type="submit"]:hover {
        background-color: #1d2430;
    }

    .add-subject-link {
        text-align: left;
        margin-top: 20px;
    }

    .add-subject-link a {
        display: inline;
        margin-right: 10px;
        color: #3f4857;
        text-decoration: none;
        transition: color 0.3s ease-in-out;
    }

    .add-subject-link a:hover {
        color: #1d2430;
    }
</style>

<body>

    <h1>Cập Nhật lớp học</h1>

    <?php if (!empty($message)) : ?>
        <p><?= $message ?></p>
    <?php endif; ?>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $classInfo['id'] ?>">
        <div>
            <label for="className">Tên lớp học</label>
            <input type="text" name="className" placeholder="Tên lớp học" value="<?= htmlspecialchars($classInfo['className']) ?>">
        </div>
        <div>
            <label for="classCode">Mã Môn Học</label>
            <input type="text" name="classCode" placeholder="Mã lớp học" value="<?= htmlspecialchars($classInfo['classCode']) ?>">
        </div>
        <div>
            <label for="subjectId">Chọn môn học</label>
            <select name="subjectId">
                <?php
                $subjects = getAllsubjects();
                foreach ($subjects as $subject) :
                    $selected = ($subject['id'] == $classInfo['subjectId']) ? 'selected' : '';
                ?>
                    <option value="<?= $subject['id'] ?>" <?= $selected ?>><?= $subject['subjectName'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <input type="submit" name="submit" value="Cập Nhật">
        </div>
        <div class="add-subject-link">
            <a href="?act=qlMajor&action=return" class="btn-add-major">Quay lại</a>
        </div>
    </form>

</body>

</html>