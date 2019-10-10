<div>
    <form action="" method="GET">
        <input type="hidden" name="controller" value="users">
        <table>
            <tr>
                <td><input type="text" name="tukhoa" placeholder="Nhập username"></td>
                <td><input type="submit" value="Tìm kiếm"></td>
            </tr>
        </table>
        <input type="hidden" name="action" value="search">
    </form>
</div>

<div class="danhsach">
    <h3>Danh sách thành viên - Quản lý thành viên</h3>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Username</th>
                <th>Password</th>
                <th>Fullname</th>
                <th>Sex</th>
                <th>Birthday</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                //echo "<pre>";
                //print_r($data);
                $stt  = 1;
                if (!empty($data)) {
                    foreach ((array)$data as $value) {
            ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $value['username']; ?></td>
                            <td><?php echo $value['password']; ?></td>
                            <td><?php echo $value['fullname']; ?></td>
                            <td><?php echo $value['sex']; ?></td>
                            <td><?php echo $value['birthday']; ?></td>
                            <td><?php echo $value['address']; ?></td>
                            <td><?php echo $value['phone']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td>
                                <a href="index.php?controller=users&action=edit&id=<?php echo $value['id']; ?>">Edit</a>
                                <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="index.php?controller=users&action=delete&id=<?php echo $value['id']; ?>" title="Xóa">Delete</a>
                            </td>
                        </tr>
            <?php
                        $stt++;
                    }
                }
            ?>
            <a href="index.php?controller=users&action=add">Add</a>
        </tbody>
    </table>
</div>