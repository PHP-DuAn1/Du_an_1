<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../pages/admin/hy.css">
    <link rel="stylesheet" href="./hy.css">
    <script src="https://kit.fontawesome.com/4a2609ef57.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <div class="content-left">
            <?php include "../../pages/admin/header.php"; ?>
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
                if (isset($_GET['act']) && ($_GET['act'] != "")) {
                    $act = $_GET['act'];
                    switch ($act) {
                        case 'home':
                            include '../home/home.php';
                            break;

                        // Quản lí thông báo
                        case 'qlNotification':
                            include './notification/list.php';
                            break;

                        // Quản lí sinh viên
                        case 'qlStudent':
                          if (isset($_GET['action']) && $_GET['action'] === 'create') {
                              include './student/create.php';
                          } elseif (isset($_GET['action']) && $_GET['action'] === 'return') {
                              include './student/list.php';
                          } elseif (isset($_GET['action']) && $_GET['action']==='update') {
                              include './student/update.php';
                          } elseif (isset($_GET['action']) && $_GET['action']==='delete') {
                               include './student/delete.php';
                          }else {
                               include './student/list.php';
                          }
                          break;
                      
                        // Quản lí giáo viên
                        case 'qlTeacher':
                            if (isset($_GET['action']) && $_GET['action'] === 'create') {
                                include './teacher/create.php';
                            } elseif (isset($_GET['action']) && $_GET['action'] === 'return') {
                                include './teacher/list.php';
                            } elseif (isset($_GET['action']) && $_GET['action']==='delete') {
                                 include './teacher/delete.php';
                            }else {
                                 include './teacher/list.php';
                            }
                         
                            break;

                        case 'qlPoint':
                            include './point/list.php';
                            break;

                        case 'qlMajor':
                            if (isset($_GET['action']) && $_GET['action'] === 'create') {     
                                include './major/create.php';
                           }elseif (isset($_GET['action']) && $_GET['action'] === 'return') {
                                include './major/list.php';
                           }elseif (isset($_GET['action']) && $_GET['action']==='update') {
                                include './major/update.php';
                           }elseif (isset($_GET['action']) && $_GET['action']==='delete') {
                                include './major/delete.php';

                           }elseif(isset($_GET['action']) && $_GET['action']==='subject') {
                                 include './subject/listSubject.php';
                           }elseif(isset($_GET['action']) && $_GET['action']==='createSubject'){
                                 include './subject/create.php';
                           }elseif(isset($_GET['action']) && $_GET['action']==='updateSubject'){
                                 include './subject/update.php';
                           }elseif(isset($_GET['action']) && $_GET['action']==='deleteSubject'){
                                 include './subject/delete.php';
                   
                           }elseif(isset($_GET['action']) && $_GET['action']==='class'){
                                 include './class/listClass.php';
                           }elseif(isset($_GET['action']) && $_GET['action']==='createClass'){
                                 include './class/create.php';
                           }elseif(isset($_GET['action']) && $_GET['action']==='updateClass'){
                                 include './class/update.php';
                           }elseif(isset($_GET['action']) && $_GET['action']==='deleteClass'){
                                 include './class/delete.php';

                           }elseif(isset($_GET['action']) && $_GET['action']==='classInfo'){
                                 include './classInfo/listClassInfo.php';
                           }elseif(isset($_GET['action']) && $_GET['action']==='createClassInfo'){
                                 include './classInfo/create.php';
                           }elseif(isset($_GET['action']) && $_GET['action']==='updateClassInfo'){
                                 include './classInfo/update.php';
                            }elseif(isset($_GET['action']) && $_GET['action']==='deleteClassInfo'){
                                 include './classInfo/delete.php';
                           } elseif (isset($_GET['action']) && $_GET['action']==='listStudent') {
                                 include './classInfo/listStudent.php';
                           } elseif (isset($_GET['action']) && $_GET['action']==='listTeacher') {
                                 include './classInfo/listTeacher.php';

                           } elseif (isset($_GET['action']) && $_GET['action']==='point') {
                                 include './classInfo/point.php';
   
                           }else{
                                include './major/list.php';
                           }
                            break;

                        default:
                            include '../../pages/admin/home.php';
                            break;
                    }
                } else {
                    include '../../pages/admin/home.php';
                }
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
