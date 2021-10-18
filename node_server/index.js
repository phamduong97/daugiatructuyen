var express = require("express");
var cors = require("cors");
var app = express();
app.use(express.static("public"));
app.use(cors({ origin: 'http://localhost:3000' }));
app.use(function(req, res, next) {

    // Website you wish to allow to connect
    res.setHeader('Access-Control-Allow-Origin', '*');

    // Request methods you wish to allow
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');

    // Request headers you wish to allow
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type');

    // Set to true if you need the website to include cookies in the requests sent
    // to the API (e.g. in case you use sessions)
    res.setHeader('Access-Control-Allow-Credentials', true);

    // Pass to next layer of middleware
    next();
});
app.set("view engine", "ejs");
app.set("views", "./views");

var server = require("http").Server(app);
var io = require("socket.io")(server);
server.listen(3000);
console.log("Start server node");
var users = [];

io.on("connection", function(socket) {
    console.log("có người kết nối nè " + socket.id);


    socket.on("disconnect", function() {
        console.log(socket.id + " đã thoát ra khỏi phòng");
    });

    socket.on("end-room", function(id_room) {
        socket.phong = id_room;
        io.sockets.in(socket.phong).emit("confirm-end-room", { 'id_room': id_room, 'id_user': 0 });

    });

    socket.on("dissmiss-room", function(data) {
        socket.phong = data.id_room;
        io.sockets.in(socket.phong).emit("confirm-end-room", data);

    });

    socket.on("send-data", function(result) {

        let data = JSON.parse(result);
        socket.join(data.id_room);
        socket.phong = data.id_room;
        // console.log(socket.adapter.rooms);

        var arr = Array.from(io.sockets.adapter.rooms);

        var filtered = arr.filter(room => !room[1].has(room[0]))

        var rooms = filtered.map(i => i[0]);

        // rooms.forEach((item, i) => {
        //     console.log(item);
        //     let x = 
        // });

        // console.log(filtered);

        io.sockets.emit("receive-data", rooms);
        if (data.price != 0) {

            io.sockets.in(socket.phong).emit("send-room-socket", data);

        }
    });

});

app.get("/", function(req, res) {

    res.setHeader('Access-Control-Allow-Origin', '*');
    res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE'); // If needed
    res.setHeader('Access-Control-Allow-Headers', 'X-Requested-With,content-type'); // If needed
    res.setHeader('Access-Control-Allow-Credentials', true); // If needed

    res.send('Tan Dai Phat System');
});