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
            require('../../models/ClassInfo.php');

            // Lấy userId từ session
            if (!isset($_SESSION['user'])) {
                // Nếu không có thông tin người dùng trong session, chuyển hướng về trang đăng nhập
                header('Location: path_to_login.php');
                exit();
            }

            // Lấy userId từ session
            $id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '';

            // Lấy danh sách lớp dựa trên userId
            $classes = loadClassInfoByUser($id);

            // Hiển thị thông tin lớp học
            if (!empty($classes)) {
                echo "<table class='table-container'>
                        <tr>
                            <th>STT</th>
                            <th>Lớp</th>
                            <th>Mã Lớp</th>
                            <th>Danh Sách Sinh Viên</th>
                        </tr>";

                foreach ($classes as $index => $class) {
                    // Đảm bảo rằng các khóa 'className' và 'classCode' tồn tại trong mảng $class
                    $className = isset($class['className']) ? $class['className'] : 'Không có tên lớp';
                    $classCode = isset($class['classCode']) ? $class['classCode'] : 'Không có mã lớp';
                    $classTableId = isset($class['classId']) ? $class['classId'] : 0; // Giả sử 'id' là khóa chính của bảng class

                    echo "<tr>
                            <td>" . ($index + 1) . "</td>
                            <td>$className</td>
                            <td>$classCode</td>
                            <td><button><a href='index.php?act=qlstudent&classId=$classTableId'>Danh Sách</a></button></td>
                        </tr>";
                }

                echo "</table>";
            } else {
                echo "<p>Không tìm thấy lớp học cho người dùng.</p>";
            }
            ?>
        </form>
    </div>
</div>
</main>