<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 12:04 AM
 */

class VolunteerSearch extends Model{

    protected $primaryKey = "ID";
    protected $table = "volunteers_search";
    protected $timestamps = true;

    public function getVolunteerSearch(){
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->table}.created_at DESC";
        $stmt = $this->queryBuilder->run($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}