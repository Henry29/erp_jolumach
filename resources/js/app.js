require('./bootstrap');

window.Vue = require('vue');


Vue.component('app-init', require('./AppInit.vue').default);

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

import VueI18n from 'vue-i18n'
Vue.use(VueI18n)

import es from "./locale/es";

const messages = {
    es: es
}

const i18n = new VueI18n({
    locale: 'es', // set locale
    messages, // set locale messages
})

import Dashboard from './views/Dashboard'
import TypeDocumentIdentify from './views/TypeDocumentIdentify'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard
        },
        {
            path: '/tipoDocumentoIdentidad',
            name: 'typeDocumentIdentify',
            component: TypeDocumentIdentify,
        }
    ],
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    vuetify: new Vuetify({
        lang: {
            t: (key, ...params) => i18n.t(key, params)
        }
    }),
});
