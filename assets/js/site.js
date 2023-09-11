// import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'; // development
import { createApp } from 'https://unpkg.com/vue@3/dist/vue.esm-browser.prod.js'; // production

createApp({
    data() {
        return { message: 'Hello Vue!' }
    },

    delimiters: ['${', '}']
}).mount('#app');