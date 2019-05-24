<?php
/**
 * @var array $typesLabels
 * @var array $countsData
 */
?>

<div id="histogram"></div>
<script>
    var typesLabels = JSON.parse('<?= json_encode($typesLabels) ?>'),
        countsData = Object.values(JSON.parse('<?= json_encode($countsData) ?>'));
</script>