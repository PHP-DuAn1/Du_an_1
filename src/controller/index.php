<?php
  include "../models/PDO.php";
  include "../../../pages/admin/header.php";

  if(isset($_GET['act']) && ($_GET['act']!="")){
      $act = $_GET['act'];
      switch($act){
          case 'glsv':
              include './student/login/login.php';
              break;
          
          case 'glgv':
              include './teacher/login/login.php';
              break;    

          default:
              include './admin';
              break;   
      }
  } else {
      include '../../../pages/admin/home.php';
  }

?>
  