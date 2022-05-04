<template>
    <div class="sec">
        <v-toolbar class="mb-2" color="green lighten-2" dark flat elevation="1">
            <v-toolbar-title>Gestión Tramite Documentario</v-toolbar-title>
        </v-toolbar>

        <!-- /* ------------------------- form filtro de busqueda ------------------------ */ -->
        <v-card>
            <v-expansion-panels>
                <v-expansion-panel>
                    <v-expansion-panel-header>
                        <h5>BUSQUEDA</h5>
                    </v-expansion-panel-header>
                    <v-expansion-panel-content>
                        <v-form lazy-validation ref="bform">
                            <v-row>
                                <!-- /* --------------------------- input NroExpediente -------------------------- */ -->
                                <v-col sm="2" md="2">
                                    <v-text-field :counter="10" label="Nro. Expediente" disabled
                                        prepend-icon="mdi-briefcase mdi-inactive" outlined dense>
                                    </v-text-field>
                                </v-col>
                                <!-- /* ------------------------------ input fechas ------------------------------ */ -->
                                <v-col sm="2" md="2">
                                    <v-menu ref="menu1" :close-on-content-click="false" transition="scale-transition"
                                        offset-y max-width="290px" min-width="auto">
                                        <template v-slot:activator="{ on, attrs }">

                                            <v-text-field label="Desde" persistent-hint prepend-icon="mdi-calendar"
                                                v-bind="attrs" hint="* Fecha Inicio" v-on="on" outlined dense>
                                            </v-text-field>
                                        </template>
                                        <v-date-picker no-title></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col sm="2" md="2">
                                    <v-menu ref="menu2" :close-on-content-click="false" transition="scale-transition"
                                        offset-y max-width="290px" min-width="auto">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-text-field label="Hasta" persistent-hint prepend-icon="mdi-calendar"
                                                v-bind="attrs" hint="* Fecha Fin" v-on="on" outlined dense>
                                            </v-text-field>
                                        </template>
                                        <v-date-picker no-title></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <!-- /* --------------------------- input calificacion --------------------------- */ -->
                                <v-col sm="2" md="2">
                                    <!-- <v-select :items="items" label="Calificación" dense></v-select> -->
                                    <v-select item-text="calificacion" item-value="identificador_calificacion"
                                        label="Calificación" prepend-icon="mdi-eye" hide-details
                                        no-data-text="Cargando Estados de Calificación" outlined dense>
                                    </v-select>
                                </v-col>
                                <!-- /* ----------------------------- input prioridad ---------------------------- */ -->
                                <v-col sm="2" md="2">
                                    <v-autocomplete item-text="prioridad" item-value="identificador_prioridad"
                                        label="Prioridad" prepend-icon="mdi-ballot-outline" hide-details
                                        no-data-text="Cargando Prioridad" outlined dense>
                                    </v-autocomplete>
                                </v-col>
                                <!-- /* -------------------------- input tipo documento -------------------------- */ -->
                                <v-col sm="2" md="2">
                                    <v-autocomplete item-text="tipo_documento" item-value="identificador_tipoDoc"
                                        label="Tipo Documento" prepend-icon="mdi-folder-text" hide-details
                                        no-data-text="Cargando Tipo Documento" outlined dense>
                                    </v-autocomplete>
                                </v-col>
                                <!-- /* ------------------------- input tipo solicitante ------------------------- */ -->
                                <v-col sm="2" md="2">
                                    <v-autocomplete item-text="tipo_solicitante"
                                        item-value="identificador_tipoSolicitante" label="Tipo Solicitante"
                                        prepend-icon="mdi-folder-settings" hide-details
                                        no-data-text="Cargando Tipo Solicitante" outlined dense>
                                    </v-autocomplete>
                                </v-col>
                                <!-- /* ------------------------------ input entidad ----------------------------- */ -->
                                <v-col sm="10" md="10">
                                    <v-text-field label="Entidad" prepend-icon="mdi-check-decagram" outlined dense>
                                    </v-text-field>
                                </v-col>
                                <!-- /* --------------------------- input tipo tramite --------------------------- */ -->
                                <v-col sm="2" md="2">
                                    <v-autocomplete item-text="tipo_tramite" item-value="identificador_tipoTramite"
                                        label="Tipo Trámite" prepend-icon="mdi-folder-settings" hide-details
                                        no-data-text="Cargando Tipo Tramite" outlined dense>
                                    </v-autocomplete>
                                </v-col>
                                <!-- /* -------------------------- input motivo tramite -------------------------- */ -->
                                <v-col sm="2" md="2">
                                    <v-autocomplete item-text="motivo_tramite" item-value="identificador_motivoTramite"
                                        label="Motivo Trámite" prepend-icon="mdi-folder-settings" hide-details
                                        no-data-text="Cargando Motivo Trámite" outlined dense>
                                    </v-autocomplete>
                                </v-col>
                                <!-- /* ------------------------------- AREA ORIGEN ------------------------------ */ -->
                                <v-col sm="4" md="4">
                                    <v-autocomplete item-text="area_origen" item-value="area_origen" label="Origen"
                                        prepend-icon="mdi-archive-arrow-up" hide-details
                                        no-data-text="Cargando Area Origen" outlined dense small-chips disabled>
                                    </v-autocomplete>
                                </v-col>
                                <!-- /* ------------------------------ AREA DESTINO ------------------------------ */ -->
                                <v-col sm="4" md="4">
                                    <v-autocomplete item-text="area_destino" item-value="area_destino" label="Destino"
                                        prepend-icon="mdi-archive-arrow-down" hide-details
                                        no-data-text="Cargando Área Destino" outlined dense small-chips disabled>
                                    </v-autocomplete>
                                </v-col>

                                <v-col sm="4" md="6">
                                    requisitos
                                </v-col>
                                <v-col sm="4" md="6" class="bordered">
                                    <v-responsive class="overflow-y-auto" max-height="100" outlined dense>
                                        <v-checkbox v-model="ex4" color="success" label="Derivado" value="TRUE"
                                            hide-details> </v-checkbox>
                                        <v-checkbox v-model="ex4" color="success" label="En Trámite" value="TRUE"
                                            hide-details></v-checkbox>
                                        <v-checkbox v-model="ex4" color="success" label="Finalizado" value="TRUE"
                                            hide-details></v-checkbox>
                                        <v-checkbox v-model="ex4" color="success" label="Procesado" value="TRUE"
                                            hide-details></v-checkbox>
                                        <v-checkbox v-model="ex4" color="success" label="Recepcionado" value="TRUE"
                                            hide-details></v-checkbox>
                                        <v-checkbox v-model="ex4" color="success" label="Retornar" value="TRUE"
                                            hide-details></v-checkbox>
                                    </v-responsive>

                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col></v-col>
                                <v-col class="text-right">
                                    <v-btn dark color="green darken-1">
                                        Buscar
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-form>
                    </v-expansion-panel-content>
                </v-expansion-panel>
            </v-expansion-panels>
        </v-card>
        <br>
        <!-- /* ----------------------------- datatable list ----------------------------- */ -->

        <!-- <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table"> -->
        <v-data-table :headers="headers" type="table" class="elevation-0" dense>
            <template v-slot:top>
                <v-toolbar flat>
                    <h4>Trámite Documentario</h4>
                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="60%">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn color="green" dark v-bind="attrs" v-on="on">
                                <v-icon dark>mdi-pen-plus</v-icon>
                                Nuevo
                            </v-btn>
                        </template>
                        <v-card>
                            <v-card-title>
                                <span class="text-h5">Registrar Trámite</span>
                            </v-card-title>

                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <!-- /* --------------------------- input NroExpediente -------------------------- */ -->
                                        <v-col sm="4" md="4">
                                            <v-text-field :counter="10" label="Nro. Expediente" disabled
                                                prepend-icon="mdi-briefcase mdi-inactive" outlined dense>
                                            </v-text-field>
                                        </v-col>
                                        <!-- /* ------------------------------ input fechas ------------------------------ */ -->
                                        <v-col sm="4" md="4">
                                            <v-menu ref="menu1" v-model="menu1" :close-on-content-click="false"
                                                transition="scale-transition" offset-y max-width="290px"
                                                min-width="auto">
                                                <template v-slot:activator="{ on, attrs }">
                                                    <v-text-field v-model="dateFormatted" label="Fecha Registro"
                                                        persistent-hint prepend-icon="mdi-calendar" v-bind="attrs"
                                                        @blur="date = parseDate(dateFormatted)" v-on="on" outlined
                                                        dense>
                                                    </v-text-field>
                                                </template>
                                                <v-date-picker v-model="date" no-title @input="menu1 = false">
                                                </v-date-picker>
                                            </v-menu>

                                            <!-- <v-menu ref="menu" v-model="menu" :close-on-content-click="false"
                                                :return-value.sync="date" transition="scale-transition" offset-y
                                                min-width="auto">
                                                <template v-slot:activator="{ on, attrs }">
                                                    <v-text-field v-model="date" label="Fecha Registro"
                                                        prepend-icon="mdi-calendar" readonly v-bind="attrs" v-on="on">
                                                    </v-text-field>
                                                </template>
                                                <v-date-picker v-model="date" no-title scrollable>
                                                    <v-spacer></v-spacer>
                                                    <v-btn text color="red" @click="menu = false">
                                                        Cancel
                                                    </v-btn>
                                                    <v-btn text color="success" @click="$refs.menu.save(date)">
                                                        OK
                                                    </v-btn>
                                                </v-date-picker>
                                            </v-menu> -->
                                        </v-col>

                                        <!-- /* --------------------------- input estado de solicitud --------------------------- */ -->
                                        <v-col sm="4" md="4">
                                            <!-- <v-select :items="items" label="Calificación" dense></v-select> -->
                                            <v-select item-text="estado_solicitud"
                                                item-value="identificador_estado_solicitud" label="*Estado Solicitud *"
                                                prepend-icon="mdi-eye" hide-details
                                                no-data-text="Cargando Estados de Solicitud" outlined dense required>
                                            </v-select>
                                        </v-col>
                                        <!-- /* --------------------------- input calificacion --------------------------- */ -->
                                        <v-col sm="6" md="6">
                                            <!-- <v-select :items="items" label="Calificación" dense></v-select> -->
                                            <v-select item-text="calificacion" item-value="identificador_calificacion"
                                                label="*Calificación" prepend-icon="mdi-eye" hide-details
                                                no-data-text="Cargando Estados de Calificación" outlined dense required>
                                            </v-select>
                                        </v-col>
                                        <!-- /* ----------------------------- input prioridad ---------------------------- */ -->
                                        <v-col sm="6" md="6">
                                            <v-autocomplete item-text="prioridad" item-value="identificador_prioridad"
                                                label="*Prioridad" prepend-icon="mdi-ballot-outline" hide-details
                                                no-data-text="Cargando Prioridad" outlined dense required>
                                            </v-autocomplete>
                                        </v-col>
                                        <!-- /* ------------------------------ input trazabilidad de areas ----------------------------- */ -->
                                        <v-col sm="6" md="12">
                                            <v-simple-table dense class="table table-bordered">
                                                <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th>Nro</th>
                                                            <th>Fecha Proceso</th>
                                                            <th>Estado Trámite</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>22/03/2022</td>
                                                            <td>En Trámite</td>
                                                        </tr>
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-col>
                                        <!-- /* -------------------------- input tipo documento -------------------------- */ -->
                                        <v-col sm="4" md="4">
                                            <v-autocomplete item-text="tipo_documento"
                                                item-value="identificador_tipoDoc" label="*Tipo Documento"
                                                prepend-icon="mdi-folder-text" hide-details
                                                no-data-text="Cargando Tipo Documento" outlined dense required>
                                            </v-autocomplete>
                                        </v-col>
                                        <!-- /* --------------------------- input tipo tramite --------------------------- */ -->
                                        <v-col sm="4" md="4">
                                            <v-autocomplete item-text="tipo_tramite"
                                                item-value="identificador_tipoTramite" label="Tipo Trámite"
                                                prepend-icon="mdi-folder-settings" hide-details
                                                no-data-text="Cargando Tipo Tramite" outlined dense>
                                            </v-autocomplete>
                                        </v-col>
                                        <!-- /* -------------------------- input motivo tramite -------------------------- */ -->
                                        <v-col sm="4" md="4">
                                            <v-autocomplete item-text="motivo_tramite"
                                                item-value="identificador_motivoTramite" label="Motivo Trámite"
                                                prepend-icon="mdi-folder-settings" hide-details
                                                no-data-text="Cargando Motivo Trámite" outlined dense>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-btn color="primary" small>Agregar</v-btn>
                                        <v-btn color="red" small>Eliminar</v-btn>
                                        <!-- /* ------------------------------ input table documentos ----------------------------- */ -->
                                        <v-col sm="6" md="12">
                                            <v-simple-table dense class="table table-bordered">
                                                <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th>Nro</th>
                                                            <th>Tipo Documento</th>
                                                            <th>Visado</th>
                                                            <th>Obrservacion</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>01</td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-col>


                                        <v-col sm="4" md="6">
                                            <v-autocomplete item-text="area_origen" item-value="area_origen"
                                                label="Origen" prepend-icon="mdi-archive-arrow-up" hide-details
                                                no-data-text="Cargando Area Origen" outlined dense small-chips disabled>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col sm="4" md="6">
                                            <v-autocomplete item-text="encargado_area" item-value="encargado_area"
                                                label="Encargado" prepend-icon="mdi-badge-account" hide-details
                                                no-data-text="Cargando  Encargado Área" outlined dense small-chips
                                                disabled>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col sm="4" md="6">
                                            <v-autocomplete item-text="area_destino" item-value="area_destino"
                                                label="Destino" prepend-icon="mdi-archive-arrow-down" hide-details
                                                no-data-text="Cargando Área Destino" outlined dense small-chips
                                                disabled>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col sm="4" md="6">
                                            <v-autocomplete item-text="encargado_destino" item-value="encargado_destino"
                                                label="Encargado" prepend-icon="mdi-badge-account" hide-details
                                                no-data-text="Cargando Encargado Area Destino" outlined dense
                                                small-chips disabled>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-btn color="primary" small>Agregar</v-btn>
                                        <v-btn color="red" small>Eliminar</v-btn>
                                        <!-- /* ------------------------------ input table documentos ----------------------------- */ -->
                                        <v-col sm="6" md="12">
                                            <v-simple-table dense class="table table-bordered">
                                                <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th>Nro</th>
                                                            <th>Área</th>
                                                            <th>Encargado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>DRTO COBRANZAS</td>
                                                            <td>
                                                                COBRADOR
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>GERENCIA</td>
                                                            <td>
                                                                ADMIN
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-col>
                                        <!-- /* -------------------------- textarea observacion -------------------------- */ -->
                                        <v-col sm="6" md="12">
                                            <v-textarea filled name="input-7-4" label="Observación"></v-textarea>
                                        </v-col>
                                        <!-- /* ------------------------- input tipo solicitante ------------------------- */ -->
                                        <v-col sm="4" md="4">
                                            <v-autocomplete item-text="tipo_solicitante"
                                                item-value="identificador_tipoSolicitante" label="*Tipo Solicitante"
                                                prepend-icon="mdi-folder-settings" hide-details
                                                no-data-text="Cargando Tipo Solicitante" outlined dense small-chips
                                                required>
                                            </v-autocomplete>
                                        </v-col>
                                        <!-- /* ------------------------------ input entidad ----------------------------- */ -->
                                        <v-col sm="6" md="8">
                                            <v-text-field label="*Entidad" prepend-icon="mdi-check-decagram" outlined
                                                dense small-chips required>
                                            </v-text-field>
                                        </v-col>
                                        <!-- /* ------------------------------ input table documentos requisito ----------------------------- */ -->
                                        <v-col sm="6" md="12">
                                            <v-simple-table dense class="table table-bordered">
                                                <template v-slot:default>
                                                    <thead>
                                                        <tr>
                                                            <th>Nro</th>
                                                            <th>Requisito</th>
                                                            <th>Cumple</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>01</td>
                                                            <td>COPIA DNI</td>
                                                            <td>
                                                                <v-checkbox v-model="ex4" color="success" value="TRUE"
                                                                    hide-details>
                                                                </v-checkbox>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>02</td>
                                                            <td>COPIA BOLETA</td>
                                                            <td>
                                                                <v-checkbox v-model="ex4" color="success" value="TRUE"
                                                                    hide-details>
                                                                </v-checkbox>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </template>
                                            </v-simple-table>
                                        </v-col>
                                    </v-row>
                                </v-container>
                                <small>*Campos requeridos</small>
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="red darken-1" text @click="dialog = false">
                                    Close
                                </v-btn>
                                <v-btn color="green darken-1" text @click="dialog = false">
                                    Save
                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>


                </v-toolbar>
            </template>
            <template v-slot:[`item.actions`]="{ item }">
                <v-icon small class="mr-2" color="green accent-4" @click="editItem(item)"> mdi-pencil </v-icon>
                <v-icon small color="red accent-4" @click="deleteItem(item)"> mdi-delete </v-icon>
            </template>
            <!-- <template v-slot:no-data>
                    <v-btn color="success" @click="initialize"> Cargar </v-btn>
                </template> -->

        </v-data-table>
        <!-- </v-skeleton-loader> -->
    </div>
