require('./bootstrap');

window.Vue = require('vue');

/* --------------------------- Components Generals -------------------------- */
Vue.component('app-init', require('./AppInit.vue').default);
Vue.component('app-departamento', require('./views/ubigeo/Departamento.vue').default);
Vue.component('app-provincia', require('./views/ubigeo/Provincia.vue').default);
Vue.component('app-distrito', require('./views/ubigeo/Distrito.vue').default);
Vue.component('app-docIdentidad', require('./views/TypeDocumentIdentify.vue').default);
Vue.component('app-tipSocio', require('./views/TipoSocio.vue').default);
Vue.component('app-insEducativa', require('./views/InstitucionEducativa.vue').default);
Vue.component('app-tipoVivienda', require('./views/TipoVivienda.vue').default);
Vue.component('app-gradoEstudios', require('./views/GradoEstudios.vue').default);
Vue.component('app-profesion', require('./views/Profesion.vue').default);
Vue.component('app-parentesco', require('./views/Parentesco.vue').default);
Vue.component('app-ugel', require('./views/Ugel.vue').default);
Vue.component('app-tipoPlanilla', require('./views/TipoPlanilla.vue').default);
Vue.component('app-cargo', require('./views/TipoCargo.vue').default);
Vue.component('app-tipoContrato', require('./views/TipoContratoLaboral.vue').default);
Vue.component('app-regimenLaboral', require('./views/RegimenLaboral.vue').default);
Vue.component('app-regimenPensionario', require('./views/TipoRegimenPensionario.vue').default);
Vue.component('app-riesgoCrediticio', require('./views/RiesgoCrediticio.vue').default);
/* -------------------------------- Admision -------------------------------- */
Vue.component('app-solicitudIngreso', require('./views/SolicitudIngreso.vue').default);
/* -------------------- // Components TramiteDocumentario ------------------- */
Vue.component('app-TramiteDocumentario', require('./views/TramiteDocumentario/SolicitudTramiteDocumentario.vue').default);
Vue.component('app-tramite_areacooperativa', require('./views/TramiteDocumentario/AreaCooperativa.vue').default);
Vue.component('app-tramite_calificacion', require('./views/TramiteDocumentario/Calificacion.vue').default);
Vue.component('app-tramite_prioridad', require('./views/TramiteDocumentario/Prioridad.vue').default);
Vue.component('app-tramite_tipodocumento', require('./views/TramiteDocumentario/TipoDocumento.vue').default);
Vue.component('app-tramite_tipotramite', require('./views/TramiteDocumentario/TipoTramite.vue').default);
Vue.component('app-tramite_motivotramite', require('./views/TramiteDocumentario/MotivoTramite.vue').default);
Vue.component('app-tramite_requisitotramite', require('./views/TramiteDocumentario/RequisitoTramite.vue').default);
/* ------------------------- Componentes Modulo web ------------------------- */
Vue.component('app-convenios', require('./views/Web/Convenios.vue').default);
Vue.component('app-productos', require('./views/Web/Productos.vue').default);
/* ---------------------- Componentes Modulo Electoral ---------------------- */
Vue.component('app-electoral', require('./views/Electoral/Candidato.vue').default);


/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
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
import Parentesco from './views/Parentesco'
import RiesgoCrediticio from './views/RiesgoCrediticio'

/* -------------------------------------------------------------------------- */
// Modulo Admision
/* -------------------------------------------------------------------------- */
import BuscarSolicitudIngreso from './views/BuscarSolicitudIngreso'

/* -------------------------------------------------------------------------- */
// Modulo tramite documentario
/* -------------------------------------------------------------------------- */
import TramiteDocumentario from './views/TramiteDocumentario/SolicitudTramiteDocumentario'
import Tramite_AreaCooperativa from './views/TramiteDocumentario/AreaCooperativa'
import Tramite_Calificacion from './views/TramiteDocumentario/Calificacion'
import Tramite_Prioriad from './views/TramiteDocumentario/Prioridad'
import Tramite_TipoDocumento from './views/TramiteDocumentario/TipoDocumento'
import Tramite_TipoTramite from './views/TramiteDocumentario/TipoTramite'
import Tramite_MotivoTramite from './views/TramiteDocumentario/MotivoTramite'
import Tramite_RequisitoTramite from './views/TramiteDocumentario/RequisitoTramite'
/* -------------------------------------------------------------------------- */
// Modulo Web
/* -------------------------------------------------------------------------- */
import Convenios from './views/Web/Convenios'
import Productos from './views/Web/Productos'
/* -------------------------------------------------------------------------- */
// Modulo Electoral
/* -------------------------------------------------------------------------- */
import Candidato from './views/Electoral/Candidato'


/* -------------------------------------------------------------------------- */
// Gestion Usuarios
/* -------------------------------------------------------------------------- */
import Usuario from './views/session/Usuario'

/*
//Caja npm run watch
 */
