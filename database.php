<?php

class Database {


    public $host = "localhost";

    public $user = "root";

    public $password = "";

    public $database = "simple_shop";

    public $connection;

    /**
     * Phương thức khởi tạo
     *
     * Database constructor.
     */
    public function __construct()
    {
        $this->connection = $this->connectDatabase();
    }


    /**
     * Phương thức kết nối đến cơ sở dữ liệu
     * @return mysqli
     */
    public function connectDatabase() {
        $connection = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $connection;
    }


    /**
     * Phương thức chạy câu truy vấn SQL
     * @param $sql
     * @return array
     */
    public function runQuery($sql) {
        $data = array();
        $result = mysqli_query($this->connection, $sql);

        while($row = mysqli_fetch_assoc($result)) {

            $data[] = $row;
        }

        return $data;
    }


    /**
     * Phương thức đếm số bản ghi trong câu lệnh query
     * @param $sql
     * @return int
     */
    public function numRows($sql) {
        $result = mysqli_query($this->connection, $sql);
        $count = mysqli_num_rows($result);
        return $count;
    }

}