<?php

?>
    <div class = "main">
        <div class = "trees">

            <div class = "tre" v-for = "(tree, index) in trees">
                <div class = "photoTree">
                    <img v-bind:src = "'/images/' + treesImages[tree.state]" class="imgTree">
                </div>
                <div>
                    <h4 class = "tree-title">{{types[tree.type]}}</h4>
                    <label>Висота: {{tree.stature}}</label><br>
                    <label>Діаметр: {{tree.diameter}}</label><br>
                    <label>Стан: {{states[tree.state]}}</label><br>
                </div>
            </div>
        </div>
    </div>
