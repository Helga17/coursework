<?php
/**
 * @var $trees
 */
?>

<style>
    @import url('https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900,900i');

    .tree-form {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        grid-gap: 20px;
        max-width: 500px;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 15px;
        padding: 30px 15px 15px;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 20px;
        letter-spacing: 2px;
        border: 2px solid black;
        font-family: "Playfair Display";
        z-index: 9999;
    }

    .block:nth-child(even) {
        grid-column: 1/4;
    }

    .block:nth-child(odd) {
        grid-column: 4/7;
    }

    .block:nth-last-child(-n+3) {
        grid-column: 1/3;
    }

    .block:nth-last-child(-n+2) {
        grid-column: 3/5;
    }

    .block:nth-last-child(-n+1) {
        grid-column: 5/7;
    }

    .move-panel {
        position: absolute;
        width: 100%;
        height: 20px;
        background-color: black;
        border-radius: 10px 10px 0 0;
        cursor: move;
    }

    .btn, input, select {
        border: 2px solid gray;
        color: gray;
        background-color: white;
        padding: 4px 20px;
        border-radius: 8px;
        font-size: 20px;
        font-weight: bold;
        width: 100%;
        margin: 5px 0;
    }

    .add-file-button {
        position: relative;
    }

    input[type=file] {
        font-size: 20px;
        position: absolute;
        left: 0;
        top: 0;
        opacity: 0;
    }

    input[type=number] {
        width: calc(100% - 44px) !important;
    }

    .btn-save {
        background-color: #ff6efb;
    }

    .btn-remove {
        background-color: #fd5050;
    }

    .btn-cancel {
        background-color: #85ff84;
    }
</style>

    <div id="app">

        <div class="tree-form" v-bind:hidden="hiddenWindow">

            <div class="move-panel"></div>

            <div class="block">
                <div class="label">Image</div>
                <div class="add-file-button">
                    <button class="btn">Upload a file</button>
                    <input type="file" name="myfile" />
                </div>
            </div>
            <div class="block">
                <img src="" alt="">
            </div>
            <div class="block">
                <div class="label">Type</div>
                <select v-model="changedTree.type">
                    <option v-for="(type, index) in types" v-bind:value="index">{{ type }}</option>
                </select>
            </div>
            <div class="block">
                <div class="label">State</div>
                    <select v-model="changedTree.state">
                        <option v-for="(state, index) in states" v-bind:value="index">{{ state }}</option>
                    </select>
            </div>
            <div class="block">
                <div class="label">Stature</div>
                <input type="number" v-model="changedTree.stature">
            </div>
            <div class="block">
                <div class="label">Diameter</div>
                <input type="number" v-model="changedTree.diameter">
            </div>
            <div class="block">
                <div class="label">Lat</div>
                <input type="number" v-model="changedTree.lat">
            </div>
            <div class="block">
                <div class="label">Lng</div>
                <input type="number" v-model="changedTree.lng">
            </div>

            <div class="block">
                <button class="btn btn-save" v-on:click="saveData()">Save</button>
            </div>
            <div class="block">
                <button class="btn btn-remove" v-on:click="removeData()">Remove</button>
            </div>
            <div class="block">
                <button class="btn btn-cancel" v-on:click="hideWindow()">Cancel</button>
            </div>
        </div>

        <div class="datatTable">
            <a href="/table"><i class="fa fa-table" aria-hidden="true" title="перегляд у вигляді таблиці"></i></a>
        </div>

        <div class="elements">
            <a type="button" v-on:click="openWindowForCreating()"><i class="fa fa-plus" aria-hidden="true"></i></a>
            <a type="button" v-on:click="editing(tree.id)" class = "edit_marker"><i class="fa fa-pencil" aria-hidden="true"></i></a>
            <a type="button" v-on:click="deleteTree(tree.id, index)" class = "delete_marker"><i class="fa fa-times" aria-hidden="true"></i></a>
        </div>

        <!--просмотр информации-->
<!--        <div class="details" v-bind:hidden="jumper">
            <div class="photoTree">
                <img v-bind:src="treesImages[detailStateTrees]">
                <hr>
                <div class="infoTree">
                    <p>Назва <input type="text" v-model="detailItemTrees" disabled></p>
                    <p>Висота <input type="text" v-model="detailStatureTrees" disabled></p>
                    <p>Діаметр <input type="text" v-model="detailDiameterTrees" disabled></p>
                    <p>Стан <input type="text" v-model="detailStateTrees" disabled></p>
                    <p>Широта <input type="text" v-model="detailLatTrees" disabled></p>
                    <p>Довгота <input type="text" v-model="detailLngTrees" disabled></p>
                </div>
            </div>
            <a><i class="fa fa-hand-o-left" aria-hidden="true" v-on:click="back()"></i></a>
        </div>-->

        <!--фильтрация-->
        <div class="filters" v-on:click="showFilters = !showFilters">
            <a href="#"><span class="glyphicon glyphicon-filter" title="фільтрація"></span></a><br>
            <div id = "filterTrees" v-bind:hidden="showFilters">
                <input type = "checkbox" id = "normalState" value = "Нормальне" v-model = "search">Нормальне<br>
                <input type = "checkbox" id = "goodbadState" value = "Напівсухе" v-model = "search">Напівсухе<br>
                <input type = "checkbox" id = "badState" value = "Сухе" v-model = "search">Сухе<br>
                <div class = "filterTrees" v-for = "(item, index) in filteredItems"></div>
            </div>
        </div>

        <div id="map"></div>
    </div>
    </div>

</body>
