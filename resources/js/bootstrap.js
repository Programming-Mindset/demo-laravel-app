import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'XXXXXXXXXXXXXXXXXXX',
    cluster: 'ap1',
    forceTLS: true
});


