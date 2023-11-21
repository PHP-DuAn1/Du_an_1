<?php
require('PDO.php');

function createClass($className, $classCode) {
    $sql = "INSERT INTO class (className, classCode) VALUES (:className, :classCode)";
    pdo_execute($sql, [':className' => $className, ':classCode' => $classCode]);
}

function updateClass($id, $className, $classCode) {
    $sql = "UPDATE class SET className = :className, classCode = :classCode WHERE id = :id";
    pdo_execute($sql, [':id' => $id, ':className' => $className, ':classCode' => $classCode]);
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

function loadSubjectsByClass($classId) {
    $sql = "SELECT subject.* FROM subject
            JOIN class ON subject.classId = class.id
            WHERE class.id = :classId";
    return pdo_query($sql, [':classId' => $classId]);
}

function getSubjectByName($subjectName) {
    $sql = "SELECT * FROM subject WHERE subjectName = :subjectName";
    return pdo_query_one($sql, [':subjectName' => $subjectName]);
}
?>
