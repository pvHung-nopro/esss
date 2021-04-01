import VueRouter from 'vue-router';
import Vue from 'vue';
import login from './components/login';
import register from './components/register';
import rand from './components/rand';

Vue.use(VueRouter)

export const routes = [
    {
        path:'login',
        component: login,
    },
    {
        path:'register',
        component: register,
    },
    {
        path:'rand',
        component: rand,
    },
];

