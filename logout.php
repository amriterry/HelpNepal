<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 2:32 AM
 */

require_once("includes/loader.php");

session_destroy();

header("Location: login.php");