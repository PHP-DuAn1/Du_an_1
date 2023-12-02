<?php
require('PDO.php');

function createNotification($tittle, $comment) {
    $sql = "INSERT INTO notification (tittle, comment) VALUES (:tittle, :comment)";
    pdo_execute($sql, [':tittle' => $tittle, ':comment' => $comment]);
}
?>