var http = require('http');
var Cam = require('./onvif').Cam;
var parseArgs = require('minimist');

minimistoptions= {string:['Port']};


var DATA = require('minimist')(process.argv.slice(2),minimistoptions);
delete DATA['_'];


var CAMERA_HOST = DATA.IPadress,
	USERNAME = DATA.Username,
	PASSWORD = DATA.Password,
	PORT = DATA.Port,
	Xspeed = DATA.Xspeed,
	Yspeed = DATA.Yspeed,
	Zspeed = DATA.Zspeed,
	X = DATA.X,
	Y = DATA.Y,
	Z = DATA.Z;


new Cam({
	hostname: CAMERA_HOST,
	username: USERNAME,
	password: PASSWORD,
	port: PORT
}, function(err) {
	if (err) {
		console.log('Connection Failed for ' + CAMERA_HOST + ' Port: ' + PORT + ' Username: ' + USERNAME + ' Password: ' + PASSWORD);
		return;
	}

this.relativeMove({x:X,y:Y,zoom:Z,speed:{x:Xspeed, y:Yspeed , zoom:Zspeed}},function(err, relmove) {console.log(relmove)});
});
