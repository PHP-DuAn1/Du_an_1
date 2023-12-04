<div class="content">
    <div class="schedule">
        <i class="far fa-calendar-alt"></i>
        <h10 style="margin-left: 5px;">Điểm</h10>
    </div>
    <div class="content_schedule">
        <form action="#" method="POST" id="bang">
            <?php
            require('../../models/PDO.php');
            require('../../models/Users.php');
            require('../../models/Subject.php');
            require('../../models/Point.php');

            if (!isset($_SESSION['user'])) {
                // Nếu không có thông tin người dùng trong session, chuyển hướng về trang đăng nhập
                header('Location: path_to_login.php');
                exit();
            }

            // Lấy userId từ session
            $userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '';

            if ($userId) {
                // Gọi hàm để lấy thông tin điểm
                $pointData = loadOnePoint($userId);
                echo "<table class='table-container'>
                <tr>
                  <th>#</th>
                  <th>Họ và Tên</th>
                  <th>Môn Học</th>
                  <th>Lớp</th>
                  <th>Điểm</th>
                </tr>";

                $count = 1;
                foreach ($pointData as $row) {
                    echo "<tr>
            <td>{$count}</td>
            <td>" . (isset($row['HoTen']) ? $row['HoTen'] : '') . "</td>
             <td>" . (isset($row['MonHoc']) ? $row['MonHoc'] : '') . "</td>
            <td>" . (isset($row['Lop']) ? $row['Lop'] : '') . "</td>
            <td>" . (isset($row['Diem']) ? $row['Diem'] : '') . "</td>
          </tr>";
                    $count++;
                }

                echo "</table>";
            } else {
                echo "Không có thông tin người dùng trong session.";
            }
            ?>
        </form>
    </div>
</div>
</main>