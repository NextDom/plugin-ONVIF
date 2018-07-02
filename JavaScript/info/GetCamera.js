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
           xaddrs.push(cam.probeMatches.probeMatch.XAddrs);
       }
    }); 

    // show the number of addresses
    const listCount = xaddrs.length;
    xaddrs.unshift(listCount);
    xaddrsjson= JSON.stringify(xaddrs, null , ' ');
    // console.log('listCount:', listCount);
    console.log(xaddrsjson);
}



onvif.Discovery.on('device', function(cam,rinfo,xml){
    // function will be called as soon as NVT responses
test.push(cam);

});

onvif.Discovery.probe({timeout:1000,resolve:false});

sleep(1000).then(() => {

extract();

});
