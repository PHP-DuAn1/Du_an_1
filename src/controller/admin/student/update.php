<?php
require('../../../models/PDO.php');
require('../../../models/Users.php');

$userID = $_GET['id']; // Lấy ID từ URL

$userInfo = loadOneUsers($userID); // Lấy thông tin của người dùng từ cơ sở dữ liệu dựa trên ID
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin người dùng</title>
</head>
<body>

<h1>Sửa thông tin người dùng</h1>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $studentCode = $_POST['studentCode'];
    $fullName = $_POST['fullName'];
    $avatar = $_FILES['avatar']['tmp_name'];
    $roleId = $_POST['roleId']; // Chức vụ, có thể là '1' hoặc '2' (sinh viên hoặc giáo viên)
    
    if (empty($email) || empty($pass) || empty($studentCode) || empty($fullName) || empty($avatar) || empty($roleId)) {
        echo "Vui lòng điền đầy đủ thông tin!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email không hợp lệ!";
    } else {
        // Cập nhật thông tin người dùng trong cơ sở dữ liệu
        updateUsers($userID, $roleId, $email, $pass, $studentCode, $fullName, $avatar);
        echo "Cập nhật thông tin người dùng thành công!";
    }
}
?>

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
    <div>
        <label for="roleId">Vai trò</label>
        <select name="roleId">
            <option value="1" <?= $userInfo['roleId'] === '1' ? 'selected' : '' ?>>Sinh viên</option>
            <option value="2" <?= $userInfo['roleId'] === '2' ? 'selected' : '' ?>>Giáo viên</option>
        </select>
    </div>
    <input type="submit" name="submit" value="Sửa thông tin người dùng">
</form>

</body>
</html>
