<?php
require('../../../models/PDO.php');
require('../../../models/Users.php');

function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

$userID = $_GET['id']; // Lấy ID từ URL

$userInfo = loadOneUsers($userID); // Lấy thông tin của người dùng từ cơ sở dữ liệu dựa trên ID

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

    if (!isValidEmail($email)) {
        echo "Email không hợp lệ!";
    } else {
        // Kiểm tra email đã tồn tại trong cơ sở dữ liệu chưa
        $existing_user = checkEmailNot($email, $userID);
        print_r($existing_user);

        if ($existing_user) {
            echo "Email đã tồn tại!";
        } else {
            // Định nghĩa giá trị cho $roleId (cần kiểm tra giá trị đúng)
            $roleId = 1; // Ví dụ: Mặc định là sinh viên

            // Cập nhật thông tin người dùng trong cơ sở dữ liệu
            updateUsers($userID, $roleId, $email, $pass, $studentCode, $fullName, $avatar);

            // Kiểm tra và di chuyển file ảnh đại diện
            if (is_dir($target_dir)) {
                move_uploaded_file($avatar, $target_file);
            }

            echo "Cập nhật thông tin người dùng thành công!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin người dùng</title>
</head>
<body>

<h1>Sửa thông tin người dùng</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email" value="<?= $userInfo['email'] ?>">
    </div>
    <div>
        <label for="password">Mật khẩu</label>
        <input type="password" name="password" placeholder="Mật khẩu" value="<?= $userInfo['password'] ?>">
    </div>
    <div>
        <label for="studentCode">Mã sinh viên</label>
        <input type="text" name="studentCode" placeholder="Mã sinh viên" value="<?= $userInfo['studentCode'] ?>">
    </div>
    <div>
        <label for="fullName">Họ và tên</label>
        <input type="text" name="fullName" placeholder="Họ và tên" value="<?= $userInfo['fullName'] ?>">
    </div>
    <div>
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar" value="<?= $userInfo['avatar'] ?>">
    </div>

    <input type="submit" name="submit" value="Sửa thông tin người dùng">
</form>

</body>
</html>
