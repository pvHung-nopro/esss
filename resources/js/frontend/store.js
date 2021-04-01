import Vue from 'vue';
import Vuex from 'Vuex';

Vue.use(Vuex)

export const store = new Vuex.Store({
    state: {
        token: localStorage.getItem('auth') || '',
        session: localStorage.getItem('rand_code') || '' ,
    },
    mutations: {
       setToken(state,token) {
           localStorage.setItem('auth',token);
           state.token = token;
       },
       clearToken(state){
           localStorage.removeItem('auth');
           state.token = '';
       },
       setSession(state,session){
        localStorage.setItem('rand_code',session);
        state.session = session;
       },
       clearToken(state)
       {
        localStorage.removeItem('rand_code');
        state.token = '';
       }
    }
  })
