var socket  = require( 'socket.io' );
var express = require('express');
var app     = express();
var server  = require('http').createServer(app);
var io      = socket.listen( server );
var port    = process.env.PORT || 8254;

server.listen(port, function () {
    console.log('Server listening at port %d', port);
});


io.on('connection', function (socket) {
    socket.on( 'adduser', function( data ) {
        socket.user    =   data;
        socket.broadcast.emit('updatechat',"" , 'ยินดีตอนรับคุณ '+data  );
		
        console.log(data + "Message");
    });

    socket.on('sendchat', function (data) {

        socket.broadcast.emit('updatechat', socket.user, data);
        console.log("User : "+socket.user+" Message :"+data);
    });

});