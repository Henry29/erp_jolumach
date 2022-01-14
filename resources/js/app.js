require('./bootstrap');

window.Vue = require('vue');


Vue.component('app-init', require('./AppInit.vue').default);
Vue.component('app-departamento', require('./views/ubigeo/Departamento.vue').default);
Vue.component('app-provincia', require('./views/ubigeo/Provincia.vue').default);
Vue.component('app-distrito', require('./views/ubigeo/Distrito.vue').default);

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

import Dashboard from './views/Dashboard'
import TypeDocumentIdentify from './views/TypeDocumentIdentify'
import Ubigeo from './views/Ubigeo'

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
        },
        {
            path: '/ubigeo',
            name: 'ubigeo',
            component: Ubigeo,
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

    }),
});
