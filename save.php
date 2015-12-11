<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 9:25 AM
 */

require_once("includes/loader.php");

if(isset($_POST['submit_feed'])){
    #...add feed to db

    $feed = new NewsFeed();

    if(isset($_POST['Id'])){
        $feed = $feed->find(get_input("Id"));
    } else {
        $feed->by_goverment = 1;
    }

    $validator = new Validator();
    $rules = array(
        "Name" => "required",
        "PH_NO" => "required|numeric",
        "PostTitle" => "required",
        "PostDetail" => "required"
    );

    $validator->run($rules);

    if(!$validator->fails()){
        $feed->Name = get_input("Name");
        $feed->PH_NO = get_input("PH_NO");
        $feed->PostTitle = get_input("PostTitle");
        $feed->PostDetail = get_input("PostDetail");
        $feed->save();
        $messages = array("success" => "News Feed Succesfully saved");
    } else {
        $messages = $validator->getMessages();
        $data = input_old();
        Validator::reset();
    }

    $_SESSION['messages'] = $messages;
    $_SESSION['data'] = $data;

    header("Location: ".$_SERVER['HTTP_REFERER']);
} else {
    header("Location: index.php");
}