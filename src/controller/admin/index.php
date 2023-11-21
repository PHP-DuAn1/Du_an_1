<?php
  include "../../pages/admin/header.php";

  if(isset($_GET['act']) && ($_GET['act']!="")){
      $act = $_GET['act'];
      switch($act){



        // Quản lí thông báo
        case 'qltb':

          include '../notification/list.php';
          break;

        // Quản lí sinh viên
        case 'qlsv':
              include '../student/list.php';
              break;
        
        // Quản lí giáo viên
        case 'qlgv':
            include '../teacher/list.php';
            break;
            
        case 'qld':
          include '../point/list.php';
          break;    

        case 'qlcn':
          include '../major/list.php';
          break;
      
        case 'qll':
          include '../class/list.php';
          break;        
        
        default:
          include '../../pages/admin/home.php';
          break;   
      }
  } else {
      include '../../pages/admin/home.php';
  }

?>
