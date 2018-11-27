// //открываем форму
// function openForm() {
//     document.getElementById("myForm").style.display = "block";
//     document.getElementById("map").style.width = "86%";
//     document.getElementById("map").style.float = "right"
// }

// //закрываем форму
// function closeForm() {
//     document.getElementById("myForm").style.display = "none";
//     document.getElementById("map").style.width = "100%";
//     document.getElementById("map").style.float = "none"
// }

//отображение загруженной картинки
function fileSelect(evt) {

    var files = evt.target.files;
    for (var i = 0, f; f = files[i]; i++) {
      if (!f.type.match('image.*')) {
        continue;
      }
      var reader = new FileReader();
      reader.onload = (function(theFile) {
        return function(e) {
          var div = document.createElement('div');
          div.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(div, null);
        };
      })(f);
      reader.readAsDataURL(f);
    }
  }     
  document.getElementById('files').addEventListener('change', fileSelect, false);