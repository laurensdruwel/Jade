var bodyParser = require('body-parser');
var http = require('http');
var express = require('express');
var app = express();
var mysql = require("mysql");


//mysql
var connection = mysql.createConnection({
    host: 'localhost',
    user: 'Jade',
    password: 'root',
    database: 'user'
});

connection.connect();

// set up BodyParser Middleware
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));


app.use(express.static(__dirname + '/public'));
app.set('view engine', 'ejs');
app.set('views', __dirname + '/public/views');
app.engine('html', require('ejs').renderFile);
app.get('/', function (req, response) {
    response.render("login.html", "");
});

app.get('/register', function (req, response) {

    response.render('register.html', {

    });

});

// app.get('/places', function (req, response) {
//     response.render('places.html', {
//     });
// });


app.post('/checkLogin', function (req, response) {

    console.log(req.body);
    var loginOk = getUsers(req.body.username,req.body.passphrase);
    //console.log("xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx");
    console.log("login: "+loginOk);









    // if(loginOk){
    //     console.warn("correct");
    //     // response.render('places.html');
    // }
    // else console.warn("incorrect login!");
    // else response.render('login.html');

    // response.render('places.html', {
    //
    // });
});

//
//
// app.post('/load_locations', function (req, res) {
//     console.log(req.body);
//     var locations = getLocations(req.body.start,req.body.end);
//
//     locations.then(function (results) {
//         res.json ({
//             locations: results
//         });
//     });
// });




//sql functions
function checkLogin(username, passphrase) {


        var statement = 'Select * from users where username=?';
        connection.query(statement, [username], function (error, results, fields) {
            if (error) throw error;

            results[0].passphrase === passphrase;
        });

        connection.end();


}


function getUsers(){
    var statement = 'Select * from users';
    var checkLogin = null;
    connection.query(statement, function(error, results, fields){
        checkLogin = "XXX";
        if(error) throw error;
        console.log(results);
        console.log("username= "+results[0].passphrase);
        if(results[0].passphrase == "root"){
            console.log("im in ");
            checkLogin = true;
        }
        else{
            console.log("no im not");
            checkLogin = false;
        }

    });



    return checkLogin;
}
// getLocations = (start, end) => {
//     return new Promise(function (resolve) {
//         var statement = 'Select * from locations limit ?,?';
//         connection.query(statement, [start, end], function (error, results, fields) {
//             if (error) throw error;
//             resolve(results);
//         });
//     });


    //connection.end();
//};



var server = http.createServer(app);
server.listen(8080, function () {
    console.log("listening on 8080");
});