<template>
    <v-app id="app">
        <template v-if="!$route.path.includes('login')">

            <v-navigation-drawer v-model="drawer" app clipped color="#F4F5F9">
                <v-layout>
                    <v-flex style="text-align: center; ">
                        <v-img height="100%" style="padding: 20px; "
                            src="https://cdn.vuetifyjs.com/images/cards/server-room.jpg">
                            <v-row align="center" class="fill-height">
                                <v-col align-self="center">
                                    <v-avatar class="profile" align-self="start" size="100" rounded="50">
                                        <v-img src="https://cdn.vuetifyjs.com/images/profiles/marcus.jpg"></v-img>
                                    </v-avatar>
                                </v-col>
                                <v-col class="py-0">
                                    <v-list-item color="#000" dark>
                                        <v-list-item-content>
                                            <v-list-item-title class="text-h6">
                                                <!-- {{ user.nombre  }} -->
                                            </v-list-item-title>
                                            <v-list-item-subtitle>Administrador</v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-col>
                            </v-row>
                        </v-img>
                    </v-flex>
                </v-layout>

                <v-list nav dense>
                    <v-list-group v-for="item in items" :key="item.title" v-model="item.active"
                        :prepend-icon="item.action" no-action color="#43A047">
                        
                        <template v-slot:activator>
                            <v-list-item-content>
                                <v-list-item-title v-text="item.title"></v-list-item-title>
                            </v-list-item-content>
                        </template>

                        <v-list-item v-for="child in item.items" :key="child.title" link :to="child.path">
                            <v-list-item-content>
                                <v-list-item-title v-text="child.title"></v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>

                    </v-list-group>
                </v-list>
            </v-navigation-drawer>

        </template>
        <!-- /* --------------------------------- Top Nav -------------------------------- */ -->
        <div class="nav">
            <v-app-bar app clipped-left dark elevation="1"
                style="background: linear-gradient(to right, #388E3C,  #66BB6A);">

                <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title>Sistema Erp Cosemselam</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-title class="pr-2">
                    <!-- <v-icon>mdi-account-circle </v-icon> {{ user.name  }} ({{ user.nombre_rol  }}) -->
                </v-toolbar-title>
                <v-btn icon @click="logout()">
                    <v-icon>mdi-export</v-icon>
                </v-btn>

            </v-app-bar>
        </div>

        <v-main>
            <keep-alive :include="['Login']">
                <v-container>
                    <router-view></router-view>
                </v-container>
            </keep-alive>


        </v-main>

        <v-footer app clipped-left dark style="background: linear-gradient(to left, #388E3C,  #66BB6A);">
            <v-col class="text-center ">
                <span>© {{ new Date().getFullYear() }} - Sistema Erp Cosemselam - Todos los Derechos Reservados</span>
            </v-col>
        </v-footer>
    </v-app>
