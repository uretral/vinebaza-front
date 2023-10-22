var casper = require('casper').create({
    timeout: 80000,
    onTimeout: function() {
        this
            // .echo("NOPE.", "RED_BAR")
            .exit()
        ;
    },
    verbose: true,
    // logLevel: 'debug',
    // pageSettings: {
    //     userAgent: 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36'
    // }
});
casper.userAgent('Mozilla/5.0 (Linux; Android 4.0.4; Galaxy Nexus Build/IMM76B) AppleWebKit/535.19 (KHTML, like Gecko) Chrome/18.0.1025.133 Mobile Safari/535.19');
var url = casper.cli.args[0];


casper.options.viewportSize = {width: 1960, height: 30024};

casper.start(url);
/*
casper.then(function() {
    casper.capture("stackoverflow.png");
});
*/
var ob = {};
var ut = require('utils');
casper.then(function g(){
    this.open('https://www.vivino.com/api/wines/3052246/reviews_with_flavors?flavor_ids[]=306&flavor_ids[]=428&flavor_ids[]=210&flavor_ids[]=329&flavor_ids[]=261&flavor_ids[]=237&flavor_ids[]=256&flavor_ids[]=304&flavor_ids[]=396&per_page=10&page=1',{
        headers: {
            'accept' : 'application/json'
        }
    }).then(function(response) {
        this.echo('GOT it.');
        ut.dump(response);
        ut.dump(JSON.parse(this.page.plainText));

        this.echo(this.page.plainText);
/*        this.evaluate(function () {
            ob['iiii'] = [];
            ob['iiii'].push(this.page.plainText)
        })*/
    });

});
casper.then(function g(){
    this.open('https://www.vivino.com/api/wines/77021/tastes',{
        headers: {
            'accept' : 'application/json'
        }
    }).then(function(response) {
        this.echo('GOT it. tastes');
        ut.dump(response);
        ut.dump(JSON.parse(this.page.plainText));

        this.echo(this.page.plainText);
        /*        this.evaluate(function () {
                    ob['iiii'] = [];
                    ob['iiii'].push(this.page.plainText)
                })*/
    });

});
casper.then(function () {
    casper.wait(10000, function () {

    });

    var nodes = this.evaluate(function(){
        // return Array.prototype.slice.apply(document.querySelectorAll('.card__clickable--1NwNP')).length ;
        return [0,1,2,3,4,5,6];
    });



    // Now to iterate over that array of links
/*    this.each(nodes, function(self, el) {
        this.echo('uuuuuuuuuuuuu');
        casper.evaluate(function () {
            document.querySelectorAll('.card__clickable--1NwNP')[el].click();
        })
        // this.echo('selfselfselfselfselfselfselfselfself' + JSON.stringify(self));
        this.echo('elelelelelelelelelelelelelel' + JSON.stringify(el));

        // self.click();
/!*        self.thenClick(el,function () {

        })*!/
    });*/

/*    this.open('https://www.vivino.com/api/wines/3052246/reviews_with_flavors?flavor_ids[]=400&flavor_ids[]=353&per_page=10&page=1').then(function(response) {


        this.echo('GOT it.' + JSON.stringify(response));
    });*/


    var nodelist = this.evaluate(function() {
        return Array.prototype.slice.apply(document.querySelectorAll('.card__clickable--1NwNP')).length ;
    });
    var count = 0;



    this.repeat(nodelist, function() {

        this.thenEvaluate(function(count) {
            // setTimeout(function () {
                document.querySelectorAll('.card__clickable--1NwNP')[count].click();
            // },1000*count)

/*
            this.wait(1000,function () {
                this.echo('ggggggg' + count)

            })*/
/*            this.waitFor(function() {
                return this.evaluate(function() {
                    return document.querySelectorAll('.baseModal__lightBox--1ShWn')[count].classList.contains('transitions__enterActive--2VhmV') === false;
                });
            }, function then() {
                this.echo('ggggggg')

            });*/
        }, ++count);



    });


});

casper.thenEvaluate(function () {
    var tastesDiv = document.createElement('div');
    tastesDiv.classList.add('tastesMy');
   document.body.appendChild(tastesDiv);


    var revDiv1 = document.createElement('div');
    revDiv1.classList.add('reviewsMy1');
    document.body.appendChild(revDiv1);

    var revDiv2 = document.createElement('div');
    revDiv2.classList.add('reviewsMy2');
    document.body.appendChild(revDiv2);

    var revDiv3 = document.createElement('div');
    revDiv3.classList.add('reviewsMy3');
    document.body.appendChild(revDiv3);

    var revDiv4 = document.createElement('div');
    revDiv4.classList.add('reviewsMy4');
    document.body.appendChild(revDiv4);

    var revDiv5 = document.createElement('div');
    revDiv5.classList.add('reviewsMy5');
    document.body.appendChild(revDiv5);
});

/*casper.thenEvaluate(function () {
    var nodes = document.querySelectorAll('.card__clickable--1NwNP');
    Array.prototype.forEach.call(nodes, function (el, i) {


        casper.wait(1000, function () {
            el.click();
        });
        // setTimeout(function () {
        //
        // },500*i)

    });


});*/


