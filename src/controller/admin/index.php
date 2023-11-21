
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../pages/admin/hy.css">
</head>
<body>
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
      <?php  include "../../pages/admin/header.php"; ?>

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
              </p>
            </div>
          </div>
          <div class="content-content">
          
            <?php
              if(isset($_GET['act']) && ($_GET['act']!="")){
                $act = $_GET['act'];
                switch($act){
          
                    case 'home':
          
                        include '../home/home.php';
                        break;
          
                  // Quản lí thông báo
                  case 'qlNotification':
          
                    include './notification/list.php';
                    break;
          
                  // Quản lí sinh viên
                  case 'qlStudent':
                        include './student/list.php';
                        break;
                  
                  // Quản lí giáo viên
                  case 'qlTeacher':
                      include './teacher/list.php';
                      break;
                      
                  case 'qlPoint':
                    include './point/list.php';
                    break;    
          
                  case 'qlMajor':
                    include './major/list.php';
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

<script>
        function handleMenuClick(action) {
            window.location.href = 'index.php?act=' + action;
        }

       
    </script>
</body>
</html>
