<?php
include "../../pages/headerTeacher.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'qlclass':
            include '../../pages/teacher/listclass.php';
            break;

        case 'qlstudent':
            include '../../pages/teacher/liststudent.php';
            break;

        case 'qlpoint':
            include '../../pages/teacher/addpoint.php';
            break;

        case 'userpage':
            include '../../pages/userpage.php';
            break;

        case 'logout':
            session_unset();
            header('Location: ../../pages/student/page.php');
            break;

        default:
            include '../../pages/main.php';
            break;
    }
} else {
    include '../../pages/main.php';
}
include "../../pages/footer.php";
