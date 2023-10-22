var casper = require('casper').create({
    timeout: 80000,
    onTimeout: function() {
        this
            .echo("NOPE.", "RED_BAR")
            .exit()
        ;
    },
    verbose: true,
    logLevel: 'debug',
    pageSettings: {
        userAgent: 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36'
    }
});
var name = casper.cli.args[0];
var text = name.replace(/::/g," ");

casper.options.viewportSize = {width: 1280, height: 10024};

casper.start('https://www.vivino.com/search/wines?q='+text);
// casper.then(function() {
//     casper.capture("stackoverflow.png");
// });
casper.then(function () {
    casper.wait(5000, function () {
        console.log('eeeeeeee');
        // Get HTML
        var html = this.evaluate(function () {
            return document.querySelector(".search-page__content").outerHTML;
            // return document.querySelector(".items-container ").outerHTML;
        });
        // Save HTML
        // fs = require('fs');
        // fs.write(outputPath, html, 'w');

        // return html;
        console.log(html);
    });
});
casper.run();
