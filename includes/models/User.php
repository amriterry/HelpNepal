<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/29/2015
 * Time: 10:58 PM
 */

class User extends Model {
    protected $table = "users";
    protected $primaryKey = "user_id";

    public function authCheck($email,$password){
        $sql = "SELECT * FROM {$this->table} WHERE {$this->table}.email = :email AND {$this->table}.password = :password";
        $statement = $this->queryBuilder->run($sql,array('email' => $email,'password' => md5($password)));

        $result = $statement->fetchAll();
        if(count($result) == 1){
            return $result[0]["user_id"];
        } else {
            return false;
        }
    }
}