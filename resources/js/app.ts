import { createApp } from 'vue';
import App from './App.vue';
import StartMission from './pages/StartMission.vue';
import PlayMission from './pages/PlayMission.vue';
import router from './router';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

createApp(App).use(router).mount('#app');


