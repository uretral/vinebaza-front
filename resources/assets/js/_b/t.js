let response = await fetch("https://www.vivino.com/wine-regions/1406")
    .then(response => response.text()).then(text => {
        const parser = new DOMParser;
        const htmlDocument = parser.parseFromString(text, "text/html");
        const section = htmlDocument.documentElement.querySelector(".wrap");
        section.querySelectorAll('script').forEach(function (el) {
            if (el.innerHTML.includes(' window.__PRELOADED_STATE__.regionPageInformation')) {
                var code = el.innerHTML;
                eval(code);
            }
        });


    });
// let commits = await response;
console.log(window.__PRELOADED_STATE__.regionPageInformation);


await fetch('https://www.vivino.com/sauvignon-blanc/w/3052246?year=2016').then(response => response.text()).then(text => {const parser = new DOMParser;const htmlDocument = parser.parseFromString(text, 'text/html');const code = Array.from(htmlDocument.documentElement.querySelectorAll('script')).find(el => el.innerHTML.includes(' window.__PRELOADED_STATE__.vintagePageInformation'));eval(code.innerHTML);}); window.__PRELOADED_STATE__.vintagePageInformation;

console.log(window.__PRELOADED_STATE__.vintagePageInformation);

const section = htmlDocument.documentElement.querySelector('');
section.querySelectorAll('script').forEach(function (el) {
    if (el.innerHTML.includes(' window.__PRELOADED_STATE__.country')) {
        var code = el.innerHTML;
        eval(code);
    }
});


let response = await fetch("https://www.vivino.com/api/wineries/186663/vintages?language=en");
let commits = await response.json();
console.log(commits);

let response = await fetch("https://www.vivino.com/paddle-creek-sauvignon-blanc/w/3052246");
let commits = await response.json();
console.log(commits);

let response = await fetch("https://www.vivino.com/wines/1468338/reviews_with_flavors?flavor_ids%5B0%5D=91&flavor_ids%5B1%5D=123&per_page=50&page=1&language=en");
let commits = await response.json();
console.log(commits);


let response = await fetch("https://www.vivino.com/api/vintages/141147816").then(response => response.json()).then(json => json.vintage);
let commits = await response.json();

