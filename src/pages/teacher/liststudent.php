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
        require('../../models/Point.php');
        require('../../models/Subject.php');

        // Lấy classId từ URL hoặc một nguồn khác
        $classId = isset($_GET['classId']) ? $_GET['classId'] : 0;

        echo '<div class="button_point">';
        echo "<button type='button'><a href='index.php?act=qlpoint&classId={$classId}'>Nhập Điểm</a></button>";
        echo '</div>';

        // Lấy thông tin điểm của sinh viên trong lớp
        $points = getPointByUsers($classId);

        if (!empty($points)) {
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
                    <td>{$point['point']}</td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "<p>Không có thông tin điểm trong lớp này.</p>";
        }
        ?>
    </div>
</div>
</main>