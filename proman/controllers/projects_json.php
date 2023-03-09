<?php

require_once "../model/model.php";


$jsonData = get_all_projects();
$rows = $jsonData->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);

require "../views/projects_json.php";
?>