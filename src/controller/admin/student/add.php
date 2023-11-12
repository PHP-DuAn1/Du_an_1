<?php
 require('../../../models/PDO.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $studentCode = $_POST['studentCode'];
    $image = $_FILES['avatar']['tmp_name'];
    $roleId = 2; // Giả sử ID của vai trò sinh viên trong bảng roles là 2

    if (empty($fullName) || empty($email) || empty($password) || empty($studentCode) || empty($image)) {
        echo "Vui lòng điền đầy đủ thông tin!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email không hợp lệ!";

    }else {
        // Thực hiện xử lý hình ảnh và lưu vào cơ sở dữ liệu ở đây
        try {
            $conn = pdo_get_connection();
            $sql = "INSERT INTO users (roleId, email, password, studentCode, fullName, avatar) 
            VALUES (:roleId, :email, :password, :studentCode, :fullName, :avatar)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':roleId', $roleId);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':studentCode', $studentCode);
    $stmt->bindParam(':fullName', $fullName);
    $stmt->bindParam(':avatar', $image);
    $stmt->execute();
    
            echo "Thêm sinh viên thành công!";
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>


<div class="boxleft">
    <div class="box-title">Thêm sinh viên</div>
    <div class="form-account">
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="fullName">Họ và tên</label>
                <input type="text" name="fullName" placeholder="Mật khẩu">
            </div>
            <div>
            <label for="email">Email</label>
                <input type="text" name="email" placeholder="email">
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
                <label for="avatar">Ảnh</label>
                <input type="file" name="avatar" >
            </div>
            

            <input type="submit" name="submit" value="Thêm ">

        </form>
    </div>
</div>