let app = new Vue({
    el: '#app',
    data: {
        //объявление переменных
        showFilters: true,
        hiddenWindow: true,
        isEdit: false,
        isNew: false,
        trees : [],
        map: {},
        markers: [],
        search : [],
        treesImages: [],
        types: [],
        states: [],
        changedTree: {},


    },
    methods: {


        //добавление данных про дерево
        addTree: function() {
            let position = {
                    "lat": this.latTrees,
                    "lng": this.lngTrees
                },
                tree = {
                    "item": this.itemTrees,
                    "stature": this.statureTrees,
                    "diameter": this.diameterTrees,
                    "state": this.stateTrees,
                    "position": position,
                    "src": "images/tree.jpg"
                };
            this.trees.push(tree);
            this.initTreeMarker(tree);
            this.clear();
        },
        //считывание данных для редактирования
        editing: function(index){
            let treeEdit = this.trees.find(function(el){
                return el.id === index;
            });
            this.editTreeElement = treeEdit;
            this.editId = index;
            this.editItemTrees = treeEdit.item;
            this.editStatureTrees = treeEdit.stature;
            this.editDiameterTrees = treeEdit.diameter;
            this.editStateTrees = treeEdit.state;
            this.editLatTrees = treeEdit.position.lat;
            this.editLngTrees = treeEdit.position.lng;
            this.isEdit = true;
        },
        //редактирование данных
        editTree: function() {
            var treeEdit = this.editTreeElement,
                position = {
                    "lat": this.editLatTrees,
                    "lng": this.editLngTrees
                };
            treeEdit.item = this.editItemTrees;
            treeEdit.stature = this.editStatureTrees;
            treeEdit.diameter = this.editDiameterTrees;
            treeEdit.state = this.editStateTrees;
            treeEdit.position = position;
            this.isEdit = false;
            this.markers[this.editId].setPosition(position);
            this.clear();
        },

        getDefaultTree: function () {
            return {
                image: null,
                type: null,
                state: null,
                stature: null,
                diameter: null,
                lat: null,
                lng: null,
                id: null,
            };
        },

        //приведение всех переменных к начальному значению
        refreshData: function() {
            this.hiddenWindow = true;
            this.isEdit = false;
            this.isNew = false;
            this.changedTree = this.getDefaultTree();
        },

        //открытие окна для создания дерева
        openWindowForCreating: function() {
            this.refreshData();
            this.isNew = true;
        },

        //сохраняет введенные данные
        saveData: function() {
            let self = this, tree = self.changedTree;
            if (self.isNew) {
                axios.post('/addTree', tree)
                    .then((response) => {
                        let data = response.data;
                        if (!(data > 0)) {
                            return alert(data);
                        }
                        tree.id = data;
                        self.trees.push(tree);
                        self.initTreeMarker(tree);
                        self.refreshData();
                    });
            } else if (self.isEdit) {
                axios.post('/updateTree', tree)
                    .then((response) => {
                        if (response.data) {
                            return alert(response.data);
                        }
                        self.markers[tree.id].setMap(null);
                        self.initTreeMarker(tree);
                        self.refreshData();
                    });
            }
        },

        //удаление дерева
        removeData: function () {
            if (!confirm('Are you sure?')) {
                return;
            }
            let self = this, tree = self.changedTree;
            axios.post('/removeTree', tree)
                .then((response) => {
                    if (response.data) {
                        return alert(response.data);
                    }
                    let id = tree.id;
                    self.trees.forEach((data, key) => {
                        if (id == data.id) {
                            self.trees.splice(key, 1);
                        }
                    });
                    self.markers[id].setMap(null);
                    self.refreshData();
                });
        },

        hideWindow: function() {
            this.hiddenWindow = false;
            this.refreshData();
        },
        //создает маркер для дерева
        initTreeMarker: function (tree) {
            let self = this, url = './images/' + this.treesImages[tree.state], id = tree.id;
            //маркер
            this.markers[id] = new google.maps.Marker({
                position: {
                    lat: 1 * tree.lat,
                    lng: 1 * tree.lng,
                },
                map: self.map,
                icon: {
                    url: url,
                    scaledSize: new google.maps.Size(22, 22)
                }
            });
            this.markers[id].addListener('click', () => {
                this.changedTree = this.trees.find((el) => {
                    return el.id === id;
                });
                this.hiddenWindow = true;
                this.isEdit = true;
            });
        },
        //удаление
        deleteTree: function(index, arrayKey) {

        },
    },
    //
    computed:{
        //фильтрация
        filteredItems: function() {

            if(!this.search.length){
                return this.trees;
            }
        
            this.markers.forEach((marker, id) => {
                this.markers[id].setMap(null);
            });
        
            var filtersTrees = this.trees.filter(element => {
                return (app.search.includes(element.state));
            });
            
            filtersTrees.forEach((tree) => {
                this.markers[tree.id].setMap(this.map);
            });
        }  
    },
    //
    mounted: function () {
        let self = this;
        this.trees = trees;
        this.states = states;
        this.types = types;
        this.treesImages = treesImages;
        this.changedTree = this.getDefaultTree();
        this.map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 47.839160,
                lng: 35.140104
            },
            zoom: 13
        });
        this.map.addListener('click', function (event) {
            //получаем координаты
            let latLng = event.latLng;
            if (self.isEdit || self.isNew) {
                self.changedTree.lat = latLng.lat();
                self.changedTree.lng = latLng.lng();
            }
        });
        this.trees.forEach((tree) => {
            this.initTreeMarker(tree);
        });
    }
});