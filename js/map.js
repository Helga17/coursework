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
<<<<<<< HEAD
        "src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
=======
        // "src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        "src": "https://glav-dacha.ru/wp-content/uploads/2017/02/grusha-pamyati-yakovleva.jpg"
=======
        "src": "../images/bad.png"
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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

<<<<<<< HEAD
        "src": "http://galerey-room.ru/images/065958_1385524798.png"
=======
        // "src": "http://stroyres.net/wp-content/uploads/2015/08/kak-vyiglyadit-pushistyiy-yasen.jpg"
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        "src": "http://galerey-room.ru/images/072420_1385526260.png"
=======
        //"src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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

<<<<<<< HEAD
        "src": "http://stroyres.net/wp-content/uploads/2015/08/kak-vyiglyadit-pushistyiy-yasen.jpg"
=======
        //"src": "http://stroyres.net/wp-content/uploads/2015/08/kak-vyiglyadit-pushistyiy-yasen.jpg"
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        "src": "https://upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Kirschbaumbluete_2007.JPG/1200px-Kirschbaumbluete_2007.JPG"
=======
        //"src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        "src": "http://sadimsami.ru/wp-content/uploads/2017/03/vishnya-morozovka.jpg"
    },
    
=======
        //"src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
    },
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
];

var app = new Vue({
    el: '#app',
    data: {
<<<<<<< HEAD
        //объявление переменных
        jumper: true,
        //show: true,
        trees : [],
        map: {},
        markers: [],
        search : [],
=======
        jumper: true,
        trees : [],
        map: {},
        markers: [],


        /*объявление переменных*/
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
        treesImages:{
            "Нормальне": "images/tree.jpg",
            "Напівсухе": "images/good-bad.png",
            "Сухе": "images/bad.png",
        },
<<<<<<< HEAD
=======

>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        //для редактирования
=======

        /*для редактирования*/
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
        isEdit: false,
        editTreeElement:"",
        editItemTrees: "",
        editStatureTrees: "",
        editDiameterTrees: "",
        editAgeTrees: "",
        editStateTrees: "",
        editLatTrees: "",
        editLngTrees: "",
<<<<<<< HEAD
        //для просмотра информации
=======

        /*для просмотра информации*/
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
        detailId: 0,
        detailItemTrees: "",
        detailStatureTrees: "",
        detailDiameterTrees: "",
        detailAgeTrees: "",
        detailStateTrees: "",
        detailLatTrees: "",
        detailLngTrees: ""
<<<<<<< HEAD
    },
    methods: {
        //добавление данных про дерево
=======

    },

    methods: {
        /*добавление данных про дерево*/
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        //считывание данных для редактирования
=======
        /*считывание данных для редактирования*/
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        //редактирование данных
=======

        /*редактирование данных*/
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
        editTree: function() {
            var treeEdit = this.editTreeElement,
                position = {
                    "lat": this.editLatTrees,
                    "lng": this.editLngTrees
                };
<<<<<<< HEAD
=======

>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        //просмотр информации про дерево
=======
        /*просмотр информации про дерево*/
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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

<<<<<<< HEAD
            this.jumper = false;
        },
        back: function(){
            this.jumper = true;
        },
        //
=======
            //////////////////////////////
            this.jumper = false;
        },
        //////////////////////////////
        back: function(){
            this.jumper = true;
        },
        //init marker
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
        },
<<<<<<< HEAD
        //удаление
        deleteTree: function(index, arrayKey) {
            this.trees.splice(arrayKey, 1);
            this.markers[index].setMap(null);
        },
        //очищение
=======
        //delete
        deleteTree: function(index, arrayKey) {
            debugger;
            this.trees.splice(arrayKey, 1);
            this.markers[index].setMap(null);
        },
        //clear
>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
    },
    //
    computed:{
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
        } 
    },
    //
=======

    },

>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
=======

>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
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
<<<<<<< HEAD
        });
=======
            //открыли форму
            //openForm();

        });

>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6
        this.trees.forEach((tree) => {
            this.initTreeMarker(tree);
        });
    }

});

<<<<<<< HEAD
=======
/*объявление переменных
var title = document.getElementById("title");
var stature = document.getElementById("stature");
var diameter = document.getElementById("diameter");
var age = document.getElementById("age");
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var normalState = document.getElementById("normalState");
var goodbadState = document.getElementById("goodbadState");
var badState = document.getElementById("badState");*/

/*сохранение формы
function saveForm() {
  let state;
  console.log(normalState.checked, goodbadState.checked, badState.checked);
  /*выбор состояния
  if(goodbadState.checked){
    state = "Напівсухе";
  } else if(badState.checked){
    state = "Сухе";
  }else{
    state = "Нормальне"
  }

  var newTree = {
    item: title.value,
    stature: stature.value,
    diameter: diameter.value,
    age: age.value,
    position: {
      lat: parseFloat(latitude.value),
      lng: parseFloat(longitude.value)
    },
    state: state
  }
  pushArray(newTree);
  initMap();
  closeForm();
  clear();
}*/

/*добавляем
function pushArray(data) {
  trees.push(data);
  console.log(trees);
}*/

/*очищаем
function clear() {
  title.value = "";
  stature.value = "";
  diameter.value = "";
  age.value = "";
}*/

/*function initMap() {
карта
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {
      lat: 47.839160,
      lng: 35.140104
    },
    zoom: 13
  });

  map.addListener('click', function (event) {
    //получаем координаты
    let latLng = event.latLng;
    //открыли форму
    openForm();
    var latitude = document.getElementById('latitude');
    latitude.value = latLng.lat();
    var longitude = document.getElementById('longitude');
    longitude.value = latLng.lng();

  });*/

/*trees.forEach(element => {
  var url;
  выбор картинки по состоянию
  switch (element.state) {
    case "Сухе":
      url = "images/bad.png";
      break;
    case "Напівсухе":
      url = "images/good-bad.png";
      break;
    default:
      url = "images/tree.jpg";
  }*/

/*маркер
var marker = new google.maps.Marker({
  position: element.position,
  map: map,
  icon: {
    url: url,
    scaledSize: new google.maps.Size(22, 22)
  }
});
});
}*/

>>>>>>> 63cdff865ea235ff53db5085b34d9d3921f5cab6

