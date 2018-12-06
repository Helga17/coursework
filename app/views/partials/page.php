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

<?php require_once ('./app/views/partials/header.php'); ?>

<div class="content">

    <?php if (isset($trees)): ?>
    <script>
        let trees = JSON.parse('<?= json_encode($trees) ?>'),
            treesImages = JSON.parse('<?= json_encode($treeImages) ?>'),
            states = JSON.parse('<?= json_encode($conditions) ?>'),
            types = JSON.parse('<?= json_encode($types) ?>');
    </script>
    <?php endif; ?>

    <?php require_once ($content); ?>
</div>

<?php require_once (__DIR__ . '/footer.php') ?>
</html>

