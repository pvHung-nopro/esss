import VueRouter from 'vue-router';
import Vue from 'vue';
import Home from './component/Home';
import Login from './component/Login';
import Dashboard from './component/Dashboard';

Vue.use(VueRouter)

export const routes = [
    {
        path:'/web/home',
        component: Home,
    },
    {
        path:'/web/login',
        component: Login,
    },
    {
        path:'/web/dashboard',
        component: Dashboard,
    },
];

