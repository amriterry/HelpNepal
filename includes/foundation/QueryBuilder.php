<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/29/2015
 * Time: 11:33 PM
 */

class QueryBuilder {
    protected $PDO;

    public function __construct(){
        global $pdo;
        $this->PDO = $pdo;
    }

    public function run($sql,$data = array()){
        try{
            $statement = $this->PDO->prepare($sql);

            if(count($data)){
                foreach($data as $key => $value){
                    if(is_int($value)){
                        $statement->bindValue(":".$key,$value,PDO::PARAM_INT);
                    } else if(is_bool($value)){
                        $statement->bindValue(":".$key,$value,PDO::PARAM_BOOL);
                    } else if(is_null($value)){
                        $statement->bindValue(":".$key,$value,PDO::PARAM_NULL);
                    } else if(is_string($value)){
                        $statement->bindValue(":".$key,$value);
                    }
                }
            }

            $statement->execute();

            return $statement;
        } catch(PDOException $e){
            throw_error("Query Error: ".$e->getMessage());
        }
    }

    public function getPDO(){
        return $this->PDO;
    }

}