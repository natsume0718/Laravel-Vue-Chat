require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue';
//スクロール用
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
                user: [],
                time: []
            }
        }
    },
    methods: {
        send() {
            if (this.message.length > 1) {
                this.chat.message.push(this.message);
                this.chat.user.push(GlobalInfo.user.name);
                this.chat.time.push(this.getTime());

                axios.post('send', {
                        message: this.message
                    })
                    .then(response => {

                    })
                    .catch(error => {
                        console.log('エラー');
                    });
                this.message = '';
            }
        },
        getTime() {
            const time = new Date();
            return time.getHours() + ':' + time.getMinutes();
        }
    },
    mounted() {
        Echo.private('chat')
            .listen('ChatEvent', (e) => {
                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
                this.chat.time.push(e.time);
            });
    }
});