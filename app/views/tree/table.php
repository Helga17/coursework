<?php
?>

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
            <td>{{types[tree.type]}}</td>
            <td>{{tree.stature}}</td>
            <td>{{tree.diameter}}</td>
            <td>{{states[tree.state]}}</td>
            <td>{{tree.lat}}</td>
            <td>{{tree.lng}}</td>
            <!--вывод картинок с массива-->
            <td>
                <div class="photoTree">
                    <img v-bind:src="'/images/' + treesImages[tree.state]" class="imgTree">
                </div>
            </td>
        </tr>
    </table>
