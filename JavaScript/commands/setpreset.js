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
	PRESETNAME = DATA.PresetName;


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

this.setPreset({presetName:PRESETNAME},function(err, setpreset) {console.log(setpreset)});
});
