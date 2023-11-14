 <?php
 require('PDO.php');

 function insertUsers($roleId, $email, $password, $studentCode, $fullName, $avatar) {
    $sql = "INSERT INTO users (roleId, email, password, studentCode, fullName, avatar) VALUES (:roleId, :email, :password, :studentCode, :fullName, :avatar)";
    pdo_execute($sql, [
        ':roleId' => $roleId,
        ':email' => $email,
        ':password' => $password,
        ':studentCode' => $studentCode,
        ':fullName' => $fullName,
        ':avatar' => $avatar
    ]);
}
function updateUsers($id, $roleId, $email, $password, $studentCode, $fullName, $avatar) {
    $sql = "UPDATE users SET roleId = :roleId, email = :email, password = :password, studentCode = :studentCode, fullName = :fullName, avatar = :avatar WHERE id = :id";
    pdo_execute($sql, [
        ':id' => $id,
        ':roleId' => $roleId,
        ':email' => $email,
        ':password' => $password,
        ':studentCode' => $studentCode,
        ':fullName' => $fullName,
        ':avatar' => $avatar
    ]);
}

function loadOneUsers($id){
    $sql = "SELECT * FROM users WHERE id = :id";
    $account = pdo_query_one($sql, [':id' => $id]);
    return $account;
}

function checkUser($email, $password) {
    $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
    $sp = pdo_query_one($sql, [':email' => $email, ':password' => $password]);
    return $sp;
}

function checkEmail($email) {
    $sql = "SELECT * FROM users WHERE email = :email";
    $check = pdo_query_one($sql, [':email' => $email]);
    return $check;
}

function loadAllUsers() {
    $sql = "SELECT * FROM users ORDER BY email";
    $listUsers = pdo_query($sql);
    return $listUsers;
}

function deleteUsers($id){
    $sql = "DELETE FROM users WHERE id = :id";
    pdo_execute($sql, [':id' => $id]);
}
?>
