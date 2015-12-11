<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/29/2015
 * Time: 10:29 PM
 */

class NewsFeed extends Model{

    protected $primaryKey = "ID";
    protected $table = "newsfeed";
    protected $timestamps = true;

    public function getFeeds($offset = 0,$limit = 20){
        $sql = "SELECT * FROM {$this->table} ORDER BY {$this->table}.created_at DESC";
        $stmt = $this->queryBuilder->run($sql);

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}