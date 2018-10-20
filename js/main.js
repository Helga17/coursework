var trees = [{
    "item": "Дуб",
    "domain": "Еукаріоти",
    "kingdom": "Рослини",
    "department": "Квіткові",
    "order": "Букоцвіт",
    "state": "Нормальне",
    "position": {
      lat: 47.839160,
      lng: 35.140104
    },
    "src": "http://newacropolis.org.ua/uploads/production/ckeditor/picture/data/8ed/bd5/36-/8edbd536-025a-40bb-a9fb-910f290983b1/content.png"
  },
  {
    "item": "Тополь",
    "domain": "Ядерні",
    "kingdom": "Рослини",
    "department": "Квіткові",
    "order": "Мальпігієцвіті",
    "state": "Сухе",
    "position": {
      lat: 47.848506,
      lng: 35.124971
    },
    "src": "http://stroyka-eko.ru/wp-content/uploads/2017/08/1topl.jpg"
  },
  {
    "item": "Ясен",
    "domain": "Ядерні",
    "kingdom": "Рослини",
    "department": "Квіткові",
    "order": "Губоцвіті",
    "position": {
      lat: 47.848794,
      lng: 35.122589
    },
    "state": "Напівсухе",
    "src": "http://stroyres.net/wp-content/uploads/2015/08/kak-vyiglyadit-pushistyiy-yasen.jpg"
  }
]

var title = document.getElementById("title");
var domain = document.getElementById("domain");
var kingdom = document.getElementById("kingdom");
var department = document.getElementById("department");
var order = document.getElementById("order");
var latitude = document.getElementById("latitude");
var longitude = document.getElementById("longitude");
var normalState = document.getElementById("normalState");
var goodbadState = document.getElementById("goodbadState");
var badState = document.getElementById("badState");


function saveForm() {
  let state;
  console.log(normalState.checked, goodbadState.checked, badState.checked);
  if(goodbadState.checked){
    state = "Напівсухе";
  } else if(badState.checked){
    state = "Сухе";
  }else{
    state = "Нормальне"
  }

  var newTree = {
    item: title.value,
    domain: domain.value,
    kingdom: kingdom.value,
    department: department.value,
    order: order.value,
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
}

function pushArray(data) {
  trees.push(data);
  console.log(trees);
}

function clear() {
  title.value = "";
  domain.value = "";
  kingdom.value = "";
  department.value = "";
  order.value = "";
}

function initMap() {

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
    // открыли форму
    openForm();
    var latitude = document.getElementById('latitude');
    latitude.value = latLng.lat();
    var longitude = document.getElementById('longitude');
    longitude.value = latLng.lng();

  });



  trees.forEach(element => {
    var url;

    switch (element.state) {
      case "Сухе":
        url = "images/bad.png";
        break;
      case "Напівсухе":
        url = "images/good-bad.png";
        break;
      default:
        url = "images/tree.jpg";
    }

    var marker = new google.maps.Marker({
      position: element.position,
      map: map,
      icon: {
        url: url,
        scaledSize: new google.maps.Size(34, 34)
      }
    });
  });


}
initMap();


new Vue({
  el: '#app',
  data: {
    trees: []
  },
  mounted: function () {
    this.trees = trees;
  },

  methods: {
    say: function (message) {
      alert(message)
    }
  }
});