<?php
  include "../models/PDO.php";
  include "../../../pages/admin/header.php";

  if(isset($_GET['act']) && ($_GET['act']!="")){
      $act = $_GET['act'];
      switch($act){
          case 'qlsv':
              include './admin/student/index.php';
              break;
          
          case 'poin':
              include './admin/teacher/list.php';
              break;    

          default:
              include '../../../pages/admin/home.php';
              break;   
      }
  } else {
      include '../../../pages/admin/home.php';
  }

?>
  