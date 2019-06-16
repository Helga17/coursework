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
        <div class="label">Тип</div>
        <select v-model="changedTree.type" v-bind:disabled="!isHavePermissionForChange">
            <option v-for="(type, index) in types" v-bind:value="index">{{ type }}</option>
        </select>
    </div>
    <div class="block">
        <div class="label">Стан</div>
            <select v-model="changedTree.state" v-bind:disabled="!isHavePermissionForChange">
                <option v-for="(state, index) in states" v-bind:value="index">{{ state }}</option>
            </select>
    </div>
    <div class="block">
        <div class="label">Висота</div>
        <input type="number" v-model="changedTree.stature" v-bind:disabled="!isHavePermissionForChange">
    </div>
    <div class="block">
        <div class="label">Диаметер</div>
        <input type="number" v-model="changedTree.diameter" v-bind:disabled="!isHavePermissionForChange">
    </div>
    <div class="block">
        <div class="label">Широта</div>
        <input type="number" v-model="changedTree.lat" v-bind:disabled="!isHavePermissionForChange">
    </div>
    <div class="block">
        <div class="label">Довгота</div>
        <input type="number" v-model="changedTree.lng" v-bind:disabled="!isHavePermissionForChange">
    </div>
    <div class="block" v-bind:hidden="isHavePermissionForChange"></div>
    <div class="block" v-bind:hidden="isHavePermissionForChange"></div>
    <div class="block">
        <button class="btn btn-save" v-on:click="saveData()" v-bind:hidden="!isHavePermissionForChange">Зберегти</button>
    </div>
    <div class="block">
        <button class="btn btn-remove" v-on:click="removeData()" v-bind:hidden="!isHavePermissionForChange">Видалити</button>
    </div>
    <div class="block">
        <button class="btn btn-cancel" v-on:click="hideWindow()">Закрити</button>
    </div>
</div>

<?php if ($isInSession): ?>
<div class="elements">
    <a type="button" v-on:click="openWindowForCreating()"><i class="fa fa-plus" aria-hidden="true"></i></a>
</div>
<?php endif; ?>

<!--фильтрация-->
<div class="filters">
    <a v-on:click="showFilters = !showFilters"><i class="fa fa-filter" aria-hidden="true" title="фільтрація"></i></a><br>
    <div id = "filterTrees" v-bind:hidden="showFilters">
        <div class="filter-param" v-for="(state, index) in states">
            <input type="checkbox" v-bind:value="index" v-model="search" v-bind:id="'state' + index">
            <label v-bind:for="'state' + index">{{ state }}</label>
        </div>
    </div>
</div>

<div id="map">{{filteredItems}}</div>
