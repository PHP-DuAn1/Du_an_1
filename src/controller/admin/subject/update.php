<?php
require('../../../models/Subject.php');
require('../../../models/Major.php');
require('../../../models/PDO.php');

$message = '';

// Kiểm tra xem có tham số id được truyền vào không
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $subjectInfo = getSubjectById($id);

    // Kiểm tra xem môn học có tồn tại không
    if (!$subjectInfo) {
        // Nếu không, chuyển hướng về trang danh sách môn học hoặc thực hiện xử lý khác theo yêu cầu của bạn
        header("Location: list_subject.php");
        exit();
    }
} else {
    // Nếu không có id, chuyển hướng về trang danh sách môn học
    header("Location: list_subject.php");
    exit();
}

// Kiểm tra xem có dữ liệu được gửi từ form không
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $subjectName = $_POST['subjectName'];
    $subjectCode = $_POST['subjectCode'];
    $majorId = $_POST['majorId'];

    // Kiểm tra xem các trường thông tin cần thiết đã được điền đầy đủ không
    if (empty($subjectName) || empty($subjectCode) || empty($majorId)) {
        $message = "Vui lòng điền đầy đủ thông tin!";
    } else {
        // Cập nhật thông tin môn học
        updateSubject($id, $subjectName, $subjectCode, $majorId);

        // Chuyển hướng về trang danh sách môn học sau khi cập nhật
        header("Location: list_subject.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Môn Học</title>
</head>
<body>

<h1>Cập Nhật Môn Học</h1>

<?php if (!empty($message)): ?>
    <p><?= $message ?></p>
<?php endif; ?>

<form action="" method="post">
    <input type="hidden" name="id" value="<?= $subjectInfo['id'] ?>">
    <div>
        <label for="subjectName">Tên Môn Học</label>
        <input type="text" name="subjectName" placeholder="Tên Môn Học" value="<?= htmlspecialchars($subjectInfo['subjectName']) ?>">
    </div>
    <div>
        <label for="subjectCode">Mã Môn Học</label>
        <input type="text" name="subjectCode" placeholder="Mã Môn Học" value="<?= htmlspecialchars($subjectInfo['subjectCode']) ?>">
    </div>
    <div>
        <label for="majorId">Chọn Chuyên Ngành</label>
        <select name="majorId">
            <?php
            $majors = getAllMajors();
            foreach ($majors as $major):
                $selected = ($major['id'] == $subjectInfo['majorId']) ? 'selected' : '';
            ?>
                <option value="<?= $major['id'] ?>" <?= $selected ?>><?= $major['majorName'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <input type="submit" name="submit" value="Cập Nhật">
    </div>
</form>

</body>
</html>
