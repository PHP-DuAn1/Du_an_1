<?php
require('../../../models/PDO.php');
require('../../../models/ClassInfo.php');

if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $classInfoId = $_GET['id'];

    deleteClassInfo($classInfoId);

    header("Location: ../class/listClass.php");
    exit();
}
?>