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

function deletePoint($id)
{
    $sql = "DELETE FROM subject WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function getPointByUser($subjectId)
{
    $query = "SELECT* FROM point
        LEFT JOIN users ON point.userId = users.id 
        WHERE point.subjectId = :subjectId ";
    return pdo_query($query, [':subjectId' => $subjectId]);
}

function loadOnePoint($userId)
{
    // Chuẩn bị truy vấn SQL
    $sql = "SELECT users.fullName AS HoTen,
                   class.className AS Lop,
                   point.point AS Diem,
                   subject.subjectName AS MonHoc
            FROM users
            JOIN point ON users.id = point.userId
            JOIN class ON point.classId = class.id
            JOIN subject ON class.subjectId = subject.id
            WHERE users.id = :user_id";

    // Thực hiện truy vấn sử dụng hàm pdo_query
    $result = pdo_query($sql, [':user_id' => $userId]);

    return $result;  // Trả về mảng kết hợp chứa dữ liệu điểm
}