</template>
<script>
import Axios from 'axios';
    export default {
        props: {
            source: String,
        },
        data: () => ({
            drawer: null,
            routeCurrent: null,
            iconslot: [
                {action: "mdi-view-dashboard",
                    title: "Panel"},
                {action: "mdi-file-settings-outline",
                    title: "Admision"},
                {action: "mdi-file-cabinet",
                    title: "Tramite Documentario"},
                {action: "mdi-folder-account",
                    title: "Gerencia"},
                {action: "mdi-store",
                    title: "Comercial"},
                {action: "mdi-web",
                    title: "Web"},
                {action: "mdi-vote",
                    title: "Electoral"},
                {action: "mdi-folder",
                    title: "Préstamos"},
                {action: "mdi-shield-lock ",
                    title: "Seguridad"},
                {action: "mdi-buffer",
                    title: "Tabla Maestra"},
                {action: "mdi-store",
                    title: "Dpto. Comercialización"},
            ],
            items :[{
                    action: "mdi-view-dashboard",
                    active: false,
                    title: "Panel",
                    items: [{
                        title: "Estado del App",
                        path: "/dashboard"
                    }],
                },],
            /*items: [
                // Dashboard
                {
                    action: "mdi-view-dashboard",
                    active: false,
                    title: "Panel",
                    items: [{
                        title: "Estado del App",
                        path: "/dashboard"
                    }],
                },
                // Modulo Admision
                {
                    action: "mdi-file-settings-outline",
                    active: false,
                    title: "Admision",
                    items: [{
                            title: "Solicitud Ingreso Admision",
                            path: "/solicitudIngreso",
                        },
                        {
                            title: "Registro de Socios",
                            path: "/registroSocios"

                        },
                        {
                            title: "Buscar Solicitud Ingreso",
                            path: "/buscarSolicitudIngreso",
                        },
                    ],
                },

                // Modulo Tramite Documentario
                {
                    action: "mdi-file-cabinet",
                    active: false,
                    title: "Tramite Documentario",
                    items: [{
                            title: "Proceso",
                            path: "/SolicitudTramiteDocumentario"

                        },
                        {
                            title: "Areas Cooperativa",
                            path: "/Tramite_areacooperativa"
                        },
                        {
                            title: "Calificación",
                            path: "/Tramite_Calificacion"
                        },
                        {
                            title: "Prioridad",
                            path: "/Tramite_Prioridad"
                        },
                        {
                            title: "Tipo de Documento",
                            path: "/Tramite_TipoDocumento"
                        },
                        {
                            title: "Tipo de Tramite",
                            path: "/Tramite_TipoTramite"
                        },
                        {
                            title: "Motivo de Tramite",
                            path: "/Tramite_MotivoTramite"
                        },
                        {
                            title: "Requisito de Tramite",
                            path: "/Tramite_RequisitoTramite"
                        },

                    ],
                },
                // Modulo Gerencia
                {
                    action: "mdi-folder-account",
                    active: false,
                    title: "Gerencia",
                    items: [{
                            title: "Confirmar Operaciones",
                            path: "/confirmarOperaciones"
                        },
                        {
                            title: "Margenes de Utilidades",
                            path: "/margenUtilidad"
                        },
                        {
                            title: "Cartas",
                            path: "/cartas"
                        },
                        {
                            title: "Actualización Precios",
                            path: "/actualizacionPrecio"
                        },
                        {
                            title: "Convenios",
                            path: "/conveniosGerencia"
                        },
                        {
                            title: "Reportes",
                            path: "/reportesGerencia"
                        },
                        {
                            title: "Configuracion",
                            // path: "/configuracionGerencial"
                        },
                        {
                            title: "Almacenes",
                            path: "/almacenes"
                        },
                        {
                            title: "Sucursales",
                            // path: "/sucursales"
                        },
                        {
                            title: "Descuentos Notas Créditos",
                            // path: "/descuenNotasCredito"
                        }
                    ],
                },
                // Modulo Recaudación
                // {
                //     action: "mdi-folder",
                //     active: false,
                //     title: "Recaudación",
                //     items: [{
                //             title: "Control Caja",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Apertura",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Arqueo de Caja",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Pagos Varios",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Cobranzas",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Depósitos",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Reportes",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Gastos",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Materiales",
                //             // path: "/solicitudtd"
                //         }
                //     ],
                // },

                // Modulo Comercial
                {
                    action: "mdi-store",
                    active: false,
                    title: "Comercial",
                    items: [{
                            action: "mdi-store",
                            title: "Productos",
                            path: "/productos"
                        },
                        {
                            title: "Compras",
                            path: "/compras"
                        },
                        {
                            title: "Ventas",
                            path: "/ventas"
                        },
                        {
                            title: "Notas de Crédito",
                            path: "/notas-de-credito"
                        },
                        {
                            title: "Stock Disponible",
                            path: "/stock.disponible"
                        },
                        {
                            title: "Pedido de materiales",
                            path: "/pedido-materiales"
                        },
                        {
                            title: "Proveedores",
                            path: "/proveedores"
                        },
                        {
                            title: "Clientes",
                            path: "/clientes"
                        },
                        {
                            title: "Seguimiento Series",
                            path: "/seguimiento-series"
                        },
                        {
                            title: "Reportes",
                            path: "/reportes"
                        },
                        {
                            title: "Promociones",
                            path: "/promociones"
                        },
                        {
                            title: "Control Caja",
                            path: "/control-caja"
                        },
                        {
                            title: "Productos por Vencer",
                            path: "/productos-por-vencer"
                        },
                        {
                            title: "Control Activos Fijos",
                            path: "/activos-fijos"
                        },
                    ],
                },
                // Modulo Creditos y Cobranzas
                // {
                //     action: "mdi-folder",
                //     active: false,
                //     title: "Créditos y Cobranzas",
                //     items: [{
                //             title: "Prestamos",
                //             path: "/creditos-cobranzas"
                //         },
                //         {
                //             title: "Cartera Morosa",
                //             path: "/cartera-morosa"
                //         },

                //     ],
                // },
                // Modulo Web
                {
                    action: "mdi-web",
                    active: false,
                    title: "Web",
                    items: [{
                            title: "Convenios",
                            path: "/convenios"
                        },
                        {
                            title: "Productos",
                            path: "/productos"
                        },

                    ],
                },
                // Modulo Electoral
                {
                    action: "mdi-vote",
                    active: false,
                    title: "Electoral",
                    items: [{
                            title: "Candidato",
                            path: "/candidato"
                        },
                        // {
                        //     title: "Productos",
                        //     path: "/productos"
                        // },

                    ],
                },
                // Modulo Prestamos
                {
                    action: "mdi-folder",
                    active: false,
                    title: "Préstamos",
                    items: [{
                        title: "Desembolso",
                        // path: "/solicitudtd"
                    }, ],
                },
                // Modulo Cuentas Corrientes
                // {
                //     action: "mdi-folder",
                //     active: false,
                //     title: "Cuentas Corrientes",
                //     items: [{
                //             title: "Fut Trámite",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Ficha Ayuda por Sepelio",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Ayuda por Sepelio",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Renuncia",
                //             // path: "/solicitudtd"
                //         },
                //         {
                //             title: "Planilla Descuentos",
                //             // path: "/solicitudtd"
                //         },
                //     ],
                // },
                // Modulo Auditoría

                // Modulo Seguridad
                {
                    action: "mdi-shield-lock ",
                    active: false,
                    title: "Seguridad",
                    items: [{
                            title: "Roles",
                            // path: "/solicitudtd"
                        },
                        {
                            title: "Usuarios",
                            path: "/usuario"
                        },
                    ],
                },
               
                // Tablas Maestras
                {
                    action: "mdi-buffer",
                    active: false,
                    title: "Tabla Maestra",
                    items: [{
                            title: "Tipo de Documento",
                            path: "/tipoDocumentoIdentidad"
                        },
                        {
                            title: "Ubigeo",
                            path: "/ubigeo"
                        },
                        {
                            title: "Tipo de Vivienda",
                            path: "/tipoVivienda"
                        },
                        {
                            title: "Grado de Estudios",
                            path: "/gradoEstudios"
                        },
                        {
                            title: "Profesión",
                            path: "/profesion"
                        },
                        {
                            title: "Ugel",
                            path: "/ugel"
                        },
                        {
                            title: "Tipo de Planilla",
                            path: "/tipoPlanilla"
                        },
                        {
                            title: "Tipo de Convenio",
                            path: "/tipoConvenio"
                        },
                        {
                            title: "Tipo de Institución Educativa",
                            path: "/tipoInstitucionEducativa",
                        },
                        {
                            title: "Institución Educativa",
                            path: "/institucionEducativa"
                        },
                        {
                            title: "Tipo de Zona",
                            path: "/tipoZona"
                        },
                        {
                            title: "Tipo de Vía",
                            path: "/tipoVia"
                        },
                        {
                            title: "Tipo de Cargo",
                            path: "/tipoCargo"
                        },
                        {
                            title: "Tipo de Contrato Laboral",
                            path: "/tipoContratoLaboral"
                        },
                        {
                            title: "Regimen Laboral",
                            path: "/regimenLaboral"
                        },
                        {
                            title: "Tipo de Regimen Pensionario",
                            path: "/tipoRegimenPensionario",
                        },
                        {
                            title: "Tipo de Discapacidad",
                            path: "/tipoDiscapacidad"
                        },
                        {
                            title: "Tipo de Socio",
                            path: "/tipoSocio"
                        },
                        {
                            title: "Parentesco",
                            path: "/parentesco"
                        },
                        {
                            title: "Riesgo Crediticio",
                            path: "/riesgoCrediticio"
                        },
                    ],

                },
                {
                    action: "mdi-buffer",
                    active: false,
                    title: "Dpto. Comercialización",
                    items: [
                        {
                            title: "Gestionar Cajas",
                            path: "/cajaapertura"
                        },{
                            title: "Apertura/Cerrado de caja",
                            path: "/cajaapertura"
                        },
                    ],
                },
            ],*/
        }),
        
        created() {
            if (!localStorage.getItem('Authorization')) {
                if (this.$route.name != "login") {
                    return this.$router.push({
                        path: "/login"
                    });
                }
            }else{
                this.callMenu();
            }
            this.$vuetify.theme.light = true;
            this.routeCurrent = this.$route.path;
            
            /*this.items.forEach((e1) => {
                e1.items.forEach((e2) => {
                    if (e2.path == this.routeCurrent) {
                        e1.active = true;
                    }
                });
            });*/

        },
        watch:{
            $route (to, from){
                console.log(from.path);
                if(from.path == "/login"){
                    this.callMenu();
                }
            }
        },
        methods: {
            logout() {
                this.$router.push({
                    path: "/login"
                });
                localStorage.removeItem('Authorization');
                localStorage.removeItem('User');
            },
            callMenu(){
                Axios.post('/permit/menu', JSON.parse(localStorage.getItem('User')) )
                .then((response) => {
                    this.organize(response.data);
                    console.log(response.data);
                }
                ).catch((error)=>{
                    console.log(error);
                });
            },
            organize(rawmenu){
                this.items = [];
                rawmenu.forEach(elemento => {
                    let menudesc = elemento.descripcion.split("/",2);
                    let d = this.items.find(e => e.title == menudesc[0]);
                    if(d != null){
                        if(menudesc.length > 1)
                            d.items.push({title: menudesc[1], path: elemento.ruta});
                    }else{
                        let slot = this.iconslot.find(ele => ele.title == menudesc[0]);
                        if(slot == null){
                            slot = {action: ""};
                        }
                        this.items.push({title: menudesc[0],action: slot.action, items: [{title: menudesc[1], path: elemento.ruta}]});
                    }
                    //console.log(menudesc);
                });
                //console.log(this.items);
            },
        }
    };

</script>
