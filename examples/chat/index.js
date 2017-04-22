"use strict";

var express = require('express'),
    https = require('https'),
	connect = require('connect'),
    async = require('async'),	
    helmet = require('helmet'),
	morgan = require('morgan'),
    path = require('path'),
	compression = require('compression'),
	url = require('url'),
	frameguard = require('frameguard'),
	tls = require('tls'),
	ServiceRunner = require('service-runner'),
    fs = require('fs');
	
var app = express();

// must specify options hash even if no options provided!
//var phpExpress = require('php-express')({
 
  // assumes php is in your PATH
  //binPath: 'php'
//});

// set view engine to php-express
//app.set('views', './public');
//app.engine('php', phpExpress.engine);
//app.set('view engine', 'php');
 
 //routing all .php file to php-express
//app.all(/.+\.php$/, phpExpress.router); 

var csp = require('helmet-csp');
 
app.use(csp({
   //Specify directives as normal. 
 directives: {
    defaultSrc: ["'self'", 'https://mobile.jehovahsays.net/','https://www.youtube.com/','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net','https://translate.google.com','https://www.google.com','https://translate.googleapis.com','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net'],
    scriptSrc: ["'self'", "'unsafe-inline'","'unsafe-eval'",'https://mobile.jehovahsays.net/','https://www.youtube.com/','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net','https://translate.google.com','https://www.google.com','https://translate.googleapis.com','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net'],
    styleSrc: ["'self'", "'unsafe-inline'",'https://mobile.jehovahsays.net/','https://www.youtube.com/','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net','https://translate.google.com','https://www.google.com','https://translate.googleapis.com','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net'],
    fontSrc: ["'self'", 'https://mobile.jehovahsays.net/','https://www.youtube.com/','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net','https://translate.google.com','https://www.google.com'],
    imgSrc: ['img.com', 'data:', 'https://www.gstatic.com','https://mobile.jehovahsays.net/','https://www.youtube.com/','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net','https://translate.google.com','https://www.google.com'],
	connectSrc: ["'self'", 'https://mobile.jehovahsays.net/','https://www.youtube.com/','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net','https://translate.google.com','https://www.google.com', "blob:",'wss:'],
    frameSrc: ["'self'", 'https://www.jehovahsays.net/','https://mobile.jehovahsays.net/','https://www.youtube.com/','https://pagead2.googlesyndication.com/','https://googleads.g.doubleclick.net','https://translate.google.com','https://www.google.com'],
	//sandbox: ['allow-forms', 'allow-scripts'],
    //objectSrc: ["'none'"],
    upgradeInsecureRequests: true
  },
  
  // This module will detect common mistakes in your directives and throw errors 
  // if it finds any. To disable this, enable "loose mode". 
  loose: false,
 
  // Set to true if you only want browsers to report errors, not block them. 
  // You may also set this to a function(req, res) in order to decide dynamically 
  // whether to use reportOnly mode, e.g., to allow for a dynamic kill switch. 
  reportOnly: false,
 
  // Set to true if you want to blindly set all headers: Content-Security-Policy, 
  // X-WebKit-CSP, and X-Content-Security-Policy. 
  setAllHeaders: true,
 
  // Set to true if you want to disable CSP on Android where it can be buggy. 
  disableAndroid: false,
 
  // Set to false if you want to completely disable any user-agent sniffing. 
  // This may make the headers less compatible but it will be much faster. 
  // This defaults to `true`. 
  browserSniff: true
}));
	
app.use(compression());

var accessLogStream = fs.createWriteStream(path.join(__dirname, 'access.log'), {flags: 'a'});

app.use(morgan('combined', {stream: accessLogStream}));

app.use(helmet());

var referrerPolicy = require('referrer-policy')

app.use(referrerPolicy({ policy: 'no-referrer' }))

app.use(helmet.hidePoweredBy())

var hpkp = require('hpkp')

