<?php
require('../../../models/Major.php');
require('../../../models/PDO.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $majorName = $_POST['majorName'];
    $majorCode = $_POST['majorCode'];

    // Thực hiện kiểm tra dữ liệu và tạo mới chuyên ngành
    if (empty($majorName) || empty($majorCode)) {
        echo "Vui lòng điền đầy đủ thông tin!";
    } else {
        // Gọi hàm createMajor để thêm mới chuyên ngành
        createMajor($majorName, $majorCode);
        echo "Thêm chuyên ngành thành công!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Chuyên Ngành</title>
</head>
<body>

<h1>Thêm Chuyên Ngành</h1>

<form action="" method="post">
    <div>
        <label for="majorName">Tên Chuyên Ngành</label>
        <input type="text" name="majorName" placeholder="Tên Chuyên Ngành">
    </div>
    <div>
        <label for="majorCode">Mã Chuyên Ngành</label>
        <input type="text" name="majorCode" placeholder="Mã Chuyên Ngành">
    </div>
    <input type="submit" name="submit" value="Thêm Chuyên Ngành">
</form>

</body>
</html>
