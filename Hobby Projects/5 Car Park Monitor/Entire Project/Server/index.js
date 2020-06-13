var port = 3000;

var app = require('express')();
var server = require('http').createServer(app);
var io = require('socket.io')(server);

server.listen(port, function() {
    console.log('Server listening on port %d', port);
});

/*
app.get('/', function(req, res){
    res.send('Hello World');
});
*/

io.on('connection', function(socket) {
    console.log('a user connected');

    socket.on('msg', function(data) {
        socket.broadcast.emit('msg', {
            size: data.size,
            lots: data.lots,
            occupied: data.occupied
        });
    });
});