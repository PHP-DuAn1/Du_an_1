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
      margin-top:15px;
    }

    .back-link a {
      padding: 10px 20px;
      
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
