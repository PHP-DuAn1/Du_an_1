<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giáo viên</title>
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
        input[type="password"],
        select,
        input[type="number"],
        input[type="file"] {
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
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            text-align: center;
            color: black;
            text-decoration: none;
            border-radius: 5px;
        }

        .back-link a:hover {
            background-color: #8cede3;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Thêm giáo viên</h1>

    <?php
    // Include necessary files
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
        $gender = $_POST['gender'];
        $age = $_POST['age'];

        $defaultRoleId = getDefaultRoleTeacher();

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
            $existing_user = checkEmail($email);

            if ($existing_user) {
                echo "Email đã tồn tại!";
            } else {
                // Thêm người dùng mới vào cơ sở dữ liệu
                insertUsers($defaultRoleId, $email, $pass, $studentCode, $fullName, $avatar_name, $gender, $age, $avatar_name);

                // Lưu file ảnh đại diện vào thư mục upload
                move_uploaded_file($avatar, $target_file);

                echo "Thêm giáo viên thành công!";
            }
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="email">Email</label>
        <input type="text" name="email" placeholder="Email">

        <label for="password">Mật khẩu</label>
        <input type="password" name="password" placeholder="Mật khẩu">

        <label for="studentCode">Mã giáo viên</label>
        <input type="text" name="studentCode" placeholder="Mã giáo viên">

        <label for="fullName">Họ và tên</label>
        <input type="text" name="fullName" placeholder="Họ và tên">

        <label for="gender">Giới tính</label>
        <select name="gender">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>

        <label for="age">Tuổi</label>
        <input type="number" name="age" placeholder="Tuổi">

        <label for="avatar">Ảnh đại diện</label>
        <input type="file" name="avatar">

        <!-- Missing submit button -->
        <input type="submit" name="submit" value="Thêm giáo viên">
    </form>
         
    <!-- Back link -->
    <div class="back-link">
        <a href="list.php">Quay về</a>
    </div>

</div>

</body>

</html>
