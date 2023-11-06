import './bootstrap';
import App from '@/App.vue';
import {createApp} from "vue";
// import {createPinia} from 'pinia';
import router from "@/router/index.js";
import globalComponent from './appCore.js';
import axios from "axios";

window.axios = axios;

// const pinia = createPinia();

const app = createApp(App);

app.use(globalComponent);
app.use(router);
// app.use(pinia);

app.mount("#app");

