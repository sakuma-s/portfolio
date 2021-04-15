document.addEventListener('DOMContentLoaded', function () {
  var good = document.getElementsByClassName('good');
  console.dir(good);
  for (var i = 0; i < good.length; i++) {
    //全てのgoodボタンにajaxを適用させる
    good[i].addEventListener('click', function () {
      var result = document.getElementById('result');
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function () {
        xhr.addEventListener('loadstart', function () {
          result.textContent = '通信中...';
        }, false);
        xhr.addEventListener('load', function () {
          result.textContent = xhr.responseText;
        }, false);
        xhr.addEventListener('error', function () {
          result.textContent = 'サーバーエラーが発生しました。';
        }, false);
      };
      xhr.open('POST', 'good_ajax.php', true);
      xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
      xhr.send('name=' + encodeURIComponent(document.getElementsByClassName('good')[0].value));
      //値自体が存在するか確認
      console.log(typeof value === 'undefined');
    }, false);
  }
}, false);
