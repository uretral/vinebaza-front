import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);
const store = new Vuex.Store({
    state: {
        donor: localStorage.getItem('donor') ? localStorage.getItem('donor') : '',
        category:localStorage.getItem('category') ? localStorage.getItem('category') : '',
        pagesStart:localStorage.getItem('pagesStart') ? localStorage.getItem('pagesStart') : 1,
        pagesCount:localStorage.getItem('pagesCount') ? localStorage.getItem('pagesCount') : 0,
        pagesCurrent:localStorage.getItem('pagesCurrent') ? localStorage.getItem('pagesCurrent') : 1,
        proxy:localStorage.getItem('proxy') ? localStorage.getItem('proxy') : 1,

        vivinoStart:localStorage.getItem('vivinoStart') ? localStorage.getItem('vivinoStart') : 1,
        vivinoPerSeance:localStorage.getItem('vivinoPerSeance') ? localStorage.getItem('vivinoPerSeance') : 10,
        vivinoCurrent:localStorage.getItem('vivinoCurrent') ? localStorage.getItem('vivinoCurrent') : 0,
        comparisonStart:localStorage.getItem('comparisonStart') ? localStorage.getItem('comparisonStart') : 0,
        comparisonLimit:localStorage.getItem('comparisonLimit') ? localStorage.getItem('comparisonLimit') : 10,
    },
    getters: {
        donor(state){
            return state.donor;
        },
        category(state){
            return state.category;
        },
        pagesCount(state){
            return state.pagesCount;
        },
        pagesStart(state){
            return state.pagesStart;
        },
        pagesCurrent(state){
            return state.pagesCurrent;
        },
        proxy(state){
            return state.proxy;
        },
        vivinoStart(state){
            return state.vivinoStart;
        },
        vivinoPerSeance(state){
            return state.vivinoPerSeance;
        },
        vivinoCurrent(state){
            return state.vivinoCurrent;
        },
        vivinoPagesCount(state){
            return state.vivinoPagesCount = 0;
        },

        comparisonStart(state){
            return state.comparisonStart;
        },
        comparisonLimit(state){
            return state.comparisonLimit;
        }
    },
    mutations: {
        donor(state,payload){
            localStorage.setItem('donor',payload);
            return state.donor = Number(localStorage.getItem('donor'));
        },
        category(state,payload){
            localStorage.setItem('category',payload);
            return state.category = Number(localStorage.getItem('category'));
        },
        pagesCount(state,payload){
            localStorage.setItem('pagesCount',payload);
            return state.pagesCount = Number(localStorage.getItem('pagesCount'));
        },
        pagesStart(state,payload){
            localStorage.setItem('pagesStart',payload);
            return state.pagesStart = Number(localStorage.getItem('pagesStart'));
        },
        pagesCurrent(state,payload){
            localStorage.setItem('pagesCurrent',payload);
            return state.pagesCurrent = Number(localStorage.getItem('pagesCurrent'));
        },
        proxy(state,payload){
            localStorage.setItem('proxy',payload);
            return state.proxy = localStorage.getItem('proxy');
        },
        vivinoStart(state,payload){
            localStorage.setItem('vivinoStart',payload);
            return state.vivinoStart = localStorage.getItem('vivinoStart');
        },
        vivinoPerSeance(state,payload){
            localStorage.setItem('vivinoPerSeance',payload);
            return state.vivinoPerSeance = localStorage.getItem('vivinoPerSeance');
        },
        vivinoCurrent(state,payload){
            localStorage.setItem('vivinoCurrent',payload);
            return state.vivinoCurrent = localStorage.getItem('vivinoCurrent');
        },
        vivinoPagesCount(state,payload){
            localStorage.setItem('vivinoPagesCount',payload);
            return state.vivinoPagesCount = localStorage.getItem('vivinoPagesCount');
        },

        comparisonStart(state,payload){
            localStorage.setItem('comparisonStart',payload);
            return state.comparisonStart = localStorage.getItem('comparisonStart');
        },
        comparisonLimit(state,payload){
            localStorage.setItem('comparisonLimit',payload);
            return state.comparisonLimit = localStorage.getItem('comparisonLimit');
        },
    },
    actions: {


    }
});
export default store;

// 125.123.154.11	38801	CN	China	Socks4	Anonymous	Yes	4 seconds ago
// 159.192.192.249	4145	TH	Thailand	Socks4	Anonymous	Yes	4 seconds ago
// 185.85.152.243	1080	AL	Albania	Socks4	Anonymous	Yes	4 seconds ago
// 113.53.125.145	59756	TH	Thailand	Socks4	Anonymous	Yes	4 seconds ago
// 59.58.87.231	38801	CN	China	Socks4	Anonymous	Yes	4 seconds ago
// 131.108.44.41	4145	BR	Brazil	Socks4	Anonymous	Yes	4 seconds ago
// 1.9.111.145	4145	MY	Malaysia	Socks4	Anonymous	Yes	4 seconds ago
// 218.21.96.128	51080	CN	China	Socks4	Anonymous	Yes	4 seconds ago
// 103.106.193.41	42738	IN	India	Socks4	Anonymous	Yes	4 seconds ago
// 125.25.57.33	42801	TH	Thailand	Socks4	Anonymous	Yes	4 seconds ago
// 103.250.167.226	46665	IN	India	Socks4	Anonymous	Yes	4 seconds ago
// 36.67.63.239	38071	ID	Indonesia	Socks4	Anonymous	Yes	4 seconds ago
// 222.184.254.170	40044	CN	China	Socks4	Anonymous	Yes	4 seconds ago
// 190.128.166.50	48902	PY	Paraguay	Socks4	Anonymous	Yes	4 seconds ago
// 213.57.114.89	43039	IL	Israel	Socks4	Anonymous	Yes	4 seconds ago
// 86.34.218.13	43688	RO	Romania	Socks4	Anonymous	Yes	4 seconds ago
// 213.32.253.117	56056	IQ	Iraq	Socks4	Anonymous	Yes	4 seconds ago
// 200.63.34.193	47487	AR	Argentina	Socks4	Anonymous	Yes	4 seconds ago
// 49.12.4.194	25677	DE	Germany	Socks4	Anonymous	Yes	4 seconds ago
// 200.178.103.86	4145	BR	Brazil	Socks4	Anonymous	Yes	4 seconds ago
