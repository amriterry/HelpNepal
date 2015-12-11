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

if(isset($_GET['Id'])){
    //...add feed to the database
    $feed = new NewsFeed();
    $feed = $feed->find(get_input('Id'));
    if(count($feed) == 1){
        $data = $feed;
        if(isset($_SESSION['data'])){
            $data = $_SESSION['data'];
            unset($_SESSION['data']);
        }

        if(isset($_SESSION['messages'])){
            $messages = $_SESSION['messages'];
            unset($_SESSION['messages']);
        }
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

?>

<?php

$title = "Edit News Feed";
require_once("includes/views/header.view.php");


$form_action = basename("edit.php");

require_once("includes/views/feedform.view.php");

require_once("includes/views/footer.view.php");

?>