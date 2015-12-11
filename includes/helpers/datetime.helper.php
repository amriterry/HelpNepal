<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 9:57 AM
 */

function getCurrentDateTime(){
    global $timezone;
    try{
        $now = new DateTime("now",new DateTimeZone($timezone['timezone']));
    } catch (Exception $e){
        throw_error($e->getMessage());
    }

    return $now->format("Y-m-d H:i:s");
}