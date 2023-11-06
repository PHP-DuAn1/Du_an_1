<?php
    function insert_taikhoan($email, $pass) {
        $sql = "INSERT INTO taikhoan ( email, pass) VALUES ( :email, :pass)";
        pdo_execute($sql, array(':email' => $email, ':pass' => $pass));
    }
    
    function update_taikhoan($id, $user, $email, $pass, $tel, $role) {
        $sql = "UPDATE taikhoan SET email = :email, pass = :pass, tel = :tel, role = :role WHERE id = :id";
        pdo_execute($sql, array(':id' => $id, ':email' => $email, ':pass' => $pass, ':tel' => $tel, ':role' => $role));
    }

    function loadone_taikhoan($id){
        $sql= "SELECT * FROM taikhoan WHERE id=" .$id;
        $tk= pdo_query_one($sql);
        return $tk;
    }
    
    function checkuser($email, $pass) {
        $sql= "SELECT * FROM taikhoan WHERE email = :email AND pass = :pass";
        $sp = pdo_query_one($sql, array(':email' => $email, ':pass' => $pass));
        return $sp;
    }
    
    function checkemail($email) {
        $sql= "SELECT * FROM taikhoan WHERE email = :email";
        $sp = pdo_query_one($sql, array(':email' => $email));
        return $sp;
    }
    
    function loadall_taikhoan() {
        $sql= "SELECT * FROM taikhoan ORDER BY email";
        $listtaikhoan = pdo_query($sql);
        return $listtaikhoan;
    }

    function delete_taikhoan($id){
        $sql = "DELETE FROM taikhoan WHERE id= ".$id;
        pdo_execute($sql);
    }
?>