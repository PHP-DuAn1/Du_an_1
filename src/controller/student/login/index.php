<?php
    include "../../../pages/header.php";

    if(isset($_GET['act']) && ($_GET['act']!="")){
        $act = $_GET['act'];
        switch($act){
            case 'schedule':
                include '../../../pages/schedule.php';
                break;
            
            case 'poin':
                include '../../../pages/poin.php';
                break;    

            default:
                include '../../../pages/main.php';
                break;   
        }
    } else {
        include '../../../pages/main.php';
    }
    include "../../../pages/footer.php";
?>