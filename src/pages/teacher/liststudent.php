<div class="content">
    <div class="schedule">
        <i class="far fa-calendar-alt"></i>
        <h10 style="margin-left: 5px;">Danh Sách Sinh Viên</h10>
    </div>
    <div class="content_schedule">
        <?php
        require('../../models/PDO.php');
        require('../../models/ClassInfo.php');
        require('../../models/Users.php');

        // Kiểm tra xem classId có tồn tại không
        $classId = isset($_GET['classId']) ? $_GET['classId'] : 0;

        // Lấy danh sách sinh viên dựa trên classId và roleId = 1 (Sinh viên)
        $students = loadClassInfoByClasses($classId);

        if (!empty($students)) {
            echo "<h2>Danh Sách Sinh Viên</h2>";
            echo "<table class='table-container'>
            <tr>
                <th>STT</th>
                <th>Họ và Tên</th>
                <th>Mã Sinh Viên</th>
                <th>Email</th>
            </tr>";

            foreach ($students as $index => $student) {
                // Gọi hàm để lấy thông tin sinh viên từ bảng users
                $userId = $student['userId'];
                $userInfo = loadOneUsers($userId);

                // Kiểm tra xem có thông tin sinh viên hay không
                if ($userInfo) {
                    echo "<tr>
                    <td>" . ($index + 1) . "</td>
                    <td>{$userInfo['fullName']}</td>
                    <td>{$userInfo['studentCode']}</td>
                    <td>{$userInfo['email']}</td>
                 </tr>";
                }
            }

            echo "</table>";
        } else {
            echo "<p>Không có sinh viên trong lớp này.</p>";
        }

        ?>
    </div>
</div>
</main>