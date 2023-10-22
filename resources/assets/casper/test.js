var casper = require('casper').create();
casper.userAgent('Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19');
var url = casper.cli.args[0];
var outputPath = casper.cli.args[1];
casper.start('https://www.vivino.com/liesch-vuela-la-mancha/w/7166270?year=2021');
casper.then(function() {
    casper.wait(5000, function() {
        // Get HTML
        var html = this.evaluate(function(){
            return document.querySelector(".container.container-fluid.product").outerHTML; // ".items-container"
        });
        // Save HTML
        // fs = require('fs');
        // fs.write('/home/murin/_dev/_Denis/vinobaza/vinobaza-front/htmlItem.txt', html, 'w');

        console.log(html);
    });
});

casper.run();
