var app = require('express')();
var http = require('http').Server(app);

var io = require('socket.io')(http, {
    cors: {
        origin: "http://localhost",
        methods: ["GET", "POST"]
    }
});

app.get('/', function (reg, res) {

    res.send('Socket io for example');
});

io.on('connection', function (socket) {

    console.log('Kullanıcı Bağlandı');

    socket.emit('welcome', 'Kullanıcı hoş geldiniz..');

    socket.on('test', function (result) {
        console.log(result);
    });

    socket.on('welcome_client', function (result) {
        console.log(result);
    });
});

http.listen(3000, function () {
    console.log('server is listening on 3000 port');
});
