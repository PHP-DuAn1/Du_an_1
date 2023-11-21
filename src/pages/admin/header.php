<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
</head>
<link rel="stylesheet" href="./hy.css" />
<script src="https://kit.fontawesome.com/4a2609ef57.js" crossorigin="anonymous"></script>

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
    </div>

    <script>
        function handleMenuClick(action) {
            // Thực hiện xử lý khi một menu được click
            // Ví dụ: Chuyển hướng đến trang tương ứng
            window.location.href = 'index.php?act=' + action;
        }
    </script>
</body>

</html>
