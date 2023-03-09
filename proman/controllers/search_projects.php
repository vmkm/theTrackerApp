<?php
require_once "../model/model.php";
require "common.php";

$search_term = $_GET['search'] ?? '';
$projects = search_projects($search_term);









include "../views/search_projects.php";
?>