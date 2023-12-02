    <?php
    require('PDO.php');

    function insertUsers($roleId, $email, $password, $studentCode, $fullName, $gender, $age, $avatar)
    {
        $sql = "INSERT INTO users (roleId, email, password, studentCode, fullName, gender, age, avatar) VALUES (:roleId, :email, :password, :studentCode, :fullName, :gender, :age, :avatar)";
        pdo_execute($sql, [
            ':roleId' => $roleId,
            ':email' => $email,
            ':password' => $password,
            ':studentCode' => $studentCode,
            ':fullName' => $fullName,
            ':gender' => $gender,
            ':age' => $age,
            ':avatar' => $avatar
        ]);
    }

    function updateUsers($id, $email, $password, $studentCode, $fullName, $gender, $age, $avatar)
    {
        $sql = "UPDATE users SET email = :email, password = :password, studentCode = :studentCode, fullName = :fullName, gender = :gender, age = :age, avatar = :avatar WHERE id = :id";
        pdo_execute($sql, [
            ':id' => $id,
            ':email' => $email,
            ':password' => $password,
            ':studentCode' => $studentCode,
            ':fullName' => $fullName,
            ':
            gender' => $gender,
            ':age' => $age,
            ':avatar' => $avatar
        ]);
    }

    function loadOneUsers($id)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $account = pdo_query_one($sql, [':id' => $id]);
        return $account;
    }

    function checkUser($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
        $sp = pdo_query_one($sql, [':email' => $email, ':password' => $password]);
        return $sp;
    }

    function checkEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $check = pdo_query_one($sql, [':email' => $email]);
        return $check;
    }
    function checkEmailNot($email, $id)
    {
        $sql = "SELECT * FROM users WHERE email = :email AND NOT id = :id";
        $check = pdo_query_one($sql, [':email' => $email, ':id' => $id]);
        return $check;
    }


    function loadAllUsers($kyw = "")
    {
        $sql = "SELECT * FROM users WHERE 1";
        $params = array(); // Define $params even if $kyw is empty

        if ($kyw != "") {
            $sql .= " AND (fullName LIKE :keyword OR studentCode LIKE :keyword)";
            $params[':keyword'] = '%' . $kyw . '%';
        }

        $sql .= " ORDER BY email";
        $listUsers = pdo_query($sql, $params); // Pass $params to pdo_query
        return $listUsers;
    }
    function deleteUsers($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        pdo_execute($sql, [':id' => $id]);
    }
    function getDefaultRoleStudent()
    {
        // Thực hiện truy vấn SQL để lấy giá trị roles mặc định từ bảng roles
        $query = "SELECT id FROM role WHERE roleName = 'Sinh viên'"; // Điều kiện tìm kiếm cho Sinh viên
        $result = pdo_query_one($query);

        if ($result) {
            return $result['id'];
        } else {

            return 1;
        }
    }
    function getDefaultRoleTeacher()
    {
        // Thực hiện truy vấn SQL để lấy giá trị roles mặc định từ bảng roles
        $query = "SELECT id FROM role WHERE roleName = 'Giáo viên'"; // Điều kiện tìm kiếm cho Giáo viên
        $result = pdo_query_one($query);

        if ($result) {
            return $result['id'];
        } else {

            return 1;
        }
    }
    ?>
