<?php
    class Database {
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'hanaland';
        private $conn = NULL;
        private $result = NULL;
        
        // Tạo Table for Users
        public function createTableUsers() {
            $sql = "USE $this->dbname";
            if ($this->conn->query($sql) === TRUE) {
                $message = "Using the database successfully.";
            } else {
                $message = "The database usage failed: " . $this->conn->error;
            }
            //echo "<script type='text/javascript'>alert('$message');</script>";
            $sql = "SELECT id FROM users"; // get id để kiểm tra có tồn tại Table Users hay không
            if ($this->conn->query($sql) === FALSE) {
                if(empty($result)) {
                    $sql = "CREATE TABLE users (
                            id int(11) NOT NULL AUTO_INCREMENT,
                            username varchar(255) NOT NULL,
                            password varchar(255) NOT NULL,
                            avatar varchar(255) default 'demo.jpg',
                            fullname varchar(255),
                            sex char(1),
                            birthday date,
                            address varchar(255),
                            phone varchar(22),
                            email varchar(255),
                            active boolean not null default 1,
                            position tinyint(1) default 3,
                            PRIMARY KEY  (id)
                    )";
                    if ($this->conn->query($sql) === TRUE) {
                        $message = "Table users created";
                    } else {
                        $message = "Table users has existed or Query failed: " . $this->conn->error;
                    }
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    // Thêm user
                    $temp_password = md5('12345678');
                    $sql = "INSERT INTO  users(id, username, password, avatar, fullname, sex, birthday, address, phone, email) 
                    VALUES (null, 'user', '$temp_password', 'demo.jpg', 'Nguyen Van A', 'w', '1997-11-01', '123 Đường ABC XYZ, TP JDK', '(555) 555-555-555', 'thisisuser@gmail.com')";
                    $this->conn->query($sql);
                    $sql = "INSERT INTO  users(id, username, password, avatar, fullname, sex, birthday, address, phone, email, position) 
                    VALUES (null, 'admin', '$temp_password', 'demo.jpg', 'Nguyen Van B', 'm', '1997-11-01', '123 Đường ABC XYZ, TP JDK', '(555) 555-555-555', 'thisisadmin@gmail.com', 2)";
                    $this->conn->query($sql);
                    $sql = "INSERT INTO  users(id, username, password, avatar, fullname, sex, birthday, address, phone, email, position) 
                    VALUES (null, 'manager', '$temp_password', 'demo.jpg', 'Nguyen Van C', 'o', '1997-11-01', '123 Đường ABC XYZ, TP JDK', '(555) 555-555-555', 'thisismanager@gmail.com', 1)";
                    $this->conn->query($sql);
                }
            } else {
                $message = "Check table users failed: " . $this->conn->error;
                //echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        
        // Tạo Table for Contents
        public function createTableContents() {
            $sql = "USE $this->dbname";
            if ($this->conn->query($sql) === TRUE) {
                $message = "Using the database successfully.";
            } else {
                $message = "The database usage failed: " . $this->conn->error;
            }
            //echo "<script type='text/javascript'>alert('$message');</script>";
            $sql = "SELECT id FROM contents"; // get id để kiểm tra có tồn tại Table Users hay không
            if ($this->conn->query($sql) === FALSE) {
                if(empty($result)) {
                    $sql = "CREATE TABLE contents (
                            id int(11) NOT NULL AUTO_INCREMENT,
                            title varchar(255) NOT NULL,
                            intro varchar(255),
                            important boolean not null default 0,
                            PRIMARY KEY  (id)
                    )";
                    if ($this->conn->query($sql) === TRUE) {
                        $message = "Table contents created";
                    } else {
                        $message = "Table contents has existed or Query failed: " . $this->conn->error;
                    }
                    //echo "<script type='text/javascript'>alert('$message');</script>";
                    // Thêm contents
                    $intro = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium qui";
                    $sql = "INSERT INTO  contents(id, title, intro, important) VALUES (null, 'Khu Sample ProVinperl Sasa', '$intro', 1)";
                    $this->conn->query($sql);
                    mkdir('./Public/info/contents/1', 0700);
                    $intro = "Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium qui";
                    $sql = "INSERT INTO  contents(id, title, intro, important) VALUES (null, 'Khu Sample ProVinperl Sasa', '$intro', 1)";
                    $this->conn->query($sql);
                    mkdir('./Public/info/contents/2', 0700);
                }
            } else {
                $message = "Check table contents failed: " . $this->conn->error;
                //echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        
        public function connect() {
            //$this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
            $this->conn = new mysqli($this->hostname, $this->username, $this->pass);
            if (!$this->conn) {
                $message = "Connection failed" . $this->conn->connect_error;
                //echo "<script type='text/javascript'>alert('$message');</script>";
                exit;
            }
            else {
                // Lệnh tạo database
                $sql = "CREATE DATABASE $this->dbname CHARACTER SET utf8 COLLATE utf8_general_ci";
                // Thực thi câu truy vấn
                if ($this->conn->query($sql) === TRUE) {
                    $message = "The database created successfully.";
                } else {
                    $message = "The database created failed: " . $this->conn->error;
                }
                //echo "<script type='text/javascript'>alert('$message');</script>";
                $this->createTableUsers();
                $this->createTableContents();
                //$this->createTableAdmins();
            }
            return $this->conn;
        }

        // Thực thi câu lệnh truy vấn :
        public function execute($sql) {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        // Phương thức lấy dữ liệu
        public function getData() {
            if ($this->result) {
                $data = mysqli_fetch_array($this->result);
            }
            else {
                $data = 0;
            }
            return $data;
        }

        // Phương thức lấy toàn bộ dữ liệu
        public function getAllData($table) {
            $sql = "SELECT * FROM $table";
            $this->execute($sql);
            if ($this->num_rows() != 0) {
                while ($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            else {
                $data = 0;
            }
            return $data;
        }

        // Phương thức lấy dữ liệu theo ID
        public function getDataID($table, $id) {
            $sql = "SELECT * FROM $table WHERE id = '$id'";
            $this->execute($sql);
            if ($this->num_rows() != 0) {
                $data = mysqli_fetch_array($this->result);
            }
            else {
                $data = 0;
            }
            return $data;
        }

        // Phương thức thêm số bản ghi
        public function num_rows() {
            if($this->result) {
                $num = mysqli_num_rows($this->result);
            }
            else {
                $num = 0;
            }
            return $num;
        }
        // Phương thức thêm dữ liệu
            //USERS
        public function InsertData($username, $password, $avatar, $fullname, $sex, $birthday, $address, $phone, $email) {
            $sql = "INSERT INTO  users(id, username, password, avatar, fullname, sex, birthday, address, phone, email) VALUES (null, '$username', '$password', '$avatar', '$fullname', '$sex', '$birthday', '$address', '$phone', '$email')";
            return $this->execute($sql);
        }     
            //CONTENTS
        public function InsertDataContents($title, $intro, $important) {
            $sql = "INSERT INTO  contents(id, title, intro, important) VALUES (null, '$title', '$intro', '$important')";
            return $this->execute($sql);
        }  
        // Phương thức sửa dữ liệu User
            //USERS
        public function UpdateData($id, $username, $password, $avatar, $fullname, $sex, $birthday, $address, $phone, $email) {
            $sql = "UPDATE users SET username = '$username', password = '$password', avatar='$avatar', fullname = '$fullname', sex = '$sex', birthday = '$birthday', address = '$address', phone = '$phone', email = '$email'  WHERE id = '$id'";
            return $this->execute($sql);
        }
            //CONTENTS
        public function UpdateDataContents($title, $intro, $important) {
            $sql = "UPDATE contents SET title = '$title', intro = '$intro', important='$important'  WHERE id = '$id'";
            return $this->execute($sql);
        }

        // PhƯơng thức xóa 
        public function Delete($id, $table) {
            $sql = "DELETE FROM $table WHERE id = '$id'";
            return $this->execute($sql);
        }

        // Phương thức tìm kiếm dữ liệu theo từ khóa
        public function SearchData($table, $column, $key) {
            $sql = "SELECT * FROM $table WHERE $column REGEXP '$key' ORDER BY id DESC";
            $this->execute($sql);
            if ($this->num_rows() != 0) {
                while ($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            else {
                $data = 0;
            }
            return $data;
        }

        // Phương thức tìm kiếm nguyên mẫu
        public function SearchPrototype($table, $column, $key) {
            $sql = "SELECT * FROM $table WHERE $column LIKE '$key'";
            $this->execute($sql);
            if ($this->num_rows() != 0) {
                while ($datas = $this->getData()) {
                    $data[] = $datas;
                }
            }
            else {
                $data = 0;
            }
            return $data;
        }
    }


?>