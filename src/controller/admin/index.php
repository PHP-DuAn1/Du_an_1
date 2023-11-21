<?php
include "../../pages/admin/header.php";
include "../../pages/admin/home.php";

if(isset($_GET['act']) && ($_GET['act']!="")){
      $act = $_GET['act'];

    switch ($act) {
    case 'qlNotification':
        include "admin/notification/list.php";
        break;
    case 'qlStudent':
        include 'admin/student/list.php';
        break;
    case 'qlTeacher':
        include 'admin/teacher/list.php';
        break;
    case 'qlPoint':
        include 'admin/point/list.php';
        break;
    case 'qlMajor':
        include 'admin/class/list.php';
        break;
}


} else {
    include '../../pages/admin/home.php';
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../pages/admin/hy.css" />
    
</head>
<body>
    
</body>
</html>