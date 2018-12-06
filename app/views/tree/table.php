<?php
?>

<div id="app">
    <table class="customTable">
        <tr>
            <th>Назва</th>
            <th>Висота</th>
            <th>Діаметр</th>
            <th>Стан</th>
            <th>Широта</th>
            <th>Довгота</th>
            <th>Фото</th>
        </tr>
        <!--вывод данных с массива-->
        <tr v-for="(tree, index) in trees">
            <td>{{tree.title}}</td>
            <td>{{tree.stature}}</td>
            <td>{{tree.diameter}}</td>
            <td>{{tree.type}}</td>
            <td>{{tree.lat}}</td>
            <td>{{tree.lng}}</td>
            <!--вывод картинок с массива-->
            <td>
                <div class="photoTree">
                    <img v-bind:src="treesImages[tree.type]" class="imgTree">
                </div>
            </td>
        </tr>
    </table>
</div>
