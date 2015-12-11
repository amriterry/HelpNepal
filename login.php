<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/29/2015
 * Time: 10:16 PM
 */

require_once("includes/loader.php");

if(isset($_SESSION['user_login'])){
    #...logged in
    header("Location: index.php");
}

if(isset($_SESSION['data'])){
    $data = $_SESSION['data'];
    unset($_SESSION['data']);
}

if(isset($_SESSION['messages'])){
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
}

?>

<?php

$title = "Login";
require_once("includes/views/header.view.php");

?>

<div class="container">
    <div class="row">
        <div class="form-container">
            <form action="logintest.php" method="post" name="user_login">
                <h3 class="text-center">Help Nepal :: Login</h3>
                <?php require_once "includes/views/messagebag.view.php"; ?>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?php if(isset($data)){ echo $data->email; } ?>"/>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>

                <div class="form-group">
                    <input type="submit" name="login" class="btn btn-primary form-control" value="Login"/>
                </div>
            </form>
        </div>
    </div>
</div>


<?php

require_once("includes/views/footer.view.php");

?>