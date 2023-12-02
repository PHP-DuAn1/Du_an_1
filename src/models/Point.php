<?php
    require('PDO.php');

    function insertPoint($subjectId, $userId, $point)
    {
        $sql = "INSERT INTO point (subjectId, userId, point)";
        pdo_execute($sql, [
            ':subjectId' => $subjectId,
            ':userId' => $userId,
            ':point' => $point,
           
        ]);
    }
    function updatePoint($id, $subjectId, $userId, $point)
    {point
        $sql = "UPDATE point SET subjectId = :subjectId, userId = :userId, point = :point WHERE id = :id";
        pdo_execute($sql, [
            ':id' => $id,
            ':subjectId' => $subjectId,
            ':userId' => $userId,
            ':point' => $point
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