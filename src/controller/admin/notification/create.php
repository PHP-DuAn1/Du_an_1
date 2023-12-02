<?php
require('../../../models/Notification.php');
require('../../../models/PDO.php');


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $tittle = $_POST['tittle'];
    $comment = $_POST['comment'];

    // Thực hiện kiểm tra dữ liệu và tạo mới thông báo
    if (empty($tittle) || empty($tittle)) {
        echo "Vui lòng điền đầy đủ thông tin!";
    } else {
        // Gọi hàm createMajor để thêm mới nội dung
        createNotification($tittle, $comment);
        echo "Thêm thông báo thành công!";
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

<h1>Thông báo</h1>

<form action="" method="post">
    <div>
        <label for="tittle">Tiêu đề</label>
        <input type="text" name="tittle" placeholder="Tiêu đề">
    </div>
    <div>
        <label for="majorCode">Nội dung</label>
        <input type="text" name="comment" placeholder="Nội dung">
    </div>
    <input type="submit" name="submit" value="Thêm">
    <div class="back-link">
    <a href="../notification/list.php">Quay về <a>
  </div>
</form>

</body>
</html>
