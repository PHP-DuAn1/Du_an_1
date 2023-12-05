<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sinh viên</title>
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

input[type="password"],
input[type="number"],
input[type="file"] {
    width: 90%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

select {
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
    text-align: center;
    margin-top: 20px;
}

.back-link a {
    display: inline-block;
    padding: 10px 20px;
    text-align: center;
    color: black;
    text-decoration: none;
    border-radius: 5px;
}

.back-link a:hover {
    color: #33CCCC;
}

    </style>
</head>
<body>

<h1>Thêm sinh viên</h1>

<?php
require(dirname(__FILE__) . '/../../../models/PDO.php');
require(dirname(__FILE__) . '/../../../models/Users.php');


function isValidEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $studentCode = $_POST['studentCode'];
    $fullName = $_POST['fullName'];
    $avatar = $_FILES['avatar']['tmp_name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $defaultRoleId = getDefaultRoleStudent();

    $avatar_name = $_FILES['avatar']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    
    if (!is_numeric($age) || $age < 0) {
        echo "<p>Độ tuổi không hợp lệ</p>";

    } elseif (empty($email) || empty($pass) || empty($studentCode) || empty($fullName) || empty($avatar_name) || empty($gender) || empty($age)) {
        echo "<p>Vui lòng điền đầy đủ thông tin!</p>";
    } elseif (!isValidEmail($email) || strpos($email, '@hn.edu.vn') === false) {
        echo "<p>Email không hợp lệ</p>";
    } else {
        // Kiểm tra email đã tồn tại trong cơ sở dữ liệu chưa
        $existing_user = checkEmail($email);

        if ($existing_user) {
            echo "<p>Email đã tồn tại!</p>";
        } else {
            // Thêm người dùng mới vào cơ sở dữ liệu
            insertUsers($defaultRoleId,$email, $pass, $studentCode, $fullName, $avatar_name ,$gender,$age);
            
            // Lưu file ảnh đại diện vào thư mục upload
            move_uploaded_file($avatar, $target_file);

            echo "<p>Thêm sinh viên thành công!</p>";
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
        <label for="gender">Giới tính</label>
        <select name="gender">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div>
        <label for="age">Tuổi</label>
        <input type="number" name="age" placeholder="Tuổi">
    </div>
    <div>
        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar">
    </div>
   
    <input type="submit" name="submit" value="Thêm người dùng">
    <div class="back-link">
    <a href="?act=qlStudent&action=return">Quay về</a>


  </div>
</form>

</body>
</html>
