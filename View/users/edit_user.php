<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thành viên - Quản lý thành viên</title>
</head>
<body>
    <div class="dangkythanhvien">
        <a href="index.php?controller=users&action=list-user" class="list">Danh sách</a>
        <h3>Chỉnh sửa thành viên</h3>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Username : </td>
                    <td><input type="text" name="username" value="<?php echo ($dataID['username']);?>" placeholder="Username"></td>
                </tr>
                <tr>
                    <td>Password : </td>
                    <td><input type="text" name="password" value="<?php echo ($dataID['password']);?>" placeholder="Password"></td>
                </tr>
                <tr>
                    <td>Fullname : </td>
                    <td><input type="text" name="fullname" value="<?php echo ($dataID['fullname']);?>" placeholder="Fullname"></td>
                </tr>
                <tr>
                    <td>Sex : </td>
                    <td><input type="text" name="sex" value="<?php echo ($dataID['sex']);?>" placeholder="Sex"></td>
                </tr>
                <tr>
                    <td>Birthday : </td>
                    <td><input type="text" name="birthday" value="<?php echo ($dataID['birthday']);?>" placeholder="Birthday"></td>
                </tr>
                <tr>
                    <td>Address : </td>
                    <td><input type="text" name="address" value="<?php echo ($dataID['address']);?>" placeholder="Address"></td>
                </tr>
                <tr>
                    <td>Phone : </td>
                    <td><input type="text" name="phone" value="<?php echo ($dataID['phone']);?>" placeholder="Phone"></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><input type="text" name="email" value="<?php echo ($dataID['email']);?>" placeholder="Email"></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td><input type="submit" name="update_user" value="Cập nhật"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>