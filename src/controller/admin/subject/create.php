<?php
require('../../../models/Subject.php');
require('../../../models/Major.php');
require('../../../models/PDO.php');

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
</head>
<body>

<h1>Tạo Môn Học Mới</h1>

<?php if (!empty($message)): ?>
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
            <?php foreach ($majors as $major): ?>
                <option value="<?= $major['id'] ?>"><?= $major['majorName'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="submit" value="Tạo Môn Học">
    </div>
</form>

</body>
</html>
