import './bootstrap';
import { createApp } from 'vue';
import FollowButton from './components/FollowButton.vue';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

const app = createApp({});
app.component('FollowButton', FollowButton);
app.mount('#app');
