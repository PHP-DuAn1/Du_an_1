    <?php
    if (!function_exists('pdo_get_connection')) {
        function pdo_get_connection() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ap_da1";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    }
    //thực thi các truy vấn SQL cụ thể đối với CSDL 
    if (!function_exists('pdo_execute')) {
    function pdo_execute($sql, $params = []) {
        $conn = pdo_get_connection();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
        } catch(PDOException $e) {
            throw $e;
        }
    }
    }
    
    // Truy vấn nhiều dữ liệu
    if (!function_exists('pdo_query')) {
    function pdo_query($sql, $params = []) {
        $conn = pdo_get_connection();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $rows = $stmt->fetchAll();
            return $rows;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    }
    // Truy vấn 1 dòng dữ liệu
    if (!function_exists('pdo_query_one')) {
    function pdo_query_one($sql, $params = []) {
        $conn = pdo_get_connection();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->execute($params);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch(PDOException $e) {
            throw $e;
        }
    }
    }
    ?>
