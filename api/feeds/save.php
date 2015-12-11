<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 10:35 AM
 */
if(isset($_POST['save_feed'])){
    require_once "../../includes/loader.php";

    if(isset($_POST['Id'])){
        $feed = new NewsFeed(get_input("Id"));
    } else {
        $feed = new NewsFeed();
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
        $messages = array("success" => 1,"message" => array("status" => "News Feed Sucessfully posted"));
    } else {
        $messages["message"] = $validator->getMessages();
        $messages["success"] = 0;
        Validator::reset();
    }
} else {
    $messages["message"] = array("status" => "Not enough Data Provided");
    $messages["success"] = 0;
}

echo json_encode($messages);
