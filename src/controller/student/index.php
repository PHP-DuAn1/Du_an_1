<?php
    include "../../pages/header.php";

    if(isset($_GET['act']) && ($_GET['act']!="")){
        $act = $_GET['act'];
        switch($act){
            case 'schedule':
                include '../../pages/schedule.php';
                break;
            
            case 'poin':
                include '../../pages/poin.php';
                break;    

            default:
                include '../../pages/main.php';
                break;   
        }
    } else {
        include '../../pages/main.php';
    }
    include "../../pages/footer.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/css.css" />
    
</head>
<body>
    
</body>
</html>