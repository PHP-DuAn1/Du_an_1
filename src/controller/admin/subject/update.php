<?php
    require(dirname(__FILE__) . '/../../../models/PDO.php');
    require(dirname(__FILE__) . '/../../../models/Major.php');
    require(dirname(__FILE__) . '/../../../models/Subject.php');

$message = '';

// Kiểm tra xem có tham số id được truyền vào không
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $subjectInfo = getSubjectById($id);

  // Kiểm tra xem môn học có tồn tại không
 
}
// Xử lý khi form được submit
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
   echo 'Thành công'
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
  <title>Cập Nhật Môn Học</title>
  <style>
    body {
      background-color: #f2f2f2;
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
      display: block;
      text-align: center;
      margin-bottom: 20px;
      margin-top: 15px;
    }

    .back-link a {
      padding: 10px 20px;
      color: #3f4857;
      text-decoration: none;
      border-radius: 5px;
      transition: color 0.3s ease-in-out;
    }

    .back-link a:hover {
      color: #1d2430;
    }
  </style>
</head>

<body>

  <h1>Cập Nhật Môn Học</h1>

  <?php if (!empty($message)) : ?>
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
        <?php foreach ($majors as $major) : ?>
          <?php $selected = ($major['id'] == $subjectInfo['majorId']) ? 'selected' : ''; ?>
          <option value="<?= $major['id'] ?>" <?= $selected ?>><?= $major['majorName'] ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div>
      <input type="submit" name="submit" value="Cập Nhật">
    </div>
    <div class="back-link">
      <a href="?act=qlMajor&action=return">Quay về </a>
    </div>
  </form>

</body>

</html>