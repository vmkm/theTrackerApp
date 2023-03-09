<?php
$title = 'Search Projects';

ob_start();
require 'nav.php';

?>
<div class="container">
<p><a href = "../">Go Home</a></p>
    <h1><?php echo $title ?></h1>

<form action="search_projects.php" method = "get">
    <label for="search">Search Projects:</label>
    <input type = "text" name = "search" id="search" 
    value="<?php echo htmlspecialchars($search_term, ENT_QUOTES); ?>">
    <button type="submit">Search</button>
</form>
<ul>
    <?php foreach ($projects as $project): ?>
        <li>
        <a href="../controllers/project.php?id=<?php echo $project['title']; ?>">
        <?php echo escape ($project["title"]) ?>
        </li>
        <?php endforeach; ?>
    </ul>

</div>

<?php
$content = ob_get_clean();
include 'layout.php';
?>
