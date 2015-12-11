<div class="container">
    <div class="row">
        <div class="col-lg-12">

            <?php require_once("messagebag.view.php"); ?>

            <form action="save.php" method="POST" class="form-horizontal" role="form">
                <div class="form-group">
                    <legend>News Feed Post</legend>
                </div>

                <?php
                    if(isset($_GET['Id'])){
                        echo '<input type="hidden" name="Id" value="'.get_input('Id').'" />';
                    }
                ?>

                <div class="form-group ">
                    <label for="name">Organization Name:</label>
                    <input type="text" name="Name" class="form-control" value="<?php echo $data->Name; ?>" placeholder="Organization Name">
                </div>

                <div class="form-group">
                    <label for="ph_no">Phone Number:</label>
                    <input type="text" name="PH_NO" class="form-control" value="<?php echo $data->PH_NO; ?>" placeholder="Enter your phone number"/>
                </div>

                <div class="form-group">
                    <label for="posttitle">News Feed Title:</label>
                    <input type="text" name="PostTitle" class="form-control" value="<?php echo $data->PostTitle; ?>"  placeholder="News Title">
                </div>

                <div class="form-group">
                    <label for="posttitle">News Feed Details:</label>
                    <textarea name="PostDetail" class="form-control" rows="3" placeholder="News Details"><?php echo $data->PostDetail; ?></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" name="submit_feed" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>