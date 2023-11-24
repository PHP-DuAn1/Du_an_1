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
function getUserInformationList() {
    $sql = "SELECT 
                users.id AS ID,
                users.fullName AS FullName,
                users.studentCode AS StudentCode,
                users.gender AS gender,
                users.age AS Age,
                users.avatar AS Avatar,
                'Student' AS UserType
            FROM users
            WHERE users.roleId = 1

            UNION

            SELECT 
                users.id AS ID,
                users.fullName AS FullName,
                users.studentCode AS StudentCode,
                users.gender AS gender,
                users.age AS Age,
                users.avatar AS Avatar,
                'Teacher' AS UserType
            FROM users
            WHERE users.roleId = 2";

    return pdo_query($sql);
}
function getAllClass() {
    $sql = "SELECT * FROM class";
    return pdo_query($sql);
}
?>