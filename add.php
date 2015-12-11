<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/29/2015
 * Time: 9:17 PM
 */

require_once("includes/loader.php");

if(!isset($_SESSION['user_login'])){
    header("Location: login.php");
}


if(isset($_SESSION['data'])){
    $data = $_SESSION['data'];
    unset($_SESSION['data']);
} else {
    $data = new stdClass();
    $data->Name = "";
    $data->PH_NO = "";
    $data->PostTitle = "";
    $data->PostDetail = "";
}

if(isset($_SESSION['messages'])){
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
}

?>

<?php

$title = "Add new News Feed";
require_once("includes/views/header.view.php");

$form_action = basename("add.php");

require_once("includes/views/feedform.view.php");

require_once("includes/views/footer.view.php");

?>