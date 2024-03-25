<?php
namespace App\Models;
// Không dùng use sẽ viết là: \PDO
use PDO;

class BaseModel {
    protected $conn;
    protected $sqlBuilder = "";
    protected $tableName;
    protected $joins = [];
    protected $columns = [];
    


    public function __construct()
    {
        $host = HOSTNAME;
        $dbname = DBNAME;
        $username = USERNAME;
        $password = PASSWORD;
        try {
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username,$password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e){
            echo "Error Connect:" . $e->getMessage();
        }
    }
    // Phương thức lấy toàn bộ dữ liệu của bảng
    public static function all() {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        // Chuan bi
        $stmt = $model->conn->prepare($model->sqlBuilder);
        // Thuc thi
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }
    // Phương thức find: tìm dữ liệu theo id
    public static function find($id) {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName where id =:id";
        // Chuan bi
        $stmt = $model->conn->prepare($model->sqlBuilder);
        // Thuc thi
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if($result) {
            // làm gọn lại mảng khi lấy
            return $result[0];
        }
        return $result;
    }
    /** 
    *Xử lý câu lệnh có điều kiện
    *$column là tên cột
    *$codition là điều kiện (>,<,=,...)
    *$value là giá trị
    */
    // Note: Dấu `` chỉ dùng với cột

    public static function where($column, $codition, $value) {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName where `$column` $codition '$value'";
        return $model;
    }
    // Thêm điều kiện and và or cho hàm trên
    public function andWhere($column, $codition, $value) {
        // Chu y dau cach truoc chu AND
        $this->sqlBuilder .= " AND `$column` $codition '$value' ";
        return $this;
    }
    public function orWhere($column, $codition, $value) {
        $this->sqlBuilder .= " OR `$column` $codition '$value' ";
        return $this;
    }
    // Nối chuỗi where =
    public function whereEqual($column, $value) {
        $this->sqlBuilder .=  " WHERE `$column` = `$value`";
        return $this;
    }
    public function limit($limit) {
        $this->sqlBuilder .=  " LIMIT $limit";
        return $this;
    }

    // Thực thi câu lệnh điều kiện
    public function get() {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class()); 
    }
    
    // delete
    public static function delete($id) {
        // static không trỏ luôn $this được
        $model = new static;
        $model->sqlBuilder = "DELETE from $model->tableName where id=:id";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute(['id' => $id]);
    }
    // insert
    public function insert($data) {
        $this->sqlBuilder = "INSERT INTO $this->tableName(";
        // Lưu lại value
        $values = " VALUES(";
        // lặp để lấy key(tên cột của bảng) của data
        foreach($data as $column => $value) {
            $this->sqlBuilder .= "`$column`, ";
            $values .= ":$column, ";
        }
        // Đi xóa dấu ", " ở bên phải của chuỗi
        $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
        $values = rtrim($values, ", ");
        // Nối chuỗi sql với values
        $this->sqlBuilder .= ") ". $values.")";
        // Thực hiện câu lệnh
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute($data);
        // Trả lại cái id mới thêm vào
        return $this->conn->lastInsertId();
    }
    // update
    /**@$id: giá trị của khóa chính
     * @$data: mảng dữ liệu cần cập nhật, phải được thiết kế có key và value
     * key phải là tên cột
     */
    public function update($id, $data) {
        $this->sqlBuilder = "UPDATE $this->tableName set ";
        foreach($data as $column => $value) {
            $this->sqlBuilder .= "`{$column}`=:$column, ";
        }
        // Đi xóa dấu ", " ở bên phải của chuỗi
        $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
        // Nối câu lệnh điều kiện
        $this->sqlBuilder .= " WHERE id=:id";
        $stmt = $this->conn->prepare($this->sqlBuilder);
        // Đưa id vào trong mảng data
        $data['id'] = $id;
        return $stmt->execute($data);
    }
    // Update 1 cột trong bảng
    public function updateColumn($id, $columnName, $columnValue) {
        $this->sqlBuilder = "UPDATE $this->tableName SET `$columnName` = :value WHERE id = :id";
        $stmt = $this->conn->prepare($this->sqlBuilder);
        
        $params = [
            'id' => $id,
            'value' => $columnValue,
        ];

        return $stmt->execute($params);
    }
    // Select
    public function select(...$columns) {
        $this->columns = $columns;
        $this->sqlBuilder = "SELECT " . implode(', ', $columns) . " FROM $this->tableName";
        return $this;
    }
    
    
    // Phương thức join
    public function join($joins) {
        $this->joins = array_merge($this->joins, $joins);
        return $this;
    }
    
    // Sắp xếp asc
    public function orderBy($column, $direction) {
        if (stripos($this->sqlBuilder, 'ORDER BY') !== false) {
            $this->sqlBuilder .= ", $column $direction";
        } else {
            $this->sqlBuilder .= " ORDER BY $column $direction";
        }
        return $this;
    }
    
    public function getJoin() {
        $columns = implode(', ', $this->columns);
        $this->sqlBuilder = "SELECT $columns FROM $this->tableName " . implode(" ", $this->joins);
        
        // Kiểm tra xem đã có điều kiện ORDER BY chưa
        if (stripos($this->sqlBuilder, 'ORDER BY') === false) {
            $this->sqlBuilder .= " ORDER BY id DESC";
        }
    
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, get_called_class());
    }
    
    
    
}