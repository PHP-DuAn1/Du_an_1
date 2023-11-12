<?php
// Thiết lập kết nối
function pdo_get_connection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Ap_da1";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        throw $e;
    }
}

// Thực thi câu lệnh SQL
function pdo_execute($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    $conn = pdo_get_connection();
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
    } catch(PDOException $e) {
        throw $e;
    }
}

// Truy vấn nhiều dữ liệu
function pdo_query($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    $conn = pdo_get_connection();
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch(PDOException $e) {
        throw $e;
    }
}

// Truy vấn 1 dòng dữ liệu
function pdo_query_one($sql) {
    $sql_args = array_slice(func_get_args(), 1);
    $conn = pdo_get_connection();
    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch(PDOException $e) {
        throw $e;
    }
}
?>