/*casper.thenEvaluate(function () {
    //
    document.querySelectorAll('.card__clickable--1NwNP')[0].click();
})
casper.wait(1000,function () {
    this.evaluate(function () {
        modElem = document.querySelector('[data-testid="baseModalBackdrop"]');
        document.querySelector('.tastesMy').appendChild(modElem);
    });
})
casper.thenEvaluate(function () {
    document.querySelector('.baseModal__close--3j36q').click();
});*/
/*
casper.thenEvaluate(function () {
    var nodTastes = document.querySelector('#baseModal');
    var listTastes =  nodTastes.innerHTML;
    document.querySelector('.tastesMy').innerHTML = listTastes;
});


casper.thenEvaluate(function () {
/!*    var modCloses = document.querySelectorAll('..baseModal__close--3j36q');
    Array.prototype.forEach.call(modCloses, function (el, i) {
        setTimeout(function () {
            el.click();
        },200*i)

    });*!/
    document.querySelector('#baseModal').innerHTML = null;
});

// #1
casper.thenEvaluate(function () {
    //
    document.querySelectorAll('.communityReviews__rateWine--1v112 .RatingsFilter__counter--1wmJd')[0].click();
})
casper.wait(1000,function () {
    this.evaluate(function () {
        document.querySelector('.reviewsMy1').innerHTML = document.querySelector('#baseModal').innerHTML;
    });
})
casper.thenEvaluate(function () {
    document.querySelector('.baseModal__close--3j36q').click();
});
// #2

casper.thenEvaluate(function () {
    // document.querySelector('#baseModal').innerHTML = null;
    document.querySelectorAll('.communityReviews__rateWine--1v112 .RatingsFilter__counter--1wmJd')[1].click();
})
casper.wait(1000,function () {
    this.evaluate(function () {
        document.querySelector('.reviewsMy2').innerHTML = document.querySelector('#baseModal').innerHTML;
    });
})
casper.thenEvaluate(function () {
    document.querySelector('.baseModal__close--3j36q').click();
});
// #3


casper.thenEvaluate(function () {
    // document.querySelector('#baseModal').innerHTML = null;
    document.querySelectorAll('.communityReviews__rateWine--1v112 .RatingsFilter__counter--1wmJd')[2].click();
})
casper.wait(1000,function () {
    this.evaluate(function () {
        document.querySelector('.reviewsMy3').innerHTML = document.querySelector('#baseModal').innerHTML;
    });
})
casper.thenEvaluate(function () {
    document.querySelector('.baseModal__close--3j36q').click();
});
// #4

casper.thenEvaluate(function () {
    // document.querySelector('#baseModal').innerHTML = null;
    document.querySelectorAll('.communityReviews__rateWine--1v112 .RatingsFilter__counter--1wmJd')[3].click();
})
casper.wait(1000,function () {
    this.evaluate(function () {
        document.querySelector('.reviewsMy4').innerHTML = document.querySelector('#baseModal').innerHTML;
    });
});
casper.thenEvaluate(function () {
    document.querySelector('.baseModal__close--3j36q').click();
});
// #5

casper.thenEvaluate(function () {
    // document.querySelector('#baseModal').innerHTML = null;
    document.querySelectorAll('.communityReviews__rateWine--1v112 .RatingsFilter__counter--1wmJd')[4].click();
})
casper.wait(1000,function () {
    this.evaluate(function () {
        document.querySelector('.reviewsMy5').innerHTML = document.querySelector('#baseModal').innerHTML;
    });
})

casper.thenEvaluate(function () {
    document.querySelector('.baseModal__close--3j36q').click();
});
*/


/*casper.thenEvaluate(function () {

    function st(el,i) {
        setTimeout(function () {
            el.click();

            setTimeout(function () {
                modContent  = document.querySelector('#baseModal').innerHTML;
                document.querySelector('.reviewsMy1').innerHTML = modContent;
            }, 500)

        }, 1000 * i);
    }

    var modContent = '';
    var rev = document.querySelectorAll('.RatingsFilter__counter--1wmJd');
    Array.prototype.forEach.call(rev, function (el, i) {
        document.querySelector('#baseModal').innerHTML = null;
        st(el,i);
    });

});*/
/*casper.then(function () {
        for(var i = 0, len = 5; i < len; i++) {
            setTimeout(function() {
                document.querySelectorAll('.communityReviews__rateWine--1v112 .RatingsFilter__counter--1wmJd')[i].click();
            },1000*i);

        }
});
casper.then(function () {

});*/
casper.then(function() {

    // Get HTML
    var html = this.evaluate(function () {

        document.querySelector('head').remove();
        document.querySelector('#navigation-container').remove();
        document.querySelector('#footer-container').remove();


        // return document.querySelector("html").outerHTML;//#vintage-page-app
        // return document.querySelector(".items-container ").outerHTML;


    });


    // Save HTML
    // fs = require('fs');
    // fs.write(outputPath, html, 'w');

    // return html;
    // console.log('sesese');
    // console.log(html);

});


casper.run();
