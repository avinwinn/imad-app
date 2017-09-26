var express = require('express');
var morgan = require('morgan');
var path = require('path');
var crypto=require('crypto');

var Pool = require('pg').Pool;

var config=
{
    user: 'avinnagre',
    database: 'avinnagre',
    host: 'db.imad.hasura-app.io',
    port: '5432',
    password: process.env.DB_PASSWORD,
};


var app = express();
app.use(morgan('combined'));


var pool = new Pool(config);

function hash(input,salt)
{
    //hasing isdone in this code   
    var hashed= crypto.pbkdf2Sync(input,salt,10000,512,'sha512');
    return hashed.toString('hex');
}

app.get('/hash/:input',function(req,res)
{
    var hashedString=hash(req.params.input,'this-is-the-string');
    res.send(hashedString);
    
});


app.get('/test-db', function (req, res) {
     pool.query('SELECT * FROM userdata', function(err,result){
         if(err)
         {
             res.status(500).send(err.toString());
         }
         else
         {
             res.send(JSON.stringify(result.rows));
         }
     });
    
});


app.get('/', function (req, res) {
  res.sendFile(path.join(__dirname, 'ui', 'index.html'));
});


app.get('/ui/style.css', function (req, res) {
  res.sendFile(path.join(__dirname, 'ui', 'style.css'));
});

app.get('/ui/madi.png', function (req, res) {
  res.sendFile(path.join(__dirname, 'ui', 'madi.png'));
});

app.get('/ui/wallpaper.jpg', function (req, res) {
  res.sendFile(path.join(__dirname, 'ui', 'wallpaper.jpg'));
});

app.get('/ui/medicartoon.jpg', function (req, res) {
  res.sendFile(path.join(__dirname, 'ui', 'medicartoon.jpg'));
});

app.get('/ui/sign-up.php', function (req, res) {
  res.sendFile(path.join(__dirname, 'ui', 'sign-up.php'));
});


// Do not change port, otherwise your app won't run on IMAD servers
// Use 8080 only for local development if you already have apache running on 80

var port = 80;
app.listen(port, function () {
  console.log(`IMAD course app listening on port ${port}!`);
});
