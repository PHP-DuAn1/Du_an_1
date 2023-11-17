<?php
require('PDO.php');

function isSubjectNameUnique($subjectName, $majorId) {
    $sql = "SELECT COUNT(*) FROM subject WHERE subjectName = :subjectName AND majorId = :majorId";
    $result = pdo_query_one($sql, [':subjectName' => $subjectName, ':majorId' => $majorId]);
    return $result['COUNT(*)'] == 0;
}

function createSubject($subjectName, $subjectCode, $majorId) {
    // Kiểm tra xem tên môn học có duy nhất trong chuyên ngành không
    if (isSubjectNameUnique($subjectName, $majorId)) {
        $sql = "INSERT INTO subject (subjectName, subjectCode, majorId) VALUES (:subjectName, :subjectCode, :majorId)";
        pdo_execute($sql, [':subjectName' => $subjectName, ':subjectCode' => $subjectCode, ':majorId' => $majorId]);
        return true;
    } else {
        return false; // Tên môn học đã tồn tại trong chuyên ngành
    }
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

?>
