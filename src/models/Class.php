<?php
require('PDO.php');

function createClass($className, $classCode, $subjectId) {
    $sql = "INSERT INTO class (className, classCode, subjectId) VALUES (:className, :classCode, :subjectId)";
    pdo_execute($sql, [':className' => $className, ':classCode' => $classCode, ':subjectId' => $subjectId]);
}

function updateClass($id, $className, $classCode, $subjectId) {
    $sql = "UPDATE class SET className = :className, classCode = :classCode, subjectId = :subjectId WHERE id = :id";
    pdo_execute($sql, [':id' => $id, ':className' => $className, ':classCode' => $classCode, ':subjectId' => $subjectId]);
}

function deleteClass($id) {
    $sql = "DELETE FROM class WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function getAllClasses() {
    $sql = "SELECT * FROM class";
    return pdo_query($sql);
}

function getClassById($id) {
    $sql = "SELECT * FROM class WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}

function loadOneClass($id) {
    $sql = "SELECT * FROM class WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}

function loadClassesBySubjectId($subjectId) {
    $sql = "SELECT * FROM class WHERE subjectId = :subjectId";
    return pdo_query($sql, [':subjectId' => $subjectId]);
}
?>
