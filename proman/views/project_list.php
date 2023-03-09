<?php
require "common.php";
$title = 'Projects list';

ob_start();
require 'nav.php';


if (isset($error_message)) {
        echo "<p class='message_error'>$error_message</p>";
}

if (isset($confirm_message)) {
        echo "<p class='message_ok>$confrim_message</p>";
}
?>

        <div class = "container">
            <p><a href = "../">Go Home</a></p>

            <form action = "../controllers/all_projects.csv" method = "get">
                    <input type="submit" name="export" value="Open CSV">
                </form>
                <?php
                $data = get_all_projects();
                $filename = 'all_projects.csv';

                $f = fopen($filename, 'w');

                if ( $f === false) {
                        die('Error opening the file ' . $filename);
                }

                foreach ( $data as $row) {
                        fputcsv($f, $row);
                }

                fclose($f);

                ?>

            

                
                
                

                    <h1><?php echo $title . " (" . $projectCount . ")" ?></h1>
                    <!-- If there's not yet data -->

                    <?php if ($projectCount == 0) { ?>
                    <div>
                            <p>You have not yet added any project </p>
                            <p><a href = '../controllers/project.php'>Add project</a></p>
                    </div>

                    <?php } ?>
                               
                            <ul>
                                <?php foreach ($projects as $project) : ?>
                                <li>
                                        <a href="../controllers/project.php?id=<?php echo $project['id']; ?>">
                                    <?php echo escape ($project["title"]) ?>
                                </a>
                                <form method="post">
                                <input type="hidden" value="<?php echo $project["id"]; ?>" name="delete">
                                <input type="submit" value="Delete">
                                </form>
                                
                        
                                </li>
                                <?php endforeach; ?>
                                </ul>
                                </div>
                    
                <?php
                $content = ob_get_clean();
                include 'layout.php'
                ?>