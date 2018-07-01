var onvif = require('onvif');


var test = [];
var xaddrs = [];

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}


function extract() {
    test.forEach(cam => {
       xaddrs.push(cam.probeMatches.probeMatch.XAddrs);
    }); 

    // now you have an array containing only the XAddrs elements
    console.log(xaddrs);

    json = JSON.stringify({xaddrs}, null , ' ');
    console.log(json);
}



onvif.Discovery.on('device', function(cam,rinfo,xml){
    // function will be called as soon as NVT responses
test.push(cam);

});

onvif.Discovery.probe({timeout:1000,resolve:false});

sleep(1000).then(() => {

extract();

});
