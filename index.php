<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/29/2015
 * Time: 9:16 PM
 */

require_once("includes/loader.php");

if(isset($_SESSION['user_login'])){
    $feeds = new NewsFeed();
    $feeds = $feeds->getFeeds();
} else {
    header("Location: login.php");
}

?>

<?php
    $title = "News Feed";
    require_once("includes/views/header.view.php");
?>

<!--Each organization news feed post box-->
<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <?php

                if(isset($_SESSION['message'])){
                    echo '<div class="alert alert-danger">'.$_SESSION['message'].'</div>';
                    unset($_SESSION['message']);
                }

            ?>


            <?php
                if($count = count($feeds)):
            ?>
                <div class="well">
                    <?php echo $count; ?> News Feed Posted
                </div>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <tr>
                            <th>Post Title</th>
                            <th>Post Created At</th>
                            <th>Posted By</th>
                            <th>Contact No</th>
                            <th>Actions</th>
                        </tr>
                        <?php

                        foreach($feeds as $feed):

                            ?>
                            <tr>
                                <td><a href="<?php echo basename("/edit.php?Id={$feed->ID}");  ?>"><?php echo $feed->PostTitle; ?></a></td>
                                <td>
                                    <a href="#">
                                        <abbr title="Created At: <?php echo date('l, d M Y, H:i',strtotime($feed->created_at)); ?>">
                                            <?php echo date('d M Y',strtotime($feed->created_at)); ?>
                                        </abbr>
                                    </a>
                                </td>
                                <td>
                                    <span class="icon icon-<?php if($feed->by_goverment){ echo "official"; } else { echo "user"; } ?>"></span>
                                    <?php echo $feed->Name; ?>
                                </td>
                                <td><?php echo $feed->PH_NO; ?></td>
                                <td>
                                    <a href="<?php echo basename("/edit.php?Id={$feed->ID}"); ?>">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="<?php echo basename("/view.php?Id={$feed->ID}"); ?>" target="_blanks">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>


                                    <form action="delete.php" method="POST">
                                        <input type="hidden" name="ID" value="<?php echo $feed->ID; ?>" />
                                        <button type="submit" class="glyphicon glyphicon-trash" value="" />
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            <?php else: ?>

                <div class="alert alert-warning">
                    Empty News Feed!
                </div>

            <?php endif; ?>

        </div>
    </div>
</div>

<?php require_once("includes/views/footer.view.php"); ?>