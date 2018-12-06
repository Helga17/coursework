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
            this.hiddenWindow = false;
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
                        if (id === data.id) {
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
                this.hiddenWindow = false;
                this.isEdit = true;
            });
        },
    },

    computed:{
        //фильтрация
        filteredItems: function() {

            let search = this.search, trees = this.trees, markers = this.markers, filtersTrees;

            markers.forEach((marker, id) => {
                markers[id].setMap(null);
            });

            if (search.length) {
                filtersTrees = trees.filter(element => {
                    return (search.includes(element.state));
                });
            } else {
                filtersTrees = trees;
            }

            filtersTrees.forEach((tree) => {
                markers[tree.id].setMap(this.map);
            });
        }  
    },

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