<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 7:46 AM
 */

function get_input($key){
    if(isset($_POST[$key])){
        return cleanify($_POST[$key]);
    } else if(isset($_GET[$key])){
        return cleanify($_GET[$key]);
    }
    return null;
}

function input_old(){
    $data = new stdClass();
    foreach($_POST as $key=>$value){
        $data->{$key} = $value;
        unset($_POST[$key]);
    }
    return $data;
}

function cleanInput($input) {

    $search = array(
        '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
        '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
        '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );

    $output = preg_replace($search, '', $input);
    return $output;
}

function cleanify($input){
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = cleanify($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}