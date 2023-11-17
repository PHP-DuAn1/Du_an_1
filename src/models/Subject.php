<?php
require('PDO.php');

function createSubject($subjectName, $subjectCode, $majorId) {
    $sql = "INSERT INTO subject (subjectName, subjectCode, majorId) VALUES (:subjectName, :subjectCode, :majorId)";
    pdo_execute($sql, [':subjectName' => $subjectName, ':subjectCode' => $subjectCode, ':majorId' => $majorId]);
}

function updateSubject($id, $subjectName, $subjectCode, $majorId) {
    $sql = "UPDATE subject SET subjectName = :subjectName, subjectCode = :subjectCode, majorId = :majorId WHERE id = :id";
    pdo_execute($sql, [':id' => $id, ':subjectName' => $subjectName, ':subjectCode' => $subjectCode, ':majorId' => $majorId]);
}

function deleteSubject($id) {
    $sql = "DELETE FROM subject WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function getAllSubjects() {
    $sql = "SELECT subject.*, major.majorName FROM subject LEFT JOIN major ON subject.majorId = major.id";
    return pdo_query($sql);
}

function getSubjectById($id) {
    $sql = "SELECT * FROM subject WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}
function loadSubjectsByMajorName($majorName) {
    $sql = "SELECT subject.* FROM subject 
            INNER JOIN major ON subject.majorId = major.id
            WHERE major.majorName = :majorName";
    return pdo_query($sql, [':majorName' => $majorName]);
}

?>
