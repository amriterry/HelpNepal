<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 2:45 AM
 */
require_once("includes/loader.php");

if(isset($_SESSION['user_login']) && isset($_POST['ID'])){
    $feed = new NewsFeed();
    $feed->ID = $_POST['ID'];
    if($feed->delete() != false){
        $_SESSION['message'] = "Feed Successfully Deleted";
    } else {
        $_SESSION['message'] = "Could not delete the feed";
    }
}

header("Location: index.php");