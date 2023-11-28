<?php
require('PDO.php');
function feedback($id,$name,$title,$comment,$photo){
    $sql="INSERT INTO feedback (id,name,title,comment,photo) VALUES ('$id','$name','$title','$comment','$photo')";
    pdo_execute($sql);
}


?>
