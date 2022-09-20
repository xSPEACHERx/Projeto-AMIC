function mudar_texto() {

    document.getElementById('nome').innerHTML = 'test'
    document.getElementById('itnome').value = 'test'

    document.getElementById('curso').innerHTML = 'test'
    document.getElementById('itfuncao').selectedIndex = 0

    document.getElementById('periodo').innerHTML = 'test'
    document.getElementById('itperiodo').selectedIndex = 1

    document.getElementById('email').innerHTML = 'test'
    document.getElementById('itemail').value = 'test'

}

var http = require('http');

http.createServer(function (req, res) {
  res.writeHead(200, {'Content-Type': 'text/html'});
  res.end('Hello World!');
}).listen(8080);



