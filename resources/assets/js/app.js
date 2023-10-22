import {Livewire, Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm.js'
import.meta.glob(['../img/**',]);

import './alpine-components/select'
import './alpine-components/ranger.js'
import './alpine-components/select-horizontal'
import './alpine-components/is-visible'



Livewire.start()

// require('./bootstrap');


import axios  from "axios";
window.axios = axios
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import Vue from 'vue';
import store from './store/index';
import HeyUI from 'heyui';

import 'heyui/themes/index.css'
window.Vue = Vue;
window.Vue.use(HeyUI);
import ParserContainer from './vue-components/ParserContainer.vue'
import VivinoParser from './vue-components/VivinoParser.vue'
Vue.component('ParserContainer', ParserContainer);
Vue.component('VivinoParser', VivinoParser);

const app = new Vue({
    el:'#app',
    store:store
});
