<?php
include "../../pages/headerTeacher.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'teachingSchedule':
            include '../../pages/teachingSchedule.php';
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
