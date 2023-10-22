var casper = require('casper').create({
    timeout: 80000,
    onTimeout: function () {
        this.echo("NOPE.", "RED_BAR").exit();
    },
    verbose: true,
});
casper.userAgent('Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19');
var url = casper.cli.args[0], ob = {}, utils = require('utils');

var wine_id = 0;
var vintage_id = 0;
var tastes = '';
var slides = [];
var html = '';
var main = {}

function rt() {
    var nodes = document.querySelectorAll('.tasteNote__iconContainer--1GBUg');
    const serializer = new XMLSerializer();
    return Array.prototype.map.call(nodes, function (el, i) {

        var f = document.querySelectorAll('.tasteNote__iconContainer--1GBUg')[i].outerHTML;
        var parser = new DOMParser();
        var doc = parser.parseFromString(f, "image/svg+xml");
        var y = doc
        /*        console.log(doc);
                console.log(doc.querySelector('svg').outerHTML);*/

        /*        var parser = new DOMParser();
                // var doc = parser.parseFromString(el.innerHTML, "image/svg+xml");
                var doc = parser.parseFromString(el, "image/svg+xml");*/
        return {
            key: i,
            color: el.getAttribute('style'),
            icon: y
        }
    });
}


/*

        if(n.hasOwnProperty('primary_keywords')) {
           return n
       }

*/


/*.map(function (m) {
    if(m.hasOwnProperty('id')) {
        return m
    }
});*/


// var arr = main.tastes.tastes.flavor.map(function (n) {
//     return n.primary_keywords.map(function (m) {
//         if(m.hasOwnProperty('id')) {
//             return m
//         }
//
//
//     });
//
// });

casper.options.viewportSize = {width: 1960, height: 10024};

casper.start(url);
/*.wait(2000, function () {
    utils.dump('iiiiiiiiiiiii');
})*/

// MAIN INFO
casper.then(function () {
    var info = this.evaluate(function () {
        if (window.__PRELOADED_STATE__.winePageInformation) {
            return window.__PRELOADED_STATE__.winePageInformation;
        } else if (window.__PRELOADED_STATE__.vintagePageInformation) {
            return window.__PRELOADED_STATE__.vintagePageInformation
        } else {
            return false
        }
    });
    main['info'] = info;
    wine_id = info.vintage.wine.id;
    vintage_id = info.vintage.id;
});
// TASTES
casper.then(function () {
    this.open('https://www.vivino.com/api/wines/' + wine_id + '/tastes', {
        headers: {
            'accept': 'application/json'
        }
    }).then(function (response) {
        main['tastes'] = JSON.parse(this.page.plainText);
    });

    // console.log(tastes);

})
casper.wait(2000, function () {

});
/*casper.then(function () {
        // var slides = this.evaluate(rt);
       // console.log('yyyyyy ' , JSON.stringify(slides));
    })*/
casper.then(function () {
    var arReviews = [];

    var arUrl = this.evaluate(makeUrl, main.tastes.tastes.flavor, wine_id)

    this.each(arUrl,function (self, link) {
        self.thenOpen(link, {
            headers: {
                'accept': 'application/json'
            }
        },function() {
            arReviews.push(JSON.parse(this.page.plainText))
            // this.echo(JSON.stringify();
        });
    })
    main['tastesReview'] = arReviews;

    // console.log('erer', JSON.stringify(arUrl));
})
casper.then(function () {
    var arReviewsUrl = this.evaluate(makeReviewsByScore,main.info.vintage.year,wine_id)
    var arReviewsByScore = [];

    this.each(arReviewsUrl,function (self, link) {
        this.wait(1000,function () {
            self.thenOpen(link, {
                headers: {
                    'accept': 'application/json'
                }
            },function() {
                arReviewsByScore.push(JSON.parse(this.page.plainText))
                // this.echo(JSON.stringify();
            });
        })

    })

    main['scoredReview'] = arReviewsByScore;

})
casper.then(function () {
    // utils.dump('slides ' + html)
    // utils.dump('wine_id ' + wine_id)
    // utils.dump('vintage_id ' + vintage_id)
    // // utils.dump('tastes ' + tastes)
    utils.dump(main)
})

casper.run();

function makeUrl(data, wine_id) {
    function sub(subData) {
        var str = 'https://www.vivino.com/api/wines/' + wine_id + '/reviews_with_flavors?';
        for (var b in subData) {
            if (subData[b].hasOwnProperty('id')) {
                str += 'flavor_ids[]=' + subData[b].id + '&'
            }
        }
        return str + 'per_page=10&page=1'
    }

    var p1 = [];
    for (var a in data) {
        if (data[a].hasOwnProperty('primary_keywords')) {
            p1[a] = sub(data[a].primary_keywords)
        } else if (data[a].hasOwnProperty('secondary_keywords')) {
            p1[a] = sub(data[a].secondary_keywords)
        }
    }
    return p1

}

function makeReviewsByScore(year,vineID) {
    var arUrl = [];
    for(var i = 1, len = 5; i <= len; i++) {
        arUrl.push('https://www.vivino.com/api/wines/'+vineID+'/reviews?year='+year+'&ratings[]='+i+'&per_page=20&page=1')
    }
    return arUrl;
}

function getQuery( queryString ) {
    var q = queryString.split("?");
    //делим строку по & - parama1=1
    var vars = q[1].split("&");
    var arr = new Array();
    //переводим массив vars в обычный ассоциативный массив
    for (var i=0;i<vars.length;i++)
    {
        //делим параметр со значением по =, и пишем в ассоциативный массив arr['param1'] = 1
        var pair = vars[i].split("=");
        arr[pair[0]] = pair[1];
    }
    return arr.q;
}