import CajaApertura from './views/Caja/CajaApertura'
/* -------------------------------------------------------------------------- */
/* -------------------------------------------------------------------------- */
import auth from './middleware/auth';
import log from './middleware/log';

const router = new VueRouter({
    mode: 'history',
    routes: [{
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
        // Tipo Covenios
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
        //  Parentestco
        {
            path: '/parentesco',
            name: 'parentesco',
            component: Parentesco,
            meta: {
                middleware: [auth, log],
            },
        },
        //  Riesgo Crediticio
        {
            path: '/riesgoCrediticio',
            name: 'riesgoCrediticio',
            component: RiesgoCrediticio,
            meta: {
                middleware: [auth, log],
            },
        },

         /* -------------------------------------------------------------------------- */
        // Modulo Admision
        /* -------------------------------------------------------------------------- */
        // Solicitud Admision
        {
            path: '/solicitudIngreso',
            name: 'solicitudIngreso',
            component: SolicitudIngreso,
            meta: {
                middleware: [auth, log],
            },
        },
        // Buscar Solicitud Admision
        {
            path: '/buscarSolicitudIngreso',
            name: 'buscarSolicitudIngreso',
            component: BuscarSolicitudIngreso,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: "/solicitudIngreso/:id?",
            name: 'solicitudIngresoId',
            component: SolicitudIngreso,
            meta: {
                middleware: [auth, log],
            },

        },
        
        /* -------------------------------------------------------------------------- */
        // Modulo tramite Documentario
        /* -------------------------------------------------------------------------- */
        // Solicitud Tramite Documentario
        {
            path: '/SolicitudTramiteDocumentario',
            name: 'SolicitudTramiteDocumentario',
            component: TramiteDocumentario,
            meta: {
                middleware: [auth, log],
            },
        },
        //  Tramite Area Cooperativa
        {
            path: '/Tramite_areacooperativa',
            name: 'Tramite_areacooperativa',
            component: Tramite_AreaCooperativa,
            meta: {
                middleware: [auth, log],              
            },
        },
        //  Tramite Calificacion
        {
            path: '/Tramite_Calificacion',
            name: 'Tramite_Calificacion',
            component: Tramite_Calificacion,
            meta: {
                middleware: [auth, log],              
            },
        },
        //  Tramite Prioridad
        {
            path: '/Tramite_Prioridad',
            name: 'Tramite_Prioridad',
            component: Tramite_Prioriad,
            meta: {
                middleware: [auth, log],              
            },
        },
        //  Tramite Tipo Documento
        {
            path: '/Tramite_TipoDocumento',
            name: 'Tramite_TipoDocumento',
            component: Tramite_TipoDocumento,
            meta: {
                middleware: [auth, log],              
            },
        },
        //  Tramite Tipo
        {
            path: '/Tramite_TipoTramite',
            name: 'Tramite_TipoTramite',
            component: Tramite_TipoTramite,
            meta: {
                middleware: [auth, log],              
            },
        },
        //  Tramite Motivo
        {
            path: '/Tramite_MotivoTramite',
            name: 'Tramite_MotivoTramite',
            component: Tramite_MotivoTramite,
            meta: {
                middleware: [auth, log],              
            },
        },
        //  Tramite Requisito
        {
            path: '/Tramite_RequisitoTramite',
            name: 'Tramite_RequisitoTramite',
            component: Tramite_RequisitoTramite,
            meta: {
                middleware: [auth, log],              
            },
        },

        /* -------------------------------------------------------------------------- */
        /* ------------------------------- Modulo Web ------------------------------- */
        /* -------------------------------------------------------------------------- */
        // Covenios-Web
        {
            path: '/convenios',
            name: 'convenios',
            component: Convenios,
            meta: {
                middleware: [auth, log],
            },
        },
        // Productos-Web
        {
            path: '/productos',
            name: 'productos',
            component: Productos,
            meta: {
                middleware: [auth, log],
            },
        },

        
        /* -------------------------------------------------------------------------- */
        /* -------------------------------- Electoral ------------------------------- */
        /* -------------------------------------------------------------------------- */
        // Candidato
        {
            path: '/candidato',
            name: 'candidato',
            component: Candidato,
            meta: {
                middleware: [auth, log],
            },
        },
        /* -------------------------------------------------------------------------- */
        /* ---------------------------- Gestion Usuarios ---------------------------- */
        /* -------------------------------------------------------------------------- */
        {
            path: '/usuario',
            name: 'usuario',
            component: Usuario,
            meta: {
                middleware: [auth, log],
            },
        },
        {
            path: '/cajaapertura',
            name: 'cajaapertura',
            component: CajaApertura,
            meta: {
                middleware: [auth, log],
            },
        },
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
        subsequentMiddleware({
            ...context,
            next: nextMiddleware
        });
    };
}

router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware) ?
            to.meta.middleware : [to.meta.middleware];

        const context = {
            from,
            next,
            router,
            to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({
            ...context,
            next: nextMiddleware
        });
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
    components: {
        App
    },
    template: '<App/>',
    vuetify: new Vuetify({

    }),
});
