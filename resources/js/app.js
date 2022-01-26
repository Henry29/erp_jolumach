require('./bootstrap');

window.Vue = require('vue');


Vue.component('app-init', require('./AppInit.vue').default);
Vue.component('app-departamento', require('./views/ubigeo/Departamento.vue').default);
Vue.component('app-provincia', require('./views/ubigeo/Provincia.vue').default);
Vue.component('app-distrito', require('./views/ubigeo/Distrito.vue').default);
Vue.component('app-docIdentidad', require('./views/TypeDocumentIdentify.vue').default);
Vue.component('app-tipSocio', require('./views/TipoSocio.vue').default);
Vue.component('app-insEducativa', require('./views/InstitucionEducativa.vue').default);


import VueRouter from 'vue-router'
Vue.use(VueRouter)

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
Vue.use(Vuetify)

import App from './AppInit';
import Login from './views/session/Login'
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
import TipoSocio from './views/TipoSocio'
import SolicitudIngreso from './views/SolicitudIngreso'


import auth from './middleware/auth';
import log from './middleware/log';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: Dashboard,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                middleware: log,
            },
        },
        {
            path: '/tipoDocumentoIdentidad',
            name: 'typeDocumentIdentify',
            component: TypeDocumentIdentify,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/ubigeo',
            name: 'ubigeo',
            component: Ubigeo,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoVivienda',
            name: 'tipoVivienda',
            component: TipoVivienda,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/gradoEstudios',
            name: 'gradoEstudios',
            component: GradoEstudios,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/profesion',
            name: 'profesion',
            component: Profesion,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/ugel',
            name: 'ugel',
            component: Ugel,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoPlanilla',
            name: 'tipoPlanilla',
            component: TipoPlanilla,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoConvenio',
            name: 'tipoConvenio',
            component: TipoConvenio,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/institucionEducativa',
            name: 'institucionEducativa',
            component: InstitucionEducativa,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoInstitucionEducativa',
            name: 'tipoInstitucionEducativa',
            component: TipoInstitucionEducativa,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoZona',
            name: 'tipoZona',
            component: TipoZona,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoVia',
            name: 'tipoVia',
            component: TipoVia,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoCargo',
            name: 'tipoCargo',
            component: TipoCargo,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoContratoLaboral',
            name: 'tipoContratoLaboral',
            component: TipoContratoLaboral,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/regimenLaboral',
            name: 'regimenLaboral',
            component: RegimenLaboral,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoRegimenPensionario',
            name: 'tipoRegimenPensionario',
            component: TipoRegimenPensionario,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoDiscapacidad',
            name: 'tipoDiscapacidad',
            component: TipoDiscapacidad,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/tipoSocio',
            name: 'tipoSocio',
            component: TipoSocio,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/solicitudIngreso',
            name: 'solicitudIngreso',
            component: SolicitudIngreso,
            meta: {
                middleware: [auth, log],
            },
        }
    ],
});

function nextFactory(context, middleware, index) {
    const subsequentMiddleware = middleware[index];
    // If no subsequent Middleware exists,
    // the default `next()` callback is returned.
    if (!subsequentMiddleware) return context.next;

    return (...parameters) => {
        // Run the default Vue Router `next()` callback first.
        context.next(...parameters);
        // Then run the subsequent Middleware with a new
        // `nextMiddleware()` callback.
        const nextMiddleware = nextFactory(context, middleware, index + 1);
        subsequentMiddleware({ ...context, next: nextMiddleware });
    };
}

router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
            ? to.meta.middleware
            : [to.meta.middleware];

        const context = {
            from,
            next,
            router,
            to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({ ...context, next: nextMiddleware });
    }

    return next();
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: { App },
    template: '<App/>',
    vuetify: new Vuetify({

    }),
});

