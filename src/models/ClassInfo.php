<?php
require('PDO.php');

function createClassInfo($userId, $classId) {
    $sql = "INSERT INTO classinfo (userId, classId) VALUES (:userId, :classId)";
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


function getUsersByClassInfo($id_class){
    $sql = "SELECT * FROM users WHERE id = $id_class";
    return pdo_query($sql);
}


function loadClassInfoBySClasses($classId){
    $sql = "SELECT classInfo.* FROM classinfo 
    INNER JOIN class ON classInfo.classId = class.Id
    WHERE class.classId = :classId ";
    return pdo_query($sql, [':classId' => $classId]);
}
function loadClassInfoBySUsers($classId){
    $sql = "SELECT class.* FROM class
    INNER JOIN users ON class.usersId = users.Id
    WHERE usersId.usersId = :usersId ";
    return pdo_query($sql, [':usersId' => $usersId]);
}
function getDefaultRoleStudent() {
    // Thực hiện truy vấn SQL để lấy giá trị roles mặc định từ bảng roles
    $query = "SELECT id FROM role WHERE roleName = 'Sinh viên'"; // Điều kiện tìm kiếm cho Sinh viên
    $result = pdo_query_one($query);

    if ($result) {
        return $result['id'];
    } else {
    
        return 1; 
    }
}
?>
