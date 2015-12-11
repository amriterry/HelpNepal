<?php
/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 5/30/2015
 * Time: 1:28 PM
 */

require_once "../../includes/loader.php";

$volunteers = new Volunteer();

header("Content-type: application/json; charset=utf-8");
echo json_encode($volunteers->getVolunteers());