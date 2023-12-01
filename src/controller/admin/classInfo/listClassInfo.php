<?php
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\PDO.php');
require('C:\xampp\htdocs\Dự Án 1\Du_an_1\src\models\ClassInfo.php');

$userInformationList = loadAllUsers(); // Assuming this function is defined somewhere

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2>Danh sách sinh viên</h2>

    <table>
        <tr>
            <th>User Type</th>
            <th>STT</th>
            <th>Student Code</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Age</th>
            <th>Avatar</th>
        </tr>

        <?php $counter = 1; ?>
        <?php foreach ($userInformationList as $user) : ?>
            <tr>
                <td><?php echo $user['UserType']; ?></td>
                <td><?php echo $counter++; ?></td>
                <td><?php echo $user['StudentCode']; ?></td>
                <td><?php echo $user['FullName']; ?></td>
                <td><?php echo $user['gender']; ?></td>
                <td><?php echo $user['Age']; ?></td>
                <td><img src="<?php echo $user['Avatar']; ?>" alt="User Avatar"></td>
            </tr>
        <?php endforeach; ?>

    </table>

    <h2>Danh sách sinh viên có vai trò mặc định</h2>

    <table>
        <tr>
            <th>STT</th>
            <th>Email</th>
            <th>Full Name</th>
            <th>Gender</th>
            <th>Age</th>
        </tr>

        <?php $counter = 1; ?>
        <?php foreach ($listStudent as $student) : ?>
            <tr>
                <td><?php echo $counter++; ?></td>
                <td><?php echo $student['email']; ?></td>
                <td><?php echo $student['fullName']; ?></td>
                <td><?php echo $student['gender']; ?></td>
                <td><?php echo $student['age']; ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>

</html>