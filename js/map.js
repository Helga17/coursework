var trees = [
    {
        "_id": "123",
        "item": "Дуб",
        "stature": "260",
        "diameter": "100",
        "age": "20",
        "state": "Нормальне",
        "position": {
            lat: 47.839160,
            lng: 35.140104
        },
        "src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
    },
    {
        "_id": "234",
        "item": "Тополь",
        "stature": "230",
        "diameter": "100",
        "age": "15",
        "state": "Сухе",
        "position": {
            lat: 47.848506,
            lng: 35.124971
        },
        "src": "https://glav-dacha.ru/wp-content/uploads/2017/02/grusha-pamyati-yakovleva.jpg"
    },
    {
        "_id": "345",
        "item": "Ясен",
        "stature": "280",
        "diameter": "100",
        "age": "18",
        "state": "Напівсухе",
        "position": {
            lat: 47.848794,
            lng: 35.122589
        },

        "src": "http://galerey-room.ru/images/065958_1385524798.png"
    },
    {
        "_id": "456",
        "item": "Береза",
        "stature": "200",
        "diameter": "40",
        "age": "10",
        "state": "Нормальне",
        "position": {
            lat: 47.847178079310076,
            lng: 35.125194941190784
        },
        "src": "http://galerey-room.ru/images/072420_1385526260.png"
    },
    {
        "_id": "567",
        "item": "Ясен",
        "stature": "260",
        "diameter": "90",
        "age": "22",
        "state": "Сухе",
        "position": {
            lat: 47.84800098120972,
            lng: 35.121649300287686
        },

        "src": "http://stroyres.net/wp-content/uploads/2015/08/kak-vyiglyadit-pushistyiy-yasen.jpg"
    },
    {
        "_id": "678",
        "item": "Дуб",
        "stature": "200",
        "diameter": "100",
        "age": "14",
        "state": "Напівсухе",
        "position": {
            lat: 47.88540829449062,
            lng: 35.02018328701047
        },
        "src": "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Kirschbaumbluete_2007.JPG/1200px-Kirschbaumbluete_2007.JPG"
    },
    {
        "_id": "789",
        "item": "Береза",
        "stature": "200",
        "diameter": "70",
        "age": "17",
        "state": "Нормальне",
        "position": {
            lat: 47.84776424329802,
            lng: 35.12263195734249
        },
        "src": "http://sadimsami.ru/wp-content/uploads/2017/03/vishnya-morozovka.jpg"
    },
    
];

var app = new Vue({
    el: '#app',
    data: {
        //объявление переменных
        jumper: true,
        show: true,
        trees : [],
        map: {},
        markers: [],
        search : [],
        treesImages:{
            "Нормальне": "images/tree.jpg",
            "Напівсухе": "images/good-bad.png",
            "Сухе": "images/bad.png",
        },
        itemTrees: "",
        statureTrees: "",
        diameterTrees: "",
        ageTrees: "",
        stateTrees: "",
        latTrees: "",
        lngTrees: "",
        srcTrees: "images/tree.jpg",
        id: 0,
        editId: 0,
        //для редактирования
        isEdit: false,
        editTreeElement:"",
        editItemTrees: "",
        editStatureTrees: "",
        editDiameterTrees: "",
        editAgeTrees: "",
        editStateTrees: "",
        editLatTrees: "",
        editLngTrees: "",
        //для просмотра информации
        detailId: 0,
        detailItemTrees: "",
        detailStatureTrees: "",
        detailDiameterTrees: "",
        detailAgeTrees: "",
        detailStateTrees: "",
        detailLatTrees: "",
        detailLngTrees: ""
    },
    methods: {
        //добавление данных про дерево
        addTree: function(){
            let position = {
                    "lat": this.latTrees,
                    "lng": this.lngTrees
                },
                tree = {
                    "item": this.itemTrees,
                    "stature": this.statureTrees,
                    "diameter": this.diameterTrees,
                    "age": this.ageTrees,
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
            var treeEdit = this.trees.find(function(el){
                return el._id === index;
            });
            this.editTreeElement = treeEdit;
            this.editId = index;
            this.editItemTrees = treeEdit.item;
            this.editStatureTrees = treeEdit.stature;
            this.editDiameterTrees = treeEdit.diameter;
            this.editAgeTrees = treeEdit.age;
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
            treeEdit.age = this.editAgeTrees;
            treeEdit.state = this.editStateTrees;
            treeEdit.position = position;
            this.isEdit = false;
            this.markers[this.editId].setPosition(position);
            this.clear();
        },
        //просмотр информации про дерево
        detail: function(index){
            let treeDetail = this.trees.find(function(el){
                return el._id === index;
            });
            let position = treeDetail.position;
            this.detailId = index;
            this.detailItemTrees = treeDetail.item;
            this.detailStatureTrees = treeDetail.stature;
            this.detailDiameterTrees = treeDetail.diameter;
            this.detailAgeTrees = treeDetail.age;
            this.detailStateTrees = treeDetail.state;
            this.detailLatTrees = position.lat;
            this.detailLngTrees = position.lng;

            this.jumper = false;
        },
        back: function(){
            this.jumper = true;
        },
        //
        initTreeMarker: function (tree) {
            var self = this, url;
            //выбор картинки по состоянию
            switch (tree.state) {
                case "Сухе":
                    url = "images/bad.png";
                    break;
                case "Напівсухе":
                    url = "images/good-bad.png";
                    break;
                default:
                    url = "images/tree.jpg";
            }
            //маркер
            this.markers[tree._id] = new google.maps.Marker({
                position: tree.position,
                map: self.map,
                icon: {
                    url: url,
                    scaledSize: new google.maps.Size(22, 22)
                }
            });
            this.markers[tree._id].addListener('click', () => {
                self.detail(tree._id);
            })
        },
        //удаление
        deleteTree: function(index, arrayKey) {
            this.trees.splice(arrayKey, 1);
            this.markers[index].setMap(null);
        },
        //очищение
        clear: function () {
            this.itemTrees = "";
            this.statureTrees = "";
            this.diameterTrees = "";
            this.ageTrees = "";
            this.stateTrees = "";
            this.latTrees = "";
            this.lngTrees = "";
            this.editTreeElement = "";
            this.editItemTrees = "";
            this.editStatureTrees = "";
            this.editDiameterTrees = "";
            this.editAgeTrees = "";
            this.editStateTrees = "";
            this.editLatTrees = "";
            this.editLngTrees = "";
        }
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
                this.markers[tree._id].setMap(this.map);
            });
           this.show = false; 
        } 
        
    },
    //
    mounted: function () {
        var self = this;
        this.trees = trees;
        this.map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 47.839160,
                lng: 35.140104
            },
            zoom: 13
        });
        this.map.addListener('click', function (event) {
            //получаем координаты
            var latLng = event.latLng;
            if (self.isEdit) {
                self.editLatTrees = latLng.lat();
                self.editLngTrees = latLng.lng();
            } else {
                self.latTrees = latLng.lat();
                self.lngTrees = latLng.lng();
            }
        });
        this.trees.forEach((tree) => {
            this.initTreeMarker(tree);
        });
    }

});


