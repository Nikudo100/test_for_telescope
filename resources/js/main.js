import { createApp } from 'vue';
import App from './components/App.vue';
import axios from 'axios';

createApp(App).use(axios).mount('#app');
