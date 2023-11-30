<?php
     require('../../../models/PDO.php');
     require('../../../models/classInfo.php');
    
 if (isset($_GET['class_id'])){
     $classId = $_GET['class_id'];
     $listClassInfo = loadClassInfoBySClasses($classId);
     $listStudent = getUsersByClassInfo($listClassInfo) ;
   
     print $listStudent ;
    
 }

 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h1>Danh sách học sinh trong lớp <?  ?></h1>

     <table border="1" >
        <tr>
        <th>STT</th>
        <th>Email</th>
        <th>Tên đầy đủ</th>
        <th>Mã sinh viên</th>
        <th>Giới tính</th>
        <th>Tuổi</th>
        <th>Ảnh đại diện</th>
        </tr>
        <?php  $counter =1 ; ?>

         <?php 
         $listStudent = loadAllUsers();
         foreach($listStudent as $student) :
            if ($student ['roleId'] = getDefaultRoleStudent() ) : ?>
            <tr>
                <td><?php $counter++ ?></td>
                <td><?php $listStudent['email'] ?></td>
                <td><?php $listStudent['fullName'] ?></td>
                <td><?php $listStudent['gender'] ?></td>
                <td><?php $listStudent['age'] ?></td>
            </tr> 
     </table>
</body>
</html>