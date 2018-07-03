var onvif = require('onvif');


var test = [];
var xaddrs = [];

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}


function extract() {
    test.forEach(cam => {
       const deviceAddress = cam.probeMatches.probeMatch.XAddrs;

       // only if the xaddrs is not in list yet, add it
       if(test.filter(xad => xad === deviceAddress).length <= 0) {
           adresse = cam.probeMatches.probeMatch.XAddrs;
           ip = adresse.split('/')[2].split(':')[0];
		   port = adresse.split('/')[2].split(':')[1];
		   xaddrs.push(ip);
		   xaddrs.push(port);
       }
    }); 

    // show the number of addresses
    const listCount = xaddrs.length/2;
    xaddrs.unshift(listCount);
    xaddrsjson= JSON.stringify(xaddrs, null , ' ');
    // console.log('listCount:', listCount);
    console.log(xaddrsjson);
}



onvif.Discovery.on('device', function(cam,rinfo,xml){
    // function will be called as soon as Cam responses
test.push(cam);

});

onvif.Discovery.probe({timeout:1000,resolve:false});

sleep(1000).then(() => {

extract();

});
