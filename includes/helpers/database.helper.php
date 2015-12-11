<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/29/2015
 * Time: 10:35 PM
 */

try {
    $pdo = new PDO("mysql:host={$db['mysql']['host']};dbname={$db['mysql']['database']}", $db['mysql']['username'], $db['mysql']['password']);
} catch (PDOException $e){
    throw_error("Unable to connect to the database server");
}