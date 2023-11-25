import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;
window.Echo = new Echo({
    cluster: 'mt1',
    broadcaster: 'pusher',
    key: 12345,
    // cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: false,
    wsHost: window.location.hostname,
    wsPort: 6001,
});

window.Echo.channel('events')
    .listen('.RealTimeMessage', (e) => {
        console.log(e);
    });
console.log('lkjhg');

import {Livewire, Alpine } from '../../../vendor/livewire/livewire/dist/livewire.esm.js'
import.meta.glob(['../img/**',]);

import './alpine-components/vivino-parser'

Livewire.start()