</template>

<script>
    export default {
        data: vm => ({
            date: (new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000)).toISOString().substr(0, 10),
            dateFormatted: vm.formatDate((new Date(Date.now() - (new Date()).getTimezoneOffset() * 60000))
                .toISOString().substr(0, 10)),
            menu1: false,
            // menu2: false,
        }),

        data() {
            return {
                dialog: false,
                dialogDelete: false,
                loading: true,
                firstLoad: true,
                snackbar: false,
                text: "",
                items: [],
                headers: [{
                        text: "Acciones",
                        value: "actions",
                        sortable: false
                    },
                    {
                        text: 'Id',
                        value: 'nro'
                    },
                    {
                        text: "Fec. Trámite",
                        value: "fech_tramite"
                    },
                    {
                        text: "Nro. Expediente",
                        value: "nro_expediente"
                    },
                    {
                        text: "Estado",
                        value: "estado"
                    },
                    {
                        text: "Área Origen",
                        value: "area_origen"
                    },
                    {
                        text: "Área Destino",
                        value: "area_destino"
                    },
                    {
                        text: "Motivo Trámite",
                        value: "motivo_tramite"
                    },
                    {
                        text: "Calificación",
                        value: "calificacion"
                    },
                    {
                        text: "Prioridad",
                        value: "prioridad"
                    },
                    {
                        text: "Tipo Solicitante",
                        value: "tipo_solicitante"
                    },
                    {
                        text: "Nro. Documento",
                        value: "nro_documento"
                    },
                    {
                        text: "Nombres",
                        value: "name"
                    },
                    {
                        text: "Ape. Paterno",
                        value: "ap_paterno"
                    },
                    {
                        text: "Ape. Materno",
                        value: "ap_paterno"
                    },
                    {
                        text: "Dirección",
                        value: "direc"
                    },
                    {
                        text: "Entidad",
                        value: "entidad"
                    },
                    {
                        text: "Observación",
                        value: "observacion"
                    },
                    {
                        text: "Estado",
                        value: "estado_identificador"
                    },
                    {
                        text: "ProcesoCc",
                        value: "proceso_cc"
                    },
                    {
                        text: "Hora Registro",
                        value: "hora_regist"
                    },

                ],
                desserts: [],
                editedIndex: -1,

                editedItem: {
                    // idmaestro: 0,
                    // codigo: "",
                    // abrev: "",
                    // descripcion: "",
                    // estado: true,
                },

                defaultItem: {
                    // idmaestro: 0,
                    // codigo: "",
                    // abrev: "",
                    // descripcion: "",
                    // estado: true,
                },

                /* --------------------------------- FILTROS -------------------------------- */
                buscarObj: {
                    // fectramite_inicio: null,
                    // fectramite_fin: null,
                },

                /* ------------------------------ INPUT FECHAS ------------------------------ */
                // FECHA 1

                // menu1: false,
                // date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                //     .toISOString()
                //     .substr(0, 10),
                // dateFormatted: vm.formatDate(
                //     new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                //     .toISOString()
                //     .substr(0, 10)
                // ),

                // FECHA 2

                // menu2: false,
                // date2: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                //     .toISOString()
                //     .substr(0, 10),
                // dateFormatted2: vm.formatDate(
                //     new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                //     .toISOString()
                //     .substr(0, 10)
                // ),
            }
        },

        computed: {
            /* ------------------------------ MODAL TITULOS ----------------------------- */
            formTitle() {
                return this.editedIndex === -1 ? "Nuevo" : "Editar";
            },

            /* ------------------------------ MODAL MENSAJE ----------------------------- */
            formSave() {
                return this.editedIndex === -1 ? "registró" : "actualizó";
            },

            /* --------------------------------- FECHAS --------------------------------- */
            computedDateFormatted() {
                return this.formatDate(this.date)
            },
        },

        watch: {
            dialog(val) {
                val || this.close();
            },
            dialogDelete(val) {
                val || this.closeDelete();
            },
            /* -------------------------- VARIABLES PARA FECHAS ------------------------- */
            date(val) {
                this.dateFormatted = this.formatDate(this.date)
            },

        },
        created() {
            this.initialize();
        },
        /* -------------------------------------------------------------------------- */
        /* --------------------------- SECCION DE METODOS --------------------------- */
        methods: {
            search() {
                this.initialize();
            },
            // SolicitudTramite
            initialize() {
                let me = this;
                let url = "/getSolicitudTramiteDocumentario"; //Ruta que hemos creado para enviar una tarea y guardarla

                axios
                    .get(url)
                    .then(function (response) {
                        me.loading = false;
                        me.desserts = response.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            // TipoTramite
            initialize() {
                let me = this;
                let url = "/getTramite_TipoTramite";
                axios
                    .get(url)
                    .then(function (response) {
                        me.desserts = response.data;
                        me.loading = false;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            /* ------------------------- METODO PARA LAS FECHAS ------------------------- */
            formatDate(date) {
                if (!date) return null

                const [year, month, day] = date.split('-')
                return `${month}/${day}/${year}`
            },
            parseDate(date) {
                if (!date) return null

                const [month, day, year] = date.split('/')
                return `${year}-${month.padStart(2, '0')}-${day.padStart(2, '0')}`
            },
            /* ----------------------- FIN METODO PARA LAS FECHAS ----------------------- */

            editItem(item) {
                this.editedIndex = this.desserts.indexOf(item);
                this.editedItem = Object.assign({}, item);
                this.dialog = true;
            },

            deleteItem(item) {
                this.editedIndex = this.desserts.indexOf(item);
                this.editedItem = Object.assign({}, item);
                this.dialogDelete = true;
            },

            deleteItemConfirm() {
                let me = this;
                let id = me.editedItem.idmaestro;
                axios
                    .delete("/SolicitudTramiteDocumentario/borrar/" + id)
                    .then(function (response) {
                        console.log(response);
                        if (response.data === 1) {
                            me.text = "Se eliminó El TRÁMITE DOCUMENTARIO CODIGO: " + id;
                        } else {
                            me.text = "No se eliminó El TRÁMITE DOCUMENTARIO";
                        }
                        me.dialogDelete = false;
                        me.snackbar = true;
                        me.initialize();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            close() {
                this.dialog = false;
                this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                    this.editedIndex = -1;
                });
            },

            closeDelete() {
                this.dialogDelete = false;
                this.$nextTick(() => {
                    this.editedItem = Object.assign({}, this.defaultItem);
                    this.editedIndex = -1;
                });
            },

            /* -------------------------------------------------------------------------- */
            /* ------------------------ GUARDAR DATOS DE TRAMITES ----------------------- */

            save() {
                let me = this;
                let url =
                    "/SolicitudTramiteDocumentario/guardar"; //Ruta que hemos creado para enviar una tarea y guardarla
                let textSave = me.formSave;
                axios
                    .post(url, {
                        //estas variables son las que enviaremos para que crear la tarea
                        editedItem: me.editedItem,
                    })
                    .then(function (response) {
                        if (response.data[0].estado_registro === true) {
                            me.text =
                                "Se " +
                                textSave +
                                " El TRÁMITE DOCUMENTARIO CODIGO: " +
                                response.data[0].idmaestro;
                        } else {
                            me.text = "No se " + textSave + " El TRÁMITE DOCUMENTARIO";
                        }
                        me.dialog = false;
                        me.snackbar = true;
                        me.initialize();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            clear() {
                let me = this;
                me.snackbar = false;
            },
        },
    }

</script>
