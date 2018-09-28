<?php
/**
 * Created by PhpStorm.
 * User: hasan
 * Date: 27/09/2018
 * Time: 18:34
 */

class Db{
    private $host;
    private $dbuser;
    private $dbpass;
    private $db;
    public $table;
    public $perfix = "ZE_";
    public $encode = "utf8";


    public function __construct($host,$dbuser,$dbpass,$db)
    {
        $this->host = $host;
        $this->dbuser = $dbuser;
        $this->dbpass = $dbpass;
        $this->db = $db;

        $this->connect();
    }

    private function connect()
    {
        return mysqli_connect($this->host,$this->dbuser,$this->dbpass,$this->db) or die("mysql connect error!!!");
    }

    public function create($table,$sql)
    {

    }

    public function insert($columns,$values)
    {
        $columns = is_array($columns) ? implode(",",$columns) : $columns;
        $values = is_array($values) ? implode(",",$values) : $columns;
        return $this->query("INSERT INTO {$this->table}({$columns}) VALUES ({$values})");
    }

    public function query($sql)
    {
        return mysqli_query($this->connect(),$sql);
    }

    /**
     *
     */
    public function __destruct()
    {
        mysqli_close($this->connect());
    }
}
