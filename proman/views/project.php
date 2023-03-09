<?php
if (!empty($_GET['id'])) {
 $title = 'Update project';
} else {
$title = 'Add Project';
}



    ob_start();
    require "nav.php";
?>


<div class="container">

    <h1><?php echo $title ?></h1>

    <?php
    if (isset($error_message)) {
        echo "<p class='message_error'>$error_message</p>";
    }

            if (isset($confirm_message)) {
                echo "<p class='message_ok'>$confirm_message</p>";
            }
            ?>
                
           

            <div class = "container">
            <p><a href = "../">Go Home</a></p>
            

                <form method="post" enctype="multipart/form-data">
                    <label for="title">
                        <span>Title:</span>
                        <strong><abbr title="required">*</abbr></strong>
                    </label>

                    <input type="text" placeholder="New project" name="title" id="title" 
                    value="<?php echo $title; ?>" required>
                    <label for="category">
                        <span>Category:</span>
                        <strong><abbr title="required">*</abbr></strong>
                </label>

                        <select name="category" id="category" required>
                            <option value="">Select a category</option>
                            <option value="Professional"
                            <?php if ($category == "Professional") {echo ' selected';} ?>>Professional</option>
                            <option value="Personal"
                            <?php if ($category == "Personal") {echo ' selected';} ?>
                            >Personal</option>
                            <option value="School"
                            <?php if ($category == "School") {echo ' selected';} ?>
                            >School</option>
                        </select>
                        <?php if(!empty($id)) { ?>
                            <input type="hidden" name="id" value="<?php echo $id ?>" />
                            <?php } ?>

                            <label for="fileToUpload"> Add Image:</label>
                            <input type="file" name="fileToUpload" id="fileToUpload"> 
                            
                            
                           
                        

                        <input type="submit" name="submit" 
                        value="<?php echo (isset($id) and (!empty($id))) ? "Update" : "Add"; ?>">

                        
                </form>
               

        </div>


        <?php
        $content = ob_get_clean();
        include 'layout.php';
        ?>
                