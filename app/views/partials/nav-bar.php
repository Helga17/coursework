<?php
    $navBarElements = [
        ['title' => 'Головна', 'link' => '/'],
        ['title' => 'Данні', 'link' => '/data'],
        ['title' => 'Таблиця', 'link' => '/table'],
        ['title' => 'Графік', 'link' => '/graph'],
    ];
    $thisLink =$_SERVER['REQUEST_URI'];
?>

<div class="nav-bar">
<!--    <style>-->
<!--        .this-link a{-->
<!--            color: red !important;-->
<!--        }-->
<!--        a {-->
<!--            text-decoration: none;-->
<!--        }-->
<!--    </style>-->
    <?php foreach ($navBarElements as $element): ?>
        <div class="nav-bar-element<?= $thisLink === $element['link'] ? ' this-link' : ''?>">
            <a href="<?= $element['link'] ?>"><?= $element['title'] ?></a>
        </div>
    <?php endforeach; ?>
</div>
