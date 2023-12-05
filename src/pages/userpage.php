<div class="content">

    <div class="schedule">
        <i class="far fa-calendar-alt"></i>
        <h10 style="margin-left: 5px;">Thông Tin Cá Nhân</h10>
    </div>

    <div class="content_schedule">
        <h1>Thông Tin Cá Nhân</h1>

        <table class="table-container">
            <tr>
                <th>Ảnh Đại Diện</th>
                <th>Họ và Tên</th>
                <th>Mã Sinh Viên</th>
                <th>Email</th>
                <th>Tuổi</th>
                <th>Giới Tính</th>
            </tr>

            <?php
            require('../../models/Users.php');
            require('../../models/PDO.php');
         require(dirname(__FILE__) . '/../models/PDO.php');
         require(dirname(__FILE__) . '/../models/Users.php');


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

            $infoStudent = loadOneUsers($id);
            // print_r($inforStudent);
            // die();
            // Kiểm tra xem có thông tin sinh viên hay không
            if ($infoStudent) {
                echo '<tr>
                        <td><img src="' . $infoStudent['avatar'] . '" alt="Avatar" style="width: 50px; height: 50px;"></td>
                        <td>' . $infoStudent['fullName'] . '</td>
                        <td>' . $infoStudent['studentCode'] . '</td>
                        <td>' . $infoStudent['email'] . '</td>
                        <td>' . $infoStudent['age'] . '</td>
                        <td>' . $infoStudent['gender'] . '</td>
                    </tr>';
            }

            echo '</table>';


            ?>

        </table>
    </div>
</div>
</main>