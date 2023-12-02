  <?php
  require('../../../models/Major.php');
  require('../../../models/PDO.php');

  // Kiểm tra xem có tham số id được truyền vào không
  if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $majorInfo = loadOneMajor($id);

      // Kiểm tra xem chuyên ngành có tồn tại không
      if (!$majorInfo) {
          // Nếu không, chuyển hướng về trang danh sách chuyên ngành hoặc thực hiện xử lý khác theo yêu cầu của bạn
          header("Location: list.php");
          exit();
      }
  } else {
      // Nếu không có id, chuyển hướng về trang danh sách chuyên ngành
      header("Location: list.php");
      exit();
  }

  // Kiểm tra xem có dữ liệu được gửi từ form không
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      $majorName = htmlspecialchars($_POST['majorName']);
      $majorCode = htmlspecialchars($_POST['majorCode']);

      // Kiểm tra xem các trường thông tin cần thiết đã được điền đầy đủ không
      if (empty($majorName) || empty($majorCode)) {
          $error_message = "Vui lòng điền đầy đủ thông tin!";
      } else {
          // Cập nhật thông tin chuyên ngành
          updateMajor($id, $majorName, $majorCode);

          // Chuyển hướng về trang danh sách chuyên ngành sau khi cập nhật
          header("Location: list.php");
          exit();
      }
  }
  ?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Cập Nhật Chuyên Ngành</title>
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
    background-color: #3f4857;
    color: black;
    text-decoration: none;
    border-radius: 5px;
    transition: color 0.3s ease-in-out;
}

.back-link a:hover {
    color: #33CCCC;
}

      </style>
  </head>
  <body>

  <h1>Cập Nhật Chuyên Ngành</h1>

  <?php if (isset($error_message)): ?>
      <p style="color: red;"><?= $error_message ?></p>
  <?php endif; ?>

  <form action="" method="post">
      <input type="hidden" name="id" value="<?= $majorInfo['id'] ?>">
      <div>
          <label for="majorName">Tên Chuyên Ngành</label>
          <input type="text" name="majorName" placeholder="Tên Chuyên Ngành" value="<?= htmlspecialchars($majorInfo['majorName']) ?>">
      </div>
      <div>
          <label for="majorCode">Mã Chuyên Ngành</label>
          <input type="text" name="majorCode" placeholder="Mã Chuyên Ngành" value="<?= htmlspecialchars($majorInfo['majorCode']) ?>">
      </div>
      <div>
          <input type="submit" name="submit" value="Cập Nhật">
      </div>
      <div class="back-link">
      <a href="../major/list.php">Quay về </a>
    </div>
  </form>

  </body>
  </html>
      