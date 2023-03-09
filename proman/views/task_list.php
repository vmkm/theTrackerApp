<?php
require 'common.php';
$title = 'Tasks list';

ob_start();
require 'nav.php';


if (isset($error_message)) {
        echo "<p class='message_error'>$error_message</p>";
}

if (isset($confirm_message)) {
        echo "<p class='message_ok'>$confirm_message</p>";
}
?>
        <div class = "container">
            <p><a href = "../">Go Home</a></p>
        <form action = "../controllers/all_tasks.csv" method = "get">
        <input type="submit" name="export" value="Open CSV">

            <?php
            $data = get_all_tasks();
            $filename = 'all_tasks.csv';

            $f = fopen($filename, "w");

            if ($f === false) {
                    die('Error opening the file ' . $filename);
            }

            foreach ($data as $row) {
                    fputcsv($f, $row);
            }

            fclose($f);

                ?>

                    <h1><?php echo $title . " (" . $taskCount . ")" ?></h1>
                    <!-- If there's not yet data -->

                    <?php if ($taskCount == 0) { ?>
                    <div>
                            <p>You have not yet added any task </p>
                            <p><a href = '../controllers/task_list.php'>Add tasks</a></p>
                    </div>

                    <?php } ?>


                            <ul>
                                <?php foreach ($tasks as $tasks) : ?>
                                <li>

                                <a href="../controllers/task.php?id=<?php echo $tasks['id']; ?>">
                                    <?php echo $tasks["title"].": (Date: ". $tasks["ttime"].", Project: ". $tasks["project"].")"; ?>
                                </a>
                                <form method="post">
                                        <input type="hidden" value="<?php echo $task['id']; ?>" name="delete">
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