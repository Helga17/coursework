var v = new Vue({
    el: '#app',
    data: { 
       jumper: true,
        trees : [
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
           // "src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
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
            "src": "../images/bad.png"
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
            
           // "src": "http://stroyres.net/wp-content/uploads/2015/08/kak-vyiglyadit-pushistyiy-yasen.jpg"
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
            //"src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
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
            
            //"src": "http://stroyres.net/wp-content/uploads/2015/08/kak-vyiglyadit-pushistyiy-yasen.jpg"
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
            //"src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
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
            //"src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
          },
        ],


        /*объявление переменных*/
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

        /*для редактирования*/
        editTreeElement:"",
        editItemTrees: "",
        editStatureTrees: "",
        editDiameterTrees: "",
        editAgeTrees: "",
        editStateTrees: "",
        editLatTrees: "",
        editLngTrees: "",

        /*для просмотра информации*/
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
      /*добавление данных про дерево*/
      addTree: function(){
          let position = {
            "lat": this.latTrees,
            "lng": this.lngTrees
          }
          this.trees.push({
            "item": this.itemTrees,
            "stature": this.statureTrees,
            "diameter": this.diameterTrees,
            "age": this.ageTrees,
            "state": this.stateTrees,
            "position": position,
            "src": "images/tree.jpg"
          });
          console.log(this.trees);
      },
      /*считывание данных для редактирования*/
      editing: function(index){
        var treeEdit = this.trees.find(function(el){
          return el._id == index;
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
        },

      /*редактирование данных*/
      editTree: function(){
        var treeEdit = this.editTreeElement;
        let position = {
          "lat": this.editLatTrees,
          "lng": this.editLngTrees
        }

        treeEdit.item = this.editItemTrees;
        treeEdit.stature = this.editStatureTrees;
        treeEdit.diameter = this.editDiameterTrees;
        treeEdit.age = this.editAgeTrees;
        treeEdit.state = this.editStateTrees;
        treeEdit.position = position;
      },
      /*просмотр информации про дерево*/
      detail: function(index){
        let treeDetail = this.trees.find(function(el){
          return el._id == index;
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
        
        //////////////////////////////
        this.jumper = false;
      },
       //////////////////////////////
      back: function(){
        this.jumper = true;
      }
      
    },
    
  })

 
  function initMap() {
    /*карта*/
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
    
  })}
    
     /* trees.forEach(element => {
        var url;
        /*выбор картинки по состоянию*/
        /*switch (element.state) {
          case "Сухе":
            url = "images/bad.png";
            break;
          case "Напівсухе":
            url = "images/good-bad.png";
            break;
          default:
            url = "images/tree.jpg";
        }
    
        маркер
        var marker = new google.maps.Marker({
          position: element.position,
          map: map, 
          icon: {
            url: url,
            scaledSize: new google.maps.Size(22, 22)
          }
        });
      });
      initMap();
    }*/



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


