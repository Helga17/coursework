<?php
/**
 * @var $trees
 */
?>
<div class="tree-form" v-bind:style="{zIndex: (hiddenWindow) ? 0 : 9999}">

    <div class="move-panel"></div>

<!--    <div class="block">-->
<!--        <div class="label">Image</div>-->
<!--        <div class="add-file-button">-->
<!--            <button class="btn">Upload a file</button>-->
<!--            <input type="file" name="myfile" />-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="block">-->
<!--        <img src="" alt="">-->
<!--    </div>-->
    <div class="block">
        <div class="label">Type</div>
        <select v-model="changedTree.type" v-bind:disabled="isDisabled">
            <option v-for="(type, index) in types" v-bind:value="index">{{ type }}</option>
        </select>
    </div>
    <div class="block">
        <div class="label">State</div>
            <select v-model="changedTree.state" v-bind:disabled="isDisabled">
                <option v-for="(state, index) in states" v-bind:value="index">{{ state }}</option>
            </select>
    </div>
    <div class="block">
        <div class="label">Stature</div>
        <input type="number" v-model="changedTree.stature" v-bind:disabled="isDisabled">
    </div>
    <div class="block">
        <div class="label">Diameter</div>
        <input type="number" v-model="changedTree.diameter" v-bind:disabled="isDisabled">
    </div>
    <div class="block">
        <div class="label">Lat</div>
        <input type="number" v-model="changedTree.lat" v-bind:disabled="isDisabled">
    </div>
    <div class="block">
        <div class="label">Lng</div>
        <input type="number" v-model="changedTree.lng" v-bind:disabled="isDisabled">
    </div>

    <?php if ($isInSession && $_SESSION['is_admin']): ?>
        <div class="block">
            <button class="btn btn-save" v-on:click="saveData()">Save</button>
        </div>
        <div class="block">
            <button class="btn btn-remove" v-on:click="removeData()">Remove</button>
        </div>
    <?php else: ?>
        <div class="block"></div>
        <div class="block"></div>
    <?php endif; ?>
    <div class="block">
        <button class="btn btn-cancel" v-on:click="hideWindow()">Cancel</button>
    </div>
</div>

<?php if ($isInSession && $_SESSION['is_admin']): ?>
<div class="datatTable">
    <a href="/table"><i class="fa fa-table" aria-hidden="true" title="перегляд у вигляді таблиці"></i></a>
</div>

<div class="elements">
    <a type="button" v-on:click="openWindowForCreating()"><i class="fa fa-plus" aria-hidden="true"></i></a>
</div>
<?php endif; ?>

<!--фильтрация-->
<div class="filters">
    <a v-on:click="showFilters = !showFilters"><span class="glyphicon glyphicon-filter" title="фільтрація"></span></a><br>
    <div id = "filterTrees" v-bind:hidden="showFilters">
        <div class="filter-param" v-for="(state, index) in states">
            <input type="checkbox" v-bind:value="index" v-model="search" v-bind:id="'state' + index">
            <label v-bind:for="'state' + index">{{ state }}</label>
        </div>
    </div>
</div>

<div id="map" v-bind:style="mapStyle">{{filteredItems}}</div>