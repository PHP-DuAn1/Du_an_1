<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
</head>
<body>

<h1>Thêm người dùng</h1>

<?php
require('../../../models/PDO.php');
require('../../../models/Users.php');

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $studentCode = $_POST['studentCode'];
    $fullName = $_POST['fullName'];
    $avatar = $_FILES['avatar']['tmp_name'];

    $defaultRoleId = getDefaultRoleStudent();

    $avatar_name = $_FILES['avatar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    
    if (empty($email) || empty($pass) || empty($studentCode) || empty($fullName) || empty($avatar_name)) {
        echo "Vui lòng điền đầy đủ thông tin!";
    } elseif (!isValidEmail($email)) {
        echo "Email không hợp lệ!";
    } else {
        // Kiểm tra email đã tồn tại trong cơ sở dữ liệu chưa
        $existing_user = checkEmail($email);

        if ($existing_user) {
            echo "Email đã tồn tại!";
        } else {
            // Thêm người dùng mới vào cơ sở dữ liệu
            insertUsers($defaultRoleId, $email, $pass, $studentCode, $fullName, $avatar_name);
            
            // Lưu file ảnh đại diện vào thư mục upload
            move_uploaded_file($avatar, $target_file);

            echo "Thêm người dùng thành công!";
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email">
    </div>
    <div>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" placeholder="Mật khẩu">
    </div>
    <div>
        <label for="studentCode">Mã sinh viên</label>
        <input type="text" name="studentCode" placeholder="Mã sinh viên">
    </div>
    <div>
        <label for="fullName">Họ và tên</label>
        <input type="text" name="fullName" placeholder="Họ và tên">
    </div>
    <div>
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar">
    </div>
   
    <input type="submit" name="submit" value="Thêm người dùng">
</form>

</body>
</html>
