// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'f648308ed0e789ce8b8f',
//     cluster: 'us3',
//     forceTLS: true
// });


// import Echo from "laravel-echo";
// import Pusher from "pusher-js";

// export default ({ app }, inject) => {
//     window.Pusher = Pusher;

//     const echo = new Echo({
//         broadcaster: "pusher",
//         key: 'f648308ed0e789ce8b8f',
//         cluster: 'us3',
//         forceTLS: true,
//     });

//     inject("echo", echo);
// };


// import Pusher from 'pusher-js';

// export default ({ app }, inject) => {
//   Pusher.logToConsole = true;

//   const pusher = new Pusher('6b4cb892db207bb6565c', {
//     cluster: 'mt1',
//   });

//   const channel = pusher.subscribe('my-channel');
//   inject('pusher', channel);
// };


import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

export default defineNuxtPlugin((nuxtApp) => {
    if (process.client) {
        window.Pusher = Pusher;

        const echo = new Echo({
            broadcaster: 'pusher',
            key: '6b4cb892db207bb6565c',
            cluster: 'mt1',
            forceTLS: true,
        });

        nuxtApp.provide('echo', echo);
    }
});
