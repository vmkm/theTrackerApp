<?php
require_once "../model/model.php";
require "common.php";

$id = '';
$title = '';
$date_task = '';
$time_task = '';
$project_id = '';


if(isset($_GET['id'])) {
    list($id, $title, $date_task, $time_task, $project_id) = get_task($_GET['id']);
}

$projects = get_all_projects();

if (isset($_POST['submit'])) {
    $id = null;

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
  
    $id = trim($_POST['id']);
    $title = trim($_POST['title']);
    $date_task = trim($_POST['date_task']);
    $time_task = trim($_POST['time_task']);
    $project_id = trim($_POST['project_id']);
   

            if (empty($title) || empty($date_task) || empty($time_task)) {
                $error_message = "One or more fields empty";

            } else {
                if (titleExists("tasks", $title) && $id == null) {
                    $error_message = "I'm sorry, but looks like " . escape($title) . " already exists";
                
                } else {
               if (add_task($id, $title, $date_task, $time_task, $project_id)) {
                header('Refresh:4; url=task_list.php');
                if (!empty($id)) {
                $confirm_message = escape($title) . ' updated successfully';
                } else {
                    $confirm_message = escape($title) . ' added successfully';
                }
            } else {
                $error_message = "There's something wrong'";
            }
            }
        }
}


require "../views/task.php";
?>
