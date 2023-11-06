import {createRouter, createWebHistory} from 'vue-router';
import client from "./client.js";


const routes = [...client];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach( async(to, from) => {
})

export default router;
