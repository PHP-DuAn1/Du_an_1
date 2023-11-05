<?php
function get_user($user){
    $sql="select into user(name) values('$user')";
    pdo_execute($sql);
}

?>