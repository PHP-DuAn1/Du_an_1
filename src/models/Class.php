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

function loadSubjectsByMajor($majorId) {
    $sql = "SELECT subject.*, major.majorName FROM subject 
            LEFT JOIN major ON subject.majorId = major.id
            WHERE subject.majorId = :majorId";
    return pdo_query($sql, [':majorId' => $majorId]);
}
?>  