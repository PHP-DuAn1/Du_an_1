<?php
require('PDO.php');

function createClassInfo($userId, $classId)
{
    $sql = "INSERT INTO classinfo (userId, classId) VALUES (:userId, :classId)";
    pdo_execute($sql, [':userId' => $userId, ':classId' => $classId]);
}

function updateClassInfo($id, $userId, $classId)
{
    $sql = "UPDATE classinfo SET userId = :userId, classId = :classId WHERE id = :id";
    pdo_execute($sql, [':id' => $id, ':userId' => $userId, ':classId' => $classId]);
}

function deleteClassInfo($id)
{
    $sql = "DELETE FROM classinfo WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}

function getClassInfoById($id)
{
    $sql = "SELECT * FROM classinfo WHERE id = :id";
    return pdo_query_one($sql, [':id' => $id]);
}

function getAllClassInfo()
{
    $sql = "SELECT * FROM classinfo";
    return pdo_query($sql);
}




function getClassInfoByUserAndClass($userId, $classId) {
    $sql = "SELECT * FROM classinfo WHERE userId = :userId AND classId = :classId";
    return pdo_query_one($sql, [':userId' => $userId, ':classId' => $classId]);
}

function addStudentToClass($userId, $classId) {
    $existingRecord = getClassInfoByUserAndClass($userId, $classId);

    if ($existingRecord) {
        return false;
    }

    createClassInfo($userId, $classId);
    return true;
}

function getAllUsers() {

    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}



function getUsersByClassInfo($id_class)
{
    $sql = "SELECT * FROM users WHERE id = $id_class";
    return pdo_query($sql);
}


function loadClassInfoBySClasses($classId)
{

function getUsersByClassInfo($classId){
    $sql = "SELECT * FROM users WHERE id = $classId";
    return pdo_query($sql);
}

function loadClassInfoBySClasses($classId){

    $sql = "SELECT classInfo.* FROM classinfo 
    INNER JOIN class ON classInfo.classId = class.Id
    WHERE class.classId = :classId ";
    return pdo_query($sql, [':classId' => $classId]);
}

function getClassInfoByUsers($classId)
{
    $query = "SELECT* FROM classinfo
	LEFT JOIN users ON classinfo.userId = users.id 
    WHERE classinfo.classId = :classId ";
    return pdo_query($query, [':classId' => $classId]);
}

function loadClassInfoByUser($userId)
{
    $sql = "SELECT classInfo.*, class.className, class.classCode FROM classinfo 
            INNER JOIN class ON classInfo.classId = class.id
            WHERE classInfo.userId = :userId";
    return pdo_query($sql, [':userId' => $userId]);
}

function getUsersByClassAndRole($classId, $roleId)
{
    $sql = "SELECT users.* FROM users
            INNER JOIN classinfo ON users.id = classinfo.userId
            WHERE classinfo.classId = :classId AND users.roleId = :roleId";

    return pdo_query($sql, [':classId' => $classId, ':roleId' => $roleId]);
}

function loadClassInfoByClasses($classId)
{
    $sql = "SELECT classInfo.* FROM classinfo 
    WHERE classInfo.classId = :classId ";
    return pdo_query($sql, [':classId' => $classId]);
}


function getClassInfoByUsers($classId){
    $query = "SELECT * FROM classinfo
	LEFT JOIN users ON classinfo.userId = users.id 
    WHERE classinfo.classId = :classId ";
    return pdo_query($query,[':classId' => $classId]);
}
?>

