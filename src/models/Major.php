<?php
require('PDO.php');

function createMajor($majorName, $majorCode) {
    $sql = "INSERT INTO major (majorName, majorCode) VALUES (:majorName, :majorCode)";
    pdo_execute($sql, [':majorName' => $majorName, ':majorCode' => $majorCode]);
}

function updateMajor($id, $majorName, $majorCode) {
    $sql = "UPDATE major SET majorName = :majorName, majorCode = :majorCode WHERE id = :id";
    pdo_execute($sql, [':id' => $id, ':majorName' => $majorName, ':majorCode' => $majorCode]);
}

function deleteMajor($id) {
    $sql = "DELETE FROM major WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function getAllMajors() {
    $sql = "SELECT * FROM major";
    return pdo_query($sql);
}

function getMajorById($id) {
    $sql = "SELECT * FROM major WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}

function loadOneMajor($id) {
    $sql = "SELECT * FROM major WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}

function getMajorNameBySubjectId($subjectId) {
    $sql = "SELECT major.majorName FROM major
            JOIN major_subject ON major.id = major_subject.majorId
            WHERE major_subject.subjectId = :subjectId";
    return pdo_query_one($sql, [':subjectId' => $subjectId])['majorName'];
}

function createMajorSubject($subjectName, $subjectCode, $majorId) {
    $sql = "INSERT INTO subject (subjectName, subjectCode, majorId) VALUES (:subjectName, :subjectCode, :majorId)";
    pdo_execute($sql, [':subjectName' => $subjectName, ':subjectCode' => $subjectCode, ':majorId' => $majorId]);
}

function updateMajorSubject($id, $subjectName, $subjectCode, $majorId) {
    $sql = "UPDATE subject SET subjectName = :subjectName, subjectCode = :subjectCode, majorId = :majorId WHERE id = :id";
    pdo_execute($sql, [':id' => $id, ':subjectName' => $subjectName, ':subjectCode' => $subjectCode, ':majorId' => $majorId]);
}

function deleteMajorSubject($id) {
    $sql = "DELETE FROM subject WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function getAllMajorSubjects() {
    $sql = "SELECT subject.*, major.majorName FROM subject
            LEFT JOIN major ON subject.majorId = major.id";
    return pdo_query($sql);
}


function getMajorSubjectById($id) {
    $sql = "SELECT * FROM subject WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}
?>
