<?php
    require('PDO.php');

    function updatePoint($id, $classId, $userId, $point)
    {
        $sql = "UPDATE point SET classId = :classId, userId = :userId, point = :point WHERE id = :id";
        pdo_execute($sql, [
            ':id' => $id,
            ':classId' => $classId,
            ':userId' => $userId,
            ':point' => $point
        ]);
    }
    function insertPoint($userId, $classId, $point)
    {
        $sql = "INSERT INTO point (classId, userId, point)";
        pdo_execute($sql, [
            ':classId' => $classId,
            ':userId' => $userId,
            ':point' => $point,
           
        ]);
    }
   
    function deletePoint($id) {
        $sql = "DELETE FROM subject WHERE id = :id";
        pdo_execute($sql, [':id' => $id]);
    }
    
    function getPointByUser ($subjectId){
        $query = "SELECT* FROM point
        LEFT JOIN users ON point.userId = users.id 
        WHERE point.subjectId = :subjectId ";
        return pdo_query($query,[':subjectId' => $subjectId]);
        
    }

?>