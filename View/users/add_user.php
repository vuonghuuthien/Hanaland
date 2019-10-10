<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm thành viên - Quản lý thành viên</title>
</head>
<body>
    <div class="dangkythanhvien">
        <a href="index.php?controller=users&action=list-user" class="list">Danh sách</a>
        <h3>Thêm mới thành viên</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="username" placeholder="username"></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="text" name="password" placeholder="password"></td>
                </tr>
                <tr>
                    <td>Fullname : </td>
                    <td><input type="text" name="fullname" placeholder="fullname"></td>
                </tr>
                <tr>
                    <td>Sex : </td>
                    <td><input type="text" name="sex" placeholder="sex"></td>
                </tr>
                <tr>
                    <td>Birthday : </td>
                    <td><input type="text" name="birthday" placeholder="birthday"></td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td><input type="text" name="address" placeholder="address"></td>
                </tr>
                <tr>
                    <td>Phone : </td>
                    <td><input type="text" name="phone" placeholder="phone"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="text" name="email" placeholder="email"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="add_user" value="Thêm mới"></td>
                </tr>
            </table>
        </form>
        <?php
            //print_r ($thanhcong);
            if (isset($thanhcong) && in_array('add_success', $thanhcong)) {
                echo "<p>Thêm thanh công</p>";
            }
        ?>
    </div>
</body>
</html>