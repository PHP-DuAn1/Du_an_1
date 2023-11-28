<?php
require('PDO.php');

function createClassInfo($userId , $classId) {
    $sql = "INSERT INTO classinfo (userId, classId) VALUES (:userId, :classId, :subjectId)";
    pdo_execute($sql, [':userId' => $userId, ':classId' => $classId]);
}

function updateClassInfo($id, $userId, $classId) {
    $sql = "UPDATE classinfo SET userId = :userId, classId = :classId WHERE id = :id";
    pdo_execute($sql, [':id' => $id, ':userId' => $userId, ':classId' => $classId]);
}

function deleteClassInfo($id) {
    $sql = "DELETE FROM classinfo WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function getClassInfoById($id) {
    $sql = "SELECT * FROM classinfo WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}

function getAllClassInfo() {
    $sql = "SELECT * FROM classinfo";
    return pdo_query($sql);
} 
function getAllUsers() {
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

function loadClassInfoBySClasses($classId) {
    $sql = "SELECT * FROM classInfo WHERE classId = :classId";
    return pdo_query($sql, [':classId' => $classId]);
}
?>