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
    <style> 
body {
    background-color: #f2f2f2;
    font-family: 'Arial', sans-serif;
}

form {
    background-color: #fff;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
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
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #3f4857;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

input[type="submit"]:hover {
    background-color: #1d2430;
}

.back-link {
    text-align: center;
    margin-top: 20px;
}

.back-link a {
    padding: 10px 20px;
    color: #3f4857;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease-in-out;
}

.back-link a:hover {
    background-color: #8cede3;
}


      </style>
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
    <div class="back-link">
    <a href="../major/list.php">Quay về <a>
  </div>
</form>

</body>
</html>
