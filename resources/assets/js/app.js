require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';

import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)

Vue.component('message', require('./components/Message.vue'));

const app = new Vue({
    el: '#app',
    data() {
        return {
            message: '',
            chat: {
                message: []
            }
        }
    },
    methods: {
        send() {
            if (this.message.length > 0) {
                this.chat.message.push(this.message);
                this.message = '';
            }
        }
    },
});