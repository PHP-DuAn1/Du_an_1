<?php
   $managerPoint = include ("../manager/point/index.php");
   $managerUsers = include ("../manager/users/index.php");
   $statistical = include ("../statistical/index.php");
   
   

?>

   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../../css/homeAmin.css">
   </head>
   <body>
    
        <a href="<?php echo $managerPoint ?>">Quản lý điểm số</a>
        <a href="<?php echo $managerUsers ?>">Quản lý người dùng</a>
        <a href="<?php echo $managerPoint ?>">Quản lý điểm số</a>    
        <a href="<?php echo $statistical ?>">Thống kê về sinh viên và giáo viên hiện tại</a>
       
   
   </body>
   </html