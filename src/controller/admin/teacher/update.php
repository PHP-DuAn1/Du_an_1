<?php
require('../../../models/PDO.php');
require('../../../models/Users.php');

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $id = $_POST['id'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $studentCode = $_POST['studentCode'];
    $fullName = $_POST['fullName'];
    $avatar = $_FILES['avatar']['tmp_name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $avatar_name = $_FILES['avatar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    
    if (!is_numeric($age) || $age < 0) {
        echo "Độ tuổi không hợp lệ";
    } elseif (empty($email) || empty($pass) || empty($studentCode) || empty($fullName) || empty($avatar_name) || empty($gender) || empty($age)) {
        echo "Vui lòng điền đầy đủ thông tin!";
    } elseif (!isValidEmail($email) || strpos($email, '@hn.edu.vn') === false) {
        echo "Email không hợp lệ ";
    } else {
        // Kiểm tra email đã tồn tại trong cơ sở dữ liệu chưa
        $existing_user = checkEmailNot($email, $id);

        if ($existing_user) {
            echo "Email đã tồn tại!";
        } else {
            // Cập nhật thông tin giáo viên
            updateUsers($id, $email, $pass, $studentCode, $fullName, $gender, $age, $avatar_name);

            // Lưu file ảnh đại diện vào thư mục upload
            move_uploaded_file($avatar, $target_file);

            echo "Sửa giáo viên thành công!";
        }
    }
}

// Lấy thông tin giáo viên để hiển thị trước khi sửa
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $studentInfo = loadOneUsers($id);
} else {
    // Nếu không có id, quay về trang danh sách
    header("Location: list.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa giáo viên</title>
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
      }

      label {
        display: block;
        margin-bottom: 10px;
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
    }

    .back-link a {
      padding: 10px 20px;
      background-color: #3f4857;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease-in-out;
    }

    .back-link a:hover {
      background-color: #1d2430;
    }
    </style>
</head>
<body>

<h1>Sửa giáo viên</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $studentInfo['id'] ?>">
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" value="<?= $studentInfo['email'] ?>">
    </div>
    <div>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" placeholder="Mật khẩu" value="<?= $studentInfo['password'] ?>">
    </div>
    <div>
        <label for="studentCode">Mã giáo viên</label>
        <input type="text" name="studentCode" placeholder="Mã giáo viên" value="<?= $studentInfo['studentCode'] ?>">
    </div>
    <div>
        <label for="fullName">Họ và tên</label>
        <input type="text" name="fullName" placeholder="Họ và tên" value="<?= $studentInfo['fullName'] ?>">
    </div>
    <div>
        <label for="gender">Giới tính</label>
        <select name="gender">
            <option value="Nam" <?= ($studentInfo['gender'] == 'Nam') ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= ($studentInfo['gender'] == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
        </select>
    </div>
    <div>
        <label for="age">Tuổi</label>
        <input type="number" name="age" placeholder="Tuổi" value="<?= $studentInfo['age'] ?>">
    </div>
    <div>
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar">
    </div>
   
    <input type="submit" name="submit" value="Sửa giáo viên">
    <div class="back-link">
    <a href="../subject/listSubject.php">Quay về </a>
  </div>
</form>

</body>
</html>
