document.addEventListener('DOMContentLoaded', function () {
  document.getElementById('btn').addEventListener('click', function () {
    var result = document.getElementById('result');
    var xhr = new XMLHttpRequest();
    xhr.addEventListener('loadstart', function () {
      result.textContent = '通信中...';
    }, false);
    xhr.addEventListener('load', function () {
      result.textContent = xhr.responseText;
    }, false);
    xhr.addEventListener('error', function () {
      result.textContent = 'サーバーエラーが発生しました。';
    }, false);
    xhr.open('POST', 'create.php', true);
    xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded;charset=UTF-8');
    xhr.send('value=' + encodeURIComponent(document.getElementById('btn').value));
    //変数自体が存在するか確認
    console.log(typeof value === 'undefined');
  }, false);
}, false);
