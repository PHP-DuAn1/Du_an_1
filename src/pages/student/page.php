<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trang chủ - Web quản lí học tập</title>

    <style>
      /* CSS để tạo menu, header và footer */
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
      }

      .container {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
      }

      .menu {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #0099cc;
        padding: 20px;
        color: #fff;
      }

      .logo img {
        width: 120px;
        height: auto;
        height: 50px;
        border-radius: 10px;
      }

      .menu-items {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex;
      }

      .menu-items li {
        margin-right: 30px;
      }

      .menu-items a {
        padding: 10px;
        background-color: #fff;
        text-decoration: none;
        color: #0099cc;
        border-radius: 10px;
      }

      .menu-items a:hover {
        background-color: #005580;
        color: #fff;
      }

      .header {
        text-align: center;
        background-color: #f1f1f1;
        padding: 20px;
      }

      .header img {
        width: 100%;
        max-height: 1000px;
        object-fit: cover;
      }

      .footer {
        background-color: #0099cc;
        padding: 20px;
        text-align: center;
        color: #fff;
      }

      .footer .logo img {
        width: 150px;
        height: auto;
      }

      .footer p {
        margin-bottom: 10px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="menu">
        <div class="logo">
          <img src="../../img/logo.jpg" alt="Logo" />
        </div>
        <ul class="menu-items">
          <li <?php   ?>><a href="pages/student/header.php">GIẢNG VIÊN</a></li>
          <li>
            <a href="../../controller/student/login/login.php">SINH VIÊN</a>
          </li>
          <li><a href="../admin/layoutAdmin.php">ADMIN</a></li>
        </ul>
      </div>

      <header class="header">
        <img src="../../img/banner.jpeg" alt="" />
      </header>

      <footer class="footer">
        <div class="logo">
          <img src="../../img/logofpt2.webp" alt="Logo" />
        </div>
        <p>45 ĐƯỜNG XUÂN PHƯƠNG, PHƯỜNG PHƯƠNG CANH, NAM TỪ LIÊM, HÀ NỘI</p>
        <p>Liên hệ: 1900 8390 | Email: fptpolytechnic.edu.vn</p>
      </footer>
    </div>
  </body>
</html>
