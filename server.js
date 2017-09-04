var express = require('express');
var morgan = require('morgan');
var path = require('path');

var Pool = require('pg').Pool;

var config=
{
    user:'avinnagre',
    database:'avinnagre',
    host:'db.imad.hasura-app.io',
    port:'5432',
    password: process.emv.DB_PASSWORD,
}

var app = express();
app.use(morgan('combined'));

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

app.get('/ui/signup.html', function (req, res) {
  res.sendFile(path.join(__dirname, 'ui', 'signup.html'));
});

var pool=new Pool(congig);
app.get('/test-db', function (req, res) {
     pool.query('select * from userdata', function(err,result){
         if(err)
         {
             res.status(500).send(err.toString());
         }
         else
         {
             res.send(JSON.stringify(result));
         }
     });
    
});


// Do not change port, otherwise your app won't run on IMAD servers
// Use 8080 only for local development if you already have apache running on 80

var port = 80;
app.listen(port, function () {
  console.log(`IMAD course app listening on port ${port}!`);
});
