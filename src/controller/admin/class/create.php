<?php
require('../../../models/PDO.php');
require('../../../models/Subject.php');
require('../../../models/Class.php');

$message = '';

// Lấy danh sách môn học để hiển thị trong form
$subjects = getAllSubjects();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $className = $_POST['className'];
    $classCode = $_POST['classCode'];
    $subjectId = $_POST['subjectId'];

    if (empty($className) || empty($classCode) || empty($subjectId)) {
        $message = "Vui lòng điền đầy đủ thông tin!";
    } else {
        // Gọi hàm createClass để thêm mới lớp học
        createClass($className, $classCode, $subjectId);
        
        // Chuyển hướng người dùng đến trang danh sách lớp học
        $message = "Thêm lớp học thành công!";
        
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Lớp Học</title>
</head>
<body>

<h1>Tạo lớp học</h1>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="" method="post">
    <div>
        <label for="className">Tên lớp học</label>
        <input type="text" name="className" placeholder="Tên Lớp Học">
    </div>
    <div>
        <label for="classCode">Mã lớp học</label>
        <input type="text" name="classCode" placeholder="Mã Lớp Học">
    </div>
    <div>
        <label for="subjectId">Chọn môn học</label>
        <select name="subjectId">
            <?php foreach ($subjects as $subject): ?>
                <option value="<?= $subject['id'] ?>"><?= $subject['subjectName'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="submit" value="Tạo lớp học">
    </div>
</form>

</body>
</html>
