import axios from 'axios';
import Echo from 'laravel-echo'
window.axios = axios;
import dotenv from dotenv
dotenv();

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.PUSHER_APP_KEY,
    cluster:process.env.PUSHER_APP_CLUSTER,
    
});

window.Pusher = require("pusher-js");

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

