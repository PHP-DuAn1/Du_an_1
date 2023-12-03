<?php
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\models\PDO.php');
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\classInfo.php');

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $classInfoId = $_GET['id'];

    deleteClassInfo($classInfoId);

    header("Location: ../class/listClass.php");
    exit();
}
