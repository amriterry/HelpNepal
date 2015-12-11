<?php

require_once "../../includes/loader.php";

$volunteerSearch = new VolunteerSearch();

header("Content-type: application/json; charset=utf-8");
echo json_encode($volunteerSearch->getVolunteerSearch());