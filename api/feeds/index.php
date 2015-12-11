<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 10:29 AM
 */

require_once "../../includes/loader.php";

$feeds = new NewsFeed();
$feeds = $feeds->getFeeds();

header("Content-type: application/json; charset=utf-8");
echo json_encode($feeds);