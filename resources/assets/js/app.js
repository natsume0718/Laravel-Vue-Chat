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
                message: [],
            }
        }
    },
    methods: {
        send() {
            if (this.message.length > 0) {
                this.chat.message.push(this.message);

                axios.post('send', {
                        message: this.message
                    })
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.log('エラー');
                        console.log(error);
                    });
                this.message = '';
            }
        }
    },
    mounted() {
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.message.push(e.message);
            });
    }
});