<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 12:03 AM
 */

class Volunteer extends Model{

    protected $primaryKey = "ID";
    protected $table = "volunteers";
    protected $timestamps = true;

    public function getVolunteers(){
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->table}.created_at DESC";
        $stmt = $this->queryBuilder->run($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}