<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="./hy.css">
    <script src="https://kit.fontawesome.com/4a2609ef57.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="container">
        <div class="content-left">
            <ul class="menu">
                <li>
                    <a href="index.php?act=home">
                        <i class="fa-solid fa-house"></i>
                        <p>Trang chủ</p>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=qlNotification" onclick="handleMenuClick('qlNotification')">
                        <p>Thông báo</p>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=qlStudent" onclick="handleMenuClick('qlStudent')">
                        <p>Quản lý sinh viên</p>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=qlTeacher" onclick="handleMenuClick('qlTeacher')">
                        <p>Quản lý giáo viên</p>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=qlPoint" onclick="handleMenuClick('qlPoint')">
                        <p>Quản lý điểm</p>
                    </a>
                </li>
                <li>
                    <a href="index.php?act=qlMajor" onclick="handleMenuClick('qlMajor')">
                        <p>Quản lý chuyên ngành</p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="content">
          <div class="header">
            <div class="header-left">
              <i class="fa-solid fa-house"></i>
              <i class="fa-solid fa-chevron-right"></i>
              <p>Tên cột tiếp theo</p>
            </div>
            <div class="header-right">
              <i class="fa-solid fa-user"></i>
              <p>
                admin
                <?php
                 // tên admin lúc đăng nhập
                ?>
              </p>
            </div>
          </div>
          <div class="content-content">
          
            <?php
              // Nội dung của bạn ở đây
            ?>
          </div>
        </div>
      </div>

    <script>
        function handleMenuClick(action) {
            window.location.href = 'index.php?act=' + action;
        }

       
    </script>
  </body>
</html>
