<?php
    function insert_taikhoan($email, $user, $pass) {
        $sql = "INSERT INTO taikhoan (user, email, pass) VALUES (:user, :email, :pass)";
        pdo_execute($sql, array(':email' => $email, ':user' => $user, ':pass' => $pass));
    }
    
    function update_taikhoan($id, $user, $email, $pass, $tel, $role) {
        $sql = "UPDATE taikhoan SET user = :user, email = :email, pass = :pass, tel = :tel, role = :role WHERE id = :id";
        pdo_execute($sql, array(':id' => $id, ':user' => $user, ':email' => $email, ':pass' => $pass, ':tel' => $tel, ':role' => $role));
    }

    function loadone_taikhoan($id){
        $sql= "SELECT * FROM taikhoan WHERE id=" .$id;
        $tk= pdo_query_one($sql);
        return $tk;
    }
    
    function checkuser($user, $pass) {
        $sql= "SELECT * FROM taikhoan WHERE user = :user AND pass = :pass";
        $sp = pdo_query_one($sql, array(':user' => $user, ':pass' => $pass));
        return $sp;
    }
    
    function checkemail($email) {
        $sql= "SELECT * FROM taikhoan WHERE email = :email";
        $sp = pdo_query_one($sql, array(':email' => $email));
        return $sp;
    }
    
    function loadall_taikhoan() {
        $sql= "SELECT * FROM taikhoan ORDER BY user";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }

    function delete_taikhoan($id){
        $sql = "DELETE FROM taikhoan WHERE id= ".$id;
        pdo_execute($sql);
    }
?>