<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../pages/admin/hy.css" />
</head>
<body>
    <div class="container">
        <div class="content-left">
            <?php
                include "../../pages/admin/header.php";
            ?>
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
                    <p>admin</p>
                </div>
            </div>
            <div class="content-content">
                <?php
                    if(isset($_GET['act']) && ($_GET['act']!="")){
                        $act = $_GET['act'];

                        switch ($act) {
                            case 'qlNotification':
                                include "admin/notification/list.php";
                                break;
                            case 'qlStudent':
                              include './student/list.php';
                                break;
                            case 'qlTeacher':
                                include 'admin/teacher/list.php';
                                break;
                            case 'qlPoint':
                                include 'admin/point/list.php';
                                break;
                            case 'qlMajor':
                                include 'admin/major/list.php';
                                break;
                        }
                    } else {
                        include '../../pages/admin/home.php';
                    }
                ?>
            </div>
        </div>
    </div>

    
</body>
</html>
