<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/29/2015
 * Time: 11:27 PM
 */

class Model implements Countable{

    protected $queryBuilder;

    private $data = array();

    public function __construct($pk = null){
        $this->queryBuilder = new QueryBuilder();

        if(!is_null($pk)){
            $this->find($pk);
        }
    }

    public function all(){
        $sql = "SELECT * FROM {$this->table} ";
        $statement = $this->queryBuilder->run($sql);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function find($primaryKey){
        $sql = "SELECT * FROM {$this->table} WHERE {$this->table}.{$this->primaryKey} = :primaryKey";
        $statement = $this->queryBuilder->run($sql,array("primaryKey" => $primaryKey));
        $this->setData($statement->fetch(PDO::FETCH_ASSOC));
        return $this;
    }

    public function insert(){
        $sql = "INSERT INTO {$this->table} ";
        $keys = array_keys($this->data);

        if(!is_null($this->timestamps) && $this->timestamps != false){
            array_push($keys,"created_at");
            $this->data["created_at"] = getCurrentDateTime();
        }

        $sql .= "(".join(",",$keys).") VALUES (:".join(",:",$keys).")";

        return $this->queryBuilder->run($sql,$this->data);
    }

    public function update(){
        $pk = $this->data[$this->primaryKey];
        unset($this->data[$this->primaryKey]);

        $sql = "UPDATE {$this->table} SET ";

        $pair = array();
        foreach($this->data as $key => $value){
            array_push($pair,"{$key} = :{$key}");
        }

        $sql .= join(",",$pair)." WHERE {$this->table}.{$this->primaryKey} = ".$pk;

        echo $sql;

        return $this->queryBuilder->run($sql,$this->data);
    }

    public function save(){
        if(array_key_exists($this->primaryKey,$this->data)){
            $this->update();
        } else {
            $this->insert();
        }
    }

    public function delete(){
        if(array_key_exists($this->primaryKey,$this->data)){
            $pk = $this->data[$this->primaryKey];
            $sql = "DELETE FROM {$this->table} WHERE {$this->table}.{$this->primaryKey} = :{$this->primaryKey}";

            return $this->queryBuilder->run($sql,array($this->primaryKey => $pk));
        }
        return false;
    }

    public function __set($key,$value){
        if(isset($this->{$key})){
            $this->{$key} = $value;
        } else {
            $this->data[$key] = $value;
        }

    }

    public function __get($key){
        if(isset($this->data[$key])){
            return $this->data[$key];
        } else if(isset($this->{$key})){
            return $this->{$key};
        } else {
            return null;
        }
    }

    protected function setData($data){
        if(is_array($data)){
            foreach($data as $key => $value){
                $this->{$key} = $value;
            }
        }
    }

    public function count(){
        if(empty($this->data)){
            return 0;
        } else {
            return 1;
        }
    }

}