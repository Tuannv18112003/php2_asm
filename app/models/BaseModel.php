<?php
namespace App\Models;
use PDO;
use PDOException;

class BaseModel {
    protected $conn;
    protected $sqlBuilder;
    protected $tableName;
    public function __construct() 
    {
        try{
            $this->conn = new PDO("mysql:host=localhost; dbname=php2_asm; charset=utf8", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getValue($data = []) {
        if(!empty($data)) {
            $cols = "";
            foreach($data as $value) {
                $cols .= "`$value`, ";
            }
            $cols = rtrim($cols, ", ");
            $this->sqlBuilder = "SELECT $cols FROM $this->tableName";
        }else {
            $this->sqlBuilder = "SELECT * FROM $this->tableName";
        }

        return $this;
    }

    public function getValueJoin($data = []) {
        if(!empty($data)) {
            $cols = "";
            foreach($data as $value) {
                $cols .= "$value, ";
            }
            $cols = rtrim($cols, ", ");
            $this->sqlBuilder = "SELECT $cols FROM $this->tableName";
        }else {
            $this->sqlBuilder = "SELECT * FROM $this->tableName";
        }

        return $this;
    }

    public function insert($data = []) 
    {
        $this->sqlBuilder = "INSERT INTO $this->tableName(";

        $colNames = '';
        $params = '';

        foreach ($data as $key => $value) {
            $colNames .= "`$key`, ";
            $params .= ":$key, ";
        }

        $colNames = rtrim($colNames, ', ');
        $params = rtrim($params, ', ');

        $this->sqlBuilder .= $colNames . ") VALUES(" . $params . ")";
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute($data);
    }

    public function update($data= []) 
    {
        $this->sqlBuilder = "UPDATE $this->tableName SET ";
        foreach ($data as $key => $value) {
            $this->sqlBuilder .= "`$key`=:$key, ";
        }
        $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
        $this->sqlBuilder .= " WHERE id=:id";
        if (isset($this->id)) {
            $data['id'] = $this->id;
            $stmt = $this->conn->prepare($this->sqlBuilder);
            // var_dump($this->sqlBuilder);
            $stmt->execute($data);
            return true;
        }
        return false;
    }

    public function delete($id)
    {
        $this->sqlBuilder = "DELETE FROM $this->tableName WHERE id='$id'";
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
    }

    public function where($col, $cod, $value)
    {
        $this->sqlBuilder .= " WHERE $col $cod '$value'";
        return $this;
    }

    public function andWhere($col, $cod, $value)
    {
        $this->sqlBuilder .= " AND $col $cod '$value'";
        return $this;
    }

    public function orWhere($col, $cod, $value)
    {
        $this->sqlBuilder .= " OR `$col` $cod '$value'";
        return $this;
    }

    public function orderBy($col, $sql)
    {
        $this->sqlBuilder .= " ORDER BY `$col` $sql";
        return $this;
    }

    public function andOrderBy($col, $sql)
    {
        $this->sqlBuilder .= " ,`$col` $sql";
        return $this;
    }

    public function randOrderBy() {
        $this->sqlBuilder .= ' ORDER BY RAND()';
        return $this;
    }

    public function joinTable($table = []) {
        extract($table);
        $tableName1 = $table1[0];
        $tableName2 = $table2[0];
        $id1 = $table1[1];
        $id2 = $table2[1];
        $this->sqlBuilder .= " JOIN `$tableName2` ON $this->tableName.$id1 = `$tableName2`.`$id2`"; 
        // var_dump($this->sqlBuilder);
        return $this;
    }

    public function liMit($num)
    {
        $this->sqlBuilder .= " LIMIT $num";
        return $this;
    }


    public function findAll() {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));
        return $result;
        // var_dump($this->sqlBuilder);
    }

    public function findOne()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        // var_dump($this->sqlBuilder);
        $result = $stmt->fetchAll(PDO::FETCH_CLASS, get_class($this));
        // Nếu có dữ liệu
        if ($result > 0) {
            return $result[0];
        }
        return $this;
    }

}