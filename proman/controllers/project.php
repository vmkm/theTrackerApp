<?php
require_once "../model/model.php";
require "common.php";


$project_title = '';
$category = '';




if (isset($_GET['id'])) {
    list($id, $title, $category) = get_project($_GET['id']);
}

if (isset($_POST['submit'])) {
   $id = null;

   if (isset($_POST['id'])) {
       $id = $_POST['id'];
   }
  
   
   $title = escape(trim($_POST['title']));
    $category = escape($_POST['category']);
    
    

            if (empty($title) || empty($category)) {
                $error_message = "Title or category empty";

            } else {
                if (titleExists("projects", $title) && $id == null) {
                    $error_message = "I'm sorry, but looks like \"" . $title . "\" already exists";
                
                } else {
                if (add_project($title, $category, $id)) {
                    header('Refresh:4; url=project_list.php');
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
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if(isset($_POST["submit"])) {
    $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is ok - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not valid.";
        $uploadOk = 0;
      }
    }
    
    
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    
    if ($_FILES["fileToUpload"]["size"] > 500000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    
    if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
    && $fileType != "gif" && $fileType != "txt" && $fileType != "csv" ) {
      echo "Sorry, only JPG, JPEG, PNG, GIF, TXT and CSV files are allowed.";
      $uploadOk = 0;
    }
    
    
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    
    } else {
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

 
    





require "../views/project.php";
?>