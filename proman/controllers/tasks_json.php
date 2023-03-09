<?php
require_once "../model/model.php";

$taskData = get_all_tasks();
$taskRows = $taskData->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($taskRows);

require "../views/tasks_json.php";
?>