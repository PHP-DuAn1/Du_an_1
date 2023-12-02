<?php
require('../../../models/PDO.php');
require('../../../models/PDO.php');

if (isset($_GET['id'])){
    $subjectId = $_GET['id'];
    $listPoint = getPointByUser($subjectId) ;
}
?>
