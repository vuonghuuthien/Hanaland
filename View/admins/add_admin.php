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