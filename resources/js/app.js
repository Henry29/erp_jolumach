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
import TipoVivienda from './views/TipoVivienda'
import GradoEstudios from './views/GradoEstudios'
import Profesion from './views/Profesion'
import Ugel from './views/Ugel'
import TipoPlanilla from './views/TipoPlanilla'
import TipoConvenio from './views/TipoConvenio'
import InstitucionEducativa from './views/InstitucionEducativa'
import TipoInstitucionEducativa from './views/TipoInstitucionEducativa'
import TipoZona from './views/TipoZona'
import TipoVia from './views/TipoVia'
import TipoCargo from './views/TipoCargo'
import TipoContratoLaboral from './views/TipoContratoLaboral'
import RegimenLaboral from './views/RegimenLaboral'
import TipoRegimenPensionario from './views/TipoRegimenPensionario'
import TipoDiscapacidad from './views/TipoDiscapacidad'

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
        },
        {
            path: '/tipoVivienda',
            name: 'tipoVivienda',
            component: TipoVivienda,
        },
        {
            path: '/gradoEstudios',
            name: 'gradoEstudios',
            component: GradoEstudios,
        },
        {
            path: '/profesion',
            name: 'profesion',
            component: Profesion,
        },
        {
            path: '/ugel',
            name: 'ugel',
            component: Ugel,
        },
        {
            path: '/tipoPlanilla',
            name: 'tipoPlanilla',
            component: TipoPlanilla,
        },
        {
            path: '/tipoConvenio',
            name: 'tipoConvenio',
            component: TipoConvenio,
        },
        {
            path: '/institucionEducativa',
            name: 'institucionEducativa',
            component: InstitucionEducativa,
        },
        {
            path: '/tipoInstitucionEducativa',
            name: 'tipoInstitucionEducativa',
            component: TipoInstitucionEducativa,
        },
        {
            path: '/tipoZona',
            name: 'tipoZona',
            component: TipoZona,
        },
        {
            path: '/tipoVia',
            name: 'tipoVia',
            component: TipoVia,
        },
        {
            path: '/tipoCargo',
            name: 'tipoCargo',
            component: TipoCargo,
        },
        {
            path: '/tipoContratoLaboral',
            name: 'tipoContratoLaboral',
            component: TipoContratoLaboral,
        },
        {
            path: '/regimenLaboral',
            name: 'regimenLaboral',
            component: RegimenLaboral,
        },
        {
            path: '/tipoRegimenPensionario',
            name: 'tipoRegimenPensionario',
            component: TipoRegimenPensionario,
        },
        {
            path: '/tipoDiscapacidad',
            name: 'tipoDiscapacidad',
            component: TipoDiscapacidad,
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
