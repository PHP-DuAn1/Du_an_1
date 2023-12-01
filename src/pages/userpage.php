<div class="content">

    <div class="schedule">
        <i class="far fa-calendar-alt"></i>
        <h10 style="margin-left: 5px;">Thông Tin Cá Nhân</h10>
    </div>

    <div class="content_schedule">
        <h1>Thông Tin Sinh Viên</h1>

        <table class="table-container">
            <tr>
                <th>Ảnh Đại Diện</th>
                <th>Họ và Tên</th>
                <th>Mã Sinh Viên</th>
                <th>Email</th>
                <th>Mật Khẩu</th>
                <th>Tuổi</th>
                <th>Giới Tính</th>
                <th>Chỉnh Sửa</th>
            </tr>

            <?php
            require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\Users.php');
            require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\PDO.php');

            // session_start();
            if (!isset($_SESSION['user'])) {
                // Nếu không có thông tin người dùng trong session, chuyển hướng về trang đăng nhập
                header('Location: path_to_login.php');
                exit();
            }

            // Lấy giá trị id từ thông tin người dùng trong session
            $id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '';
            // echo $id;
            // die();

            $inforStudent = loadOneUsers($id);
            // print_r($inforStudent);
            // die();
            // Kiểm tra xem có thông tin sinh viên hay không
            if ($inforStudent) {
                echo '<tr>
                        <td><img src="' . $inforStudent['avatar'] . '" alt="Avatar" style="width: 50px; height: 50px;"></td>
                        <td>' . $inforStudent['fullName'] . '</td>
                        <td>' . $inforStudent['studentCode'] . '</td>
                        <td>' . $inforStudent['email'] . '</td>
                        <td>' . $inforStudent['password'] . '</td>
                        <td>' . $inforStudent['age'] . '</td>
                        <td>' . $inforStudent['gender'] . '</td>
                        <td><a href="update.php?id=' . $inforStudent['id'] . '">Sửa</a></td>
                    </tr>';
            }

            echo '</table>';


            ?>

        </table>
    </div>
</div>
</main>