<?php
$title = 'Tasks JSON';
ob_start();
require 'nav.php';

//$taskJson = get_all_tasks();
?>

<div class="container">
<p><a href = "../">Go Home</a></p>
<h1><?php echo $title ?></h1>
<ul>
<li>
<a> <?php echo json_encode($taskRows); ?> </a>
</li>
</ul>
</div>
 







<?php
 $content = ob_get_clean();
 include 'layout.php'
 ?>

