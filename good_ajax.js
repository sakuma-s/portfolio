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
    xhr.open('GET', 'create.php?name=' +
      encodeURIComponent(document.getElementById('btn').value), true);
    xhr.send(null);
  }, false);
}, false);
