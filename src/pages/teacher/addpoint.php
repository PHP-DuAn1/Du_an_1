<div class="content">
    <div class="schedule">
        <i class="far fa-calendar-alt"></i>
        <h10 style="margin-left: 5px;">Nhập Điểm</h10>
    </div>

    <?php
    require('../../models/PDO.php');
    require('../../models/ClassInfo.php');
    require('../../models/Users.php');
    require('../../models/Point.php');
    require('../../models/Subject.php');

    // Lấy classId từ URL hoặc một nguồn khác
    $classId = isset($_GET['classId']) ? $_GET['classId'] : 0;

    // Lấy thông tin điểm của sinh viên trong lớp
    $points = getPointByUsers($classId);


    if (!empty($points)) {
        echo "<form method='post' action=''>";
        echo "<table class='table-container'>
                <tr>
                    <th>STT</th>
                    <th>Họ và Tên</th>
                    <th>Mã Sinh Viên</th>
                    <th>Điểm</th>
                </tr>";



        foreach ($points as $index => $point) {
            // Lấy thông tin sinh viên từ bảng users
            $userId = $point['userId'];
            $userInfo = loadOneUsers($userId);

            echo "<tr>
                    <td>" . ($index + 1) . "</td>
                    <td>{$userInfo['fullName']}</td>
                    <td>{$userInfo['studentCode']}</td>
                    <td>
                        <input type='hidden' name='userId[]' value='{$userId}'>";
            // Kiểm tra xem điểm đã tồn tại hay chưa
            if (!empty($point['point'])) {
                echo "<input type='text' name='point[]' value='{$point['point']}'>";
            } else {
                echo "<input type='text' name='point[]'>";
            }
            echo "</td>
                </tr>";
        }

        echo "<tr>
                <td colspan='4'>
                    <input type='hidden' name='classId' value='{$classId}'>
                    <input type='submit' name='submit' value='Thêm Điểm'>
                </td>
            </tr>";
        echo "</table>";
        echo "</form>";
    } else {
        echo "<p>Không có thông tin điểm trong lớp này.</p>";
    }
    ?>
</div>
</div>
</main>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Lấy dữ liệu từ form
    $classId = isset($_POST['classId']) ? $_POST['classId'] : 0;
    $userIds = $_POST['userId'];
    $points = $_POST['point'];

    // Kiểm tra và cập nhật điểm cho từng sinh viên
    for ($i = 0; $i < count($userIds); $i++) {
        $userId = $userIds[$i];
        $pointValue = $points[$i];

        // Kiểm tra xem đã có điểm cho sinh viên này chưa
        $existingPoint = getPointByUserId($classId, $userId);

        if ($existingPoint) {
            // Nếu đã có điểm, thực hiện cập nhật
            updatePoint($existingPoint['id'], $classId, $userId, $pointValue);
        } else {
            // Nếu chưa có điểm, thực hiện thêm mới
            insertPoint($classId, $userId, $pointValue);
        }
    }

    // Hiển thị thông báo thành công sử dụng JavaScript
    echo '<script>alert("Thêm điểm thành công!");</script>';
}
?>