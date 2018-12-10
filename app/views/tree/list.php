<?php

?>
    <div class = "main">
        <div class = "trees">

            <div class = "tre" v-for = "(tree, index) in trees">
                <div class = "tree-image">
                    <img v-bind:src = "tree.src">
                </div>
                <div>
                    <h4 class = "tree-title">{{tree.title}}</h4>
                    <label>Висота: {{tree.stature}}</label><br>
                    <label>Діаметр: {{tree.diameter}}</label><br>
                    <label>Стан: {{tree.type}}</label><br>
                </div>
            </div>
        </div>
    </div>
