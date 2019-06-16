<?php

/**
 * @var @data
 * @var @content
 * @var @trees
 * @var @treeImages
 * @var @conditions
 * @var @types
 */

?>
<!DOCTYPE html>
<html>
<?php
require_once(__DIR__ .'/header.php');
$isInSession = isset($_SESSION['id']);
?>
<body>
<div id="app">
    <?php require_once (__DIR__ . '/nav-bar.php'); ?>
    <?php if (!isset($_SESSION['id'])): ?>
    <div class="menu-aurh">
        <?php require_once(__DIR__ . '/login-panel.php'); ?>
    </div>
    <?php endif; ?>
    <div class="content">

        <?php if (isset($trees)): ?>
            <script>
                let trees = JSON.parse('<?= json_encode($trees) ?>'),
                    treesImages = JSON.parse('<?= json_encode($treeImages) ?>'),
                    states = JSON.parse('<?= json_encode($conditions) ?>'),
                    types = JSON.parse('<?= json_encode($types) ?>'),
                    isInSession = '<?= $isInSession ?>' == true,
                    isAdmin = '<?= $isInSession ? $_SESSION["is_admin"] : false ?>' == true,
                    userId = '<?= $isInSession ? $_SESSION["id"] : '0' ?>';
            </script>
        <?php endif; ?>

        <?php require_once($content); ?>
    </div>

    <?php require_once(__DIR__ . '/footer.php') ?>
</div>
</body>
</html>

