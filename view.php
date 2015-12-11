<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 2:46 AM
 */

require_once("includes/loader.php");

if(!isset($_GET['Id'])){
    header("Location: index.php");
}

$feed = new NewsFeed(get_input('Id'));

if($feed->count() != 1){
    header("Location: index.php");
}

$title = $feed->PostTitle;
require_once("includes/views/header.view.php");

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <span class="text-info"><b>Feed Title:</b></span>
                <span><?php echo $feed->PostTitle; ?></span>
            </p>
            <p>
                <span class="text-info"><b>Posted By:</b></span>
                <span><?php echo $feed->Name; ?></span>
            </p>
            <p>
                <span class="text-info"><b>Posted Date:</b></span>
                <span><?php echo date("Y-m-d h:i:s",strtotime($feed->created_at)); ?></span>
            </p>

            <p>
                <span class="text-info"><b>Feed Detail:</b></span>
                <p><?php echo $feed->PostDetail; ?></p>
            </p>

            <p>
                <a href="<?php echo basename("edit.php?Id=".$feed->ID); ?>" class="btn btn-warning">Edit?</a>
            </p>
        </div>
    </div>
</div>

<?php


require_once("includes/views/footer.view.php");

?>