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
require_once('./app/views/partials/header.php');
$isInSession = isset($_SESSION['id']);
?>
<body>
<div id="app">
    <div class="logo">
        <img src="/images/logo.png">
    </div>
    <div class="menu">
        <?php require_once(__DIR__ . (isset($_SESSION['id']) ? '/nav-bar.php' : '/login-panel.php')); ?>
    </div>
    <div class="content">

        <?php if (isset($trees)): ?>
            <script>
                let trees = JSON.parse('<?= json_encode($trees) ?>'),
                    treesImages = JSON.parse('<?= json_encode($treeImages) ?>'),
                    states = Object.values(JSON.parse('<?= json_encode($conditions) ?>')),
                    types = Object.values(JSON.parse('<?= json_encode($types) ?>')),
                    isInSession = '<?= $isInSession ?>' == true,
                    isAdmin = '<?= $isInSession ? $_SESSION['is_admin'] : false ?>' == true;
            </script>
        <?php endif; ?>

        <?php require_once($content); ?>
    </div>

    <?php require_once(__DIR__ . '/footer.php') ?>
</div>
</body>
</html>