var ninetyDaysInSeconds = 7776000
app.use(hpkp({
  maxAge: ninetyDaysInSeconds,
  sha256s: ['QfhFmBHD75cJ60nUGZSgme0WnEzldcEyvBkONArxeUI=', 'lCppFqbkrlJ3EcVFAkeip0+44VaoJUymbnOaEUk7tEU=',
  'grX4Ta9HpZx6tSHkmCrvpApTQGo67CYDnvprLg5yRME=', 'klO23nT2ehFDXCfx3eHTDRESMz3asj1muO+4aIdjiuY=', 
  'Slt48iBVTjuRQJTjbzopminRrHSGtndY0/sj0lFf9Qk=', '"h6801m+z8v3zbgkRHpq6L29Esgfzhj89C1SyUCOQmqU=', 
  'EDag/9Ub9j75I8wEW6LIcdUBcZyXeI8XVbzBlm0uBQU=', 'AYyIEVI7Cz5FAWKATkzY51TwbGqzvDQyUZWpzt8lHjw=',
  'NTP1sOnRt6yYs00V7BVgxjmhwc289k7i+K/97AZUd4w=', 'Am8CJiGfnbik0PODFPRL8pJtN7fjph9bigC+ulkoWrY=',
  'x9SZw6TwIqfmvrLZ/kz1o0Ossjmn728BnBKpUFqGNVM=', '58qRu/uxh4gFezqAcERupSkRYBlBAvfcw7mEjGPLnNU=',
  '"lCppFqbkrlJ3EcVFAkeip0+44VaoJUymbnOaEUk7tEU=']
}))

app.use(helmet.frameguard({
  action: 'SAMEORIGIN',
  //domain: 'https://www.jehovahsays.net'
}))

app.use(helmet.noCache())

var options = {
    //key  : fs.readFileSync('ssl/key.pem'),
    //ca   : fs.readFileSync('ssl/csr.pem'),
    //cert : fs.readFileSync('ssl/cert.pem'),
	//cert : fs.readFileSync('ssl/signed.pem'),
	key  : fs.readFileSync('ssl/domainkey.pem'),
	ca   : fs.readFileSync('ssl/domaincsr.pem'),	
	cert : fs.readFileSync('ssl/domaincert.pem')	
}
var serverPort = 443;

var server = https.createServer(options, app);
var io = require('socket.io')(server);

// Redirect from http port 80 to https
var http = require('http');
http.createServer(function (req, res) {
    res.writeHead(301, { "Location": "https://" + req.headers['host'] + req.url });
    res.end();
}).listen(80);

app.use(express.static(__dirname + '/public'));

server.listen(serverPort, function() {
  console.log('HTTPS Server Actived');
});

// Chatroom

var numUsers = 0;

io.on('connection', function (socket) {
  var addedUser = false;


  // when the client emits 'new message', this listens and executes
  socket.on('new message', function (data) {
    // we tell the client to execute 'new message'
    socket.broadcast.emit('new message', {
      username: socket.username,
      message: data
    });
  });

  // when the client emits 'add user', this listens and executes
  socket.on('add user', function (username) {
    if (addedUser) return;

    // we store the username in the socket session for this client
    socket.username = username;
    ++numUsers;
    addedUser = true;
    socket.emit('login', {
      numUsers: numUsers
    });
    // echo globally (all clients) that a person has connected
    socket.broadcast.emit('user joined chat', {
      username: socket.username,
      numUsers: numUsers
    });
  });

  // when the client emits 'typing', we broadcast it to others
  socket.on('typing', function () {
    socket.broadcast.emit('user typing reply', {
      username: socket.username
    });
  });

  // when the client emits 'stop typing', we broadcast it to others
  socket.on('stop typing', function () {
    socket.broadcast.emit('user stop typing reply', {
      username: socket.username
    });
  });

  // when the user disconnects.. perform this
  socket.on('disconnect', function () {
    if (addedUser) {
      --numUsers;

      // echo globally that this client has left
      socket.broadcast.emit('user disconnected', {
        username: socket.username,
        numUsers: numUsers
      });
    }
  });
});

