<template>
    <v-stepper non-linear v-model="e1">
        <v-stepper-header>
            <v-stepper-step :editable="true" :complete="e1 > 1" step="1">
                Datos Generales
            </v-stepper-step>
            <v-divider></v-divider>
            <v-stepper-step :editable="true" :complete="e1 > 2" step="2">
                Datos Personales
            </v-stepper-step>
            <v-divider></v-divider>
            <v-stepper-step :editable="true" :complete="e1 > 3" step="3">
                Datos Evaluación
            </v-stepper-step>

            <v-divider></v-divider>
            <v-stepper-step :editable="showStepFoto" step="4">
                Cargar Foto
            </v-stepper-step>
        </v-stepper-header>
        <v-stepper-items>
            <v-stepper-content step="1" class="grey lighten-1">
                <v-card class="mb-4" color="grey lighten-1">
                    <v-snackbar v-model="snackbar">
                        {{ textSnackbar }}
                        <template v-slot:action="{ attrs }">
                            <v-btn
                                color="pink"
                                text
                                v-bind="attrs"
                                @click="snackbar = false"
                            >
                                Cerrar
                            </v-btn>
                        </template>
                    </v-snackbar>
                    <v-dialog
                        v-model="dialogFullScreanRegimenPensionario"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanRegimenPensionario = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanRegimenPensionario = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-regimenPensionario></app-regimenPensionario>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanRiesgoCrediticio"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanRiesgoCrediticio = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanRiesgoCrediticio = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-riesgoCrediticio></app-riesgoCrediticio>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanRegimenLaboral"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanRegimenLaboral = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanRegimenLaboral = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-regimenLaboral></app-regimenLaboral>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanTipoContrato"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanTipoContrato = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanTipoContrato = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-tipoContrato></app-tipoContrato>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanCargo"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullScreanCargo = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="dialogFullScreanCargo = false"
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-cargo></app-cargo>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanInsEducativa"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanInsEducativa = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanInsEducativa = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-insEducativa></app-insEducativa>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanTipoPlanilla"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanTipoPlanilla = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanTipoPlanilla = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-tipoPlanilla></app-tipoPlanilla>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanUgel"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullScreanUgel = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="dialogFullScreanUgel = false"
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-ugel></app-ugel>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanGradoEstudios"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanGradoEstudios = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanGradoEstudios = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-gradoEstudios></app-gradoEstudios>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanProfesion"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullScreanProfesion = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanProfesion = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-profesion></app-profesion>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanTipoVivienda"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanTipoVivienda = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanTipoVivienda = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-tipoVivienda></app-tipoVivienda>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullscrean"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullscrean = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="dialogFullscrean = false"
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-docIdentidad></app-docIdentidad>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanTipoSocio"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullScreanTipoSocio = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanTipoSocio = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-tipSocio></app-tipSocio>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanDepartamento"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="
                                        dialogFullScreanDepartamento = false
                                    "
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanDepartamento = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-departamento></app-departamento>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanProvincia"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullScreanProvincia = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanProvincia = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-provincia></app-provincia>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanDistrito"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullScreanDistrito = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanDistrito = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-distrito></app-distrito>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-form ref="form" lazy-validation>
                        <v-container>
                            <v-row>
                                <v-col md="8">
                                    <v-row>
                                        <v-col md="6">
                                            <v-autocomplete
                                                v-model="modelTipoDocumento"
                                                :items="itemsTipoDocumento"
                                                :loading="
                                                    isLoadingTipoDocumento
                                                "
                                                dense
                                                item-text="nombre"
                                                item-value="idtipodocid"
                                                label="Tipo Documento Identidad..."
                                                solo
                                                :append-icon="'mdi-plus-box'"
                                                @click:append="
                                                    showTipoDocumento
                                                "
                                                hide-details
                                                :rules="rules"
                                                required
                                                @click="initializeTipoDocumento"
                                                no-data-text="Cargando Tipo Documento.."
                                            >
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col md="6">
                                            <v-text-field
                                                v-model="
                                                    editSolicitudIngreso.dgnum_tipoDocIden
                                                "
                                                label="Nº Documento..."
                                                solo
                                                dense
                                                hide-details
                                                :append-icon="'mdi-api'"
                                                @click:append="
                                                    getDataTipDocIden
                                                "
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-col>
                                <v-col md="4">
                                    <v-row>
                                        <v-col md="12">
                                            <v-text-field
                                                v-model="
                                                    editSolicitudIngreso.dgcodModular
                                                "
                                                label="Cod. Modular..."
                                                solo
                                                dense
                                                hide-details
                                            ></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.dgape_paterno
                                        "
                                        label="Apellido Paterno..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.dgape_materno
                                        "
                                        label="Apellido Materno..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="editSolicitudIngreso.dgnombre"
                                        label="Nombres..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.dgcod_cargo
                                        "
                                        label="Código Cargo..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.dgcod_carben
                                        "
                                        label="Código Carben..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3">
                                    <v-autocomplete
                                        v-model="modelTipoSocio"
                                        :items="itemsTipoSocio"
                                        :loading="isLoadingTipoSocio"
                                        dense
                                        item-text="descripcion"
                                        item-value="abrev"
                                        label="Tipo Socio..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showTipoSocio"
                                        hide-details
                                        @click="initializeTipoSocio"
                                        no-data-text="Cargando Socio.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="3">
                                    <v-select
                                        :items="itemsEstadoCivil"
                                        v-model="
                                            editSolicitudIngreso.dgest_civil
                                        "
                                        label="Estado Civil..."
                                        item-text="nombre"
                                        item-value="id"
                                        solo
                                        dense
                                        hide-details
                                    ></v-select>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="editSolicitudIngreso.dgedad"
                                        label="Edad..."
                                        solo
                                        dense
                                        hide-details
                                        suffix="años"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.dgtelefono
                                        "
                                        label="Telefono..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="editSolicitudIngreso.dgmovil"
                                        label="Móvil..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3">
                                    <v-select
                                        v-model="editSolicitudIngreso.dgsexo"
                                        :items="itemsSexo"
                                        label="Sexo..."
                                        item-text="nombre"
                                        item-value="id"
                                        solo
                                        dense
                                        hide-details
                                    ></v-select>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="3">
                                    <v-menu
                                        ref="menu1"
                                        v-model="menu1"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                    >
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                v-model="dateFormatted"
                                                label="Fecha de Nacimiento"
                                                persistent-hint
                                                append-icon="mdi-calendar"
                                                v-bind="attrs"
                                                @blur="
                                                    date =
                                                        parseDate(dateFormatted)
                                                "
                                                hint="* Fecha de Nacimiento"
                                                v-on="on"
                                                dense
                                                solo
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="date"
                                            no-title
                                            @input="menu1 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col md="5">
                                    <v-text-field
                                        v-model="editSolicitudIngreso.dgemail"
                                        label="Correo..."
                                        solo
                                        dense
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4"> </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-dialog
                        v-model="dialogFullscrean"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullscrean = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="dialogFullscrean = false"
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-docIdentidad></app-docIdentidad>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-dialog
                        v-model="dialogFullScreanTipoSocio"
                        fullscreen
                        hide-overlay
                        transition="dialog-bottom-transition"
                    >
                        <v-card>
                            <v-toolbar dark color="indigo darken-4">
                                <v-btn
                                    icon
                                    dark
                                    @click="dialogFullScreanTipoSocio = false"
                                >
                                    <v-icon>mdi-close</v-icon>
                                </v-btn>
                                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                                <v-spacer></v-spacer>
                                <v-toolbar-items>
                                    <v-btn
                                        dark
                                        text
                                        @click="
                                            dialogFullScreanTipoSocio = false
                                        "
                                    >
                                        Regresar
                                    </v-btn>
                                </v-toolbar-items>
                            </v-toolbar>
                            <v-card-text class="mt-5">
                                <app-tipSocio></app-tipSocio>
                            </v-card-text>
                        </v-card>
                    </v-dialog>
                    <v-card-title class="pb-0"
                        >Lugar de Nacimiento</v-card-title
                    >
                    <v-form ref="lnform" lazy-validation>
                        <v-container>
                            <v-row>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="modelDepartamento"
                                        :items="itemsDepartamento"
                                        :loading="isLoadingDepartamento"
                                        dense
                                        item-text="nombre"
                                        item-value="iddep"
                                        label="Departamento..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showDepartamento"
                                        hide-details
                                        :rules="rules"
                                        required
                                        @click="initializeDepartamento"
                                        no-data-text="Cargando Departamentos.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="!isEditingProvincia"
                                        v-model="modelProvincia"
                                        :items="itemsProvincia"
                                        :loading="isLoadingProvincia"
                                        dense
                                        item-text="nombre"
                                        item-value="idprov"
                                        label="Provincia..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showProvincia"
                                        hide-details
                                        :rules="rules"
                                        required
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="!isEditingDistrito"
                                        v-model="modelDistrito"
                                        :items="itemsDistrito"
                                        :loading="isLoadingDistrito"
                                        dense
                                        item-text="distrito"
                                        item-value="iddist"
                                        label="Distrito..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showDistrito"
                                        @change="
                                            (event) =>
                                                changeDistrito(
                                                    event,
                                                    itemsDistrito
                                                )
                                        "
                                        hide-details
                                        :rules="rules"
                                        required
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-card-title class="pb-0">Dirección</v-card-title>
                    <v-form ref="dnform" lazy-validation>
                        <v-container>
                            <v-row>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.dndireccion
                                        "
                                        label="Dirección..."
                                        solo
                                        dense
                                        hide-details
                                        append-icon="mdi-close-circle"
                                        :rules="rules"
                                        required
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.dnreferencia
                                        "
                                        label="Referencia..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="modelTipoVivienda"
                                        :items="itemsTipoVivienda"
                                        :loading="isLoadingTipoVivienda"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Tipo de Vivienda..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showTipoVivienda"
                                        hide-details
                                        @click="initializeTipoVivienda"
                                        no-data-text="Cargando Tipos de Vivienda.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="dnmodelDepartamento"
                                        :items="dnitemsDepartamento"
                                        :loading="dnisLoadingDepartamento"
                                        dense
                                        item-text="nombre"
                                        item-value="iddep"
                                        label="Departamento..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="dnshowDepartamento"
                                        hide-details
                                        :rules="rules"
                                        required
                                        @click="dninitializeDepartamento"
                                        no-data-text="Cargando Departamentos.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="!dnisEditingProvincia"
                                        v-model="dnmodelProvincia"
                                        :items="dnitemsProvincia"
                                        :loading="dnisLoadingProvincia"
                                        dense
                                        item-text="nombre"
                                        item-value="idprov"
                                        label="Provincia..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="dnshowProvincia"
                                        hide-details
                                        :rules="rules"
                                        required
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="!dnisEditingDistrito"
                                        v-model="dnmodelDistrito"
                                        :items="dnitemsDistrito"
                                        :loading="dnisLoadingDistrito"
                                        dense
                                        item-text="distrito"
                                        item-value="iddist"
                                        label="Distrito..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @change="
                                            (event) =>
                                                dnchangeDistrito(
                                                    event,
                                                    dnitemsDistrito
                                                )
                                        "
                                        @click:append="dnshowDistrito"
                                        hide-details
                                        :rules="rules"
                                        required
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-card-title class="pb-0"
                        >Datos Profesionales</v-card-title
                    >
                    <v-form>
                        <v-container>
                            <v-row>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="modelGradoEstudios"
                                        :items="itemsGradoEstudios"
                                        :loading="isLoadingGradoEstudios"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Grado de Estudios..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showGradoEstudios"
                                        hide-details
                                        @click="initializeGradoEstudios"
                                        no-data-text="Cargando Grados de Estudio.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="modelProfesion"
                                        :items="itemsProfesion"
                                        :loading="isLoadingProfesion"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Profesión..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showProfesion"
                                        hide-details
                                        @click="initializeProfesion"
                                        no-data-text="Cargando Profesiones.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-select
                                        :items="itemsNivelMagisterial"
                                        v-model="
                                            editSolicitudIngreso.dpid_nivMagisterial
                                        "
                                        label="Nivel Magisterial..."
                                        item-text="nombre"
                                        item-value="id"
                                        solo
                                        dense
                                        hide-details
                                    ></v-select>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-row>
                    <v-col class="text-right">
                        <v-btn color="primary" @click="next"> Siguiente </v-btn>
                    </v-col>
                </v-row>
            </v-stepper-content>
            <v-stepper-content step="2" class="grey lighten-1">
                <v-snackbar v-model="snackbar">
                    {{ textSnackbar }}
                    <template v-slot:action="{ attrs }">
                        <v-btn
                            color="pink"
                            text
                            v-bind="attrs"
                            @click="snackbar = false"
                        >
                            Cerrar
                        </v-btn>
                    </template>
                </v-snackbar>
                <v-dialog
                    v-model="dialogFullScreanParentesco"
                    fullscreen
                    hide-overlay
                    transition="dialog-bottom-transition"
                >
                    <v-card>
                        <v-toolbar dark color="indigo darken-4">
                            <v-btn
                                icon
                                dark
                                @click="dialogFullScreanParentesco = false"
                            >
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                            <v-toolbar-title>Ventana Modal</v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-toolbar-items>
                                <v-btn
                                    dark
                                    text
                                    @click="dialogFullScreanParentesco = false"
                                >
                                    Regresar
                                </v-btn>
                            </v-toolbar-items>
                        </v-toolbar>
                        <v-card-text class="mt-5">
                            <app-parentesco></app-parentesco>
                        </v-card-text>
                    </v-card>
                </v-dialog>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-card-title class="pb-0">Conyuge</v-card-title>
                    <v-form ref="cyform" lazy-validation>
                        <v-container>
                            <v-row>
                                <v-col md="3">
                                    <v-autocomplete
                                        v-model="cymodelTipoDocumento"
                                        :items="cyitemsTipoDocumento"
                                        :loading="cyisLoadingTipoDocumento"
                                        dense
                                        item-text="nombre"
                                        item-value="idtipodocid"
                                        label="Tipo Documento Identidad..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="cyshowTipoDocumento"
                                        hide-details
                                        :rules="rules"
                                        required
                                        @click="cyinitializeTipoDocumento"
                                        no-data-text="Cargando Tipos de Documento.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.cynum_tipoDocIden
                                        "
                                        label="Nº Documento..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3">
                                    <v-select
                                        v-model="editSolicitudIngreso.cysexo"
                                        :items="itemsSexo"
                                        label="Sexo..."
                                        item-text="nombre"
                                        item-value="id"
                                        solo
                                        dense
                                        hide-details
                                    ></v-select>
                                </v-col>
                                <v-col md="3">
                                    <v-select
                                        :items="itemsEstadoCivil"
                                        v-model="
                                            editSolicitudIngreso.cyest_civil
                                        "
                                        label="Estado Civil..."
                                        item-text="nombre"
                                        item-value="id"
                                        solo
                                        dense
                                        hide-details
                                    ></v-select>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.cyape_paterno
                                        "
                                        label="Apellido Paterno..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.cyape_materno
                                        "
                                        label="Apellido Materno..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="editSolicitudIngreso.cynombre"
                                        label="Nombres..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="3">
                                    <v-menu
                                        ref="menu2"
                                        v-model="menu2"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                    >
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                v-model="cydateFormatted"
                                                label="Fecha de Nacimiento"
                                                persistent-hint
                                                append-icon="mdi-calendar"
                                                v-bind="attrs"
                                                @blur="
                                                    cydate =
                                                        parseDate(
                                                            cydateFormatted
                                                        )
                                                "
                                                hint="* Fecha de Nacimiento"
                                                v-on="on"
                                                dense
                                                solo
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="cydate"
                                            no-title
                                            @input="menu2 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.cytelefono
                                        "
                                        label="Telefono..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="editSolicitudIngreso.cymovil"
                                        label="Móvil..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.cycar_familiar
                                        "
                                        label="Carga Familiar..."
                                        solo
                                        dense
                                        hide-details
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-card-title class="pb-0">
                        <v-layout align-center justify-center text-xs-center>
                            <v-flex xs6> Familiar de Referencia </v-flex>
                            <v-flex xs6>
                                <v-layout justify-end align-end>
                                    <v-switch
                                        v-model="modelFrActive"
                                        color="indigo darken-2"
                                        hide-details
                                        class="mt-0"
                                        stl
                                    ></v-switch>
                                </v-layout>
                            </v-flex>
                        </v-layout>
                    </v-card-title>
                    <v-form ref="frform" lazy-validation>
                        <v-container>
                            <v-row>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="elementActive.frActive1"
                                        v-model="frmodelTipoDocumento"
                                        :items="fritemsTipoDocumento"
                                        :loading="frisLoadingTipoDocumento"
                                        dense
                                        item-text="nombre"
                                        item-value="idtipodocid"
                                        label="Tipo Documento Identidad..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="frshowTipoDocumento"
                                        hide-details
                                        :rules="rules"
                                        required
                                        @click="frinitializeTipoDocumento"
                                        no-data-text="Cargando Tipos de Documento.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.frnum_tipoDocIden
                                        "
                                        label="Nº Documento..."
                                        solo
                                        dense
                                        hide-details
                                        :disabled="elementActive.frActive2"
                                        :rules="rules"
                                        required
                                        append-icon="mdi-close-circle"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="elementActive.frActive3"
                                        v-model="
                                            editSolicitudIngreso.frid_parentesco
                                        "
                                        :items="itemsParentesco"
                                        :loading="isLoadingParentesco"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Parentesco..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showParentesco"
                                        hide-details
                                        required
                                        :rules="rules"
                                        @click="initializeParentesco"
                                        no-data-text="Cargando Parentescos.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="8">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.frdireccion
                                        "
                                        label="Dirección..."
                                        solo
                                        dense
                                        hide-details
                                        :disabled="elementActive.frActive4"
                                        :rules="rules"
                                        required
                                        append-icon="mdi-close-circle"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.frtelefono
                                        "
                                        label="Teléfono..."
                                        solo
                                        dense
                                        hide-details
                                        :disabled="elementActive.frActive5"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.frape_paterno
                                        "
                                        label="Apellido Paterno..."
                                        solo
                                        dense
                                        hide-details
                                        :disabled="elementActive.frActive6"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.frape_materno
                                        "
                                        label="Apellido Materno..."
                                        solo
                                        dense
                                        hide-details
                                        :disabled="elementActive.frActive7"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4">
                                    <v-text-field
                                        v-model="editSolicitudIngreso.frnombre"
                                        label="Nombres..."
                                        solo
                                        dense
                                        hide-details
                                        :disabled="elementActive.frActive8"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="elementActive.frActive9"
                                        v-model="frmodelDepartamento"
                                        :items="fritemsDepartamento"
                                        :loading="frisLoadingDepartamento"
                                        dense
                                        item-text="nombre"
                                        item-value="iddep"
                                        label="Departamento..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="frshowDepartamento"
                                        hide-details
                                        :rules="rules"
                                        required
                                        @click="frinitializeDepartamento"
                                        no-data-text="Cargando Departamentos.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="
                                            !frisEditingProvincia ||
                                            elementActive.frActive10
                                        "
                                        v-model="frmodelProvincia"
                                        :items="fritemsProvincia"
                                        :loading="frisLoadingProvincia"
                                        dense
                                        item-text="nombre"
                                        item-value="idprov"
                                        label="Provincia..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="frshowProvincia"
                                        hide-details
                                        :rules="rules"
                                        required
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        :disabled="
                                            !frisEditingDistrito ||
                                            elementActive.frActive11
                                        "
                                        v-model="frmodelDistrito"
                                        :items="fritemsDistrito"
                                        :loading="frisLoadingDistrito"
                                        dense
                                        item-text="distrito"
                                        item-value="iddist"
                                        label="Distrito..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="frshowDistrito"
                                        @change="
                                            (event) =>
                                                frchangeDistrito(
                                                    event,
                                                    fritemsDistrito
                                                )
                                        "
                                        hide-details
                                        :rules="rules"
                                        required
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-card-title class="pb-0"> Datos Laborales </v-card-title>
                    <v-form>
                        <v-container>
                            <v-row>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="dtmodelUgel"
                                        :items="itemsUgel"
                                        :loading="isLoadingUgel"
                                        dense
                                        item-text="descripcion"
                                        item-value="idugel"
                                        label="Ugel..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showUgel"
                                        hide-details
                                        @click="initializeUgel"
                                        no-data-text="Cargando Ugel.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="dtmodelTipoPlanilla"
                                        :items="itemsTipoPlanilla"
                                        :loading="isLoadingTipoPlanilla"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Tipo de Planilla..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showTipoPlanilla"
                                        hide-details
                                        @click="initializeTipoPlanilla"
                                        no-data-text="Cargando Tipos de planilla.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="dtmodelConvenio"
                                        :items="itemsConvenio"
                                        :loading="isLoadingConvenio"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Convenio..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showConvenio"
                                        hide-details
                                        @click="initializeConvenio"
                                        no-data-text="Cargando Convenios.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="dtmodelInsEducativa"
                                        :items="itemsInsEducativa"
                                        :loading="isLoadingInsEducativa"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Institución Educativa..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showInsEducativa"
                                        hide-details
                                        @click="initializeInsEducativa"
                                        no-data-text="Cargando Instituciones Educativas.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="dtmodelCargo"
                                        :items="itemsCargo"
                                        :loading="isLoadingCargo"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Cargo..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showCargo"
                                        hide-details
                                        @click="initializeCargo"
                                        no-data-text="Cargando Cargos.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="dtmodelTipoContrato"
                                        :items="itemsTipoContrato"
                                        :loading="isLoadingTipoContrato"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Tipo Contrato..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showTipoContrato"
                                        hide-details
                                        @click="initializeTipoContrato"
                                        no-data-text="Cargando Tipos de contrato.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="3">
                                    <v-autocomplete
                                        v-model="dtmodelRegimenLaboral"
                                        :items="itemsRegimenLaboral"
                                        :loading="isLoadingRegimenLaboral"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Regimen Laboral..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showRegimenLaboral"
                                        hide-details
                                        @click="initializeRegimenLaboral"
                                        no-data-text="Cargando Regimenes Laborales.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="3">
                                    <v-autocomplete
                                        v-model="dtmodelRegimenPensionario"
                                        :items="itemsRegimenPensionario"
                                        :loading="isLoadingRegimenPensionario"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Regimen Pensionario..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showRegimenPensionario"
                                        hide-details
                                        @click="initializeRegimenPensionario"
                                        no-data-text="Cargando Regimenes Pensionarios.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="3">
                                    <v-menu
                                        ref="menu3"
                                        v-model="menu3"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                    >
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                v-model="dtdateFormatted"
                                                label="Fecha de Nacimiento"
                                                persistent-hint
                                                append-icon="mdi-calendar"
                                                v-bind="attrs"
                                                @blur="
                                                    dtdate =
                                                        parseDate(
                                                            dtdateFormatted
                                                        )
                                                "
                                                hint="* Fecha de Ingreso"
                                                v-on="on"
                                                dense
                                                solo
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="dtdate"
                                            no-title
                                            @input="menu3 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col md="3">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.dtanhServicio
                                        "
                                        persistent-hint
                                        hint="* Años de Servicios"
                                        solo
                                        dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-card-title class="pb-0">Boleta</v-card-title>
                    <v-form ref="btform" lazy-validation>
                        <v-container>
                            <v-row>
                                <v-col md="4" class="pb-0">
                                    <v-menu
                                        ref="menu4"
                                        v-model="menu4"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                    >
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                v-model="btdateFormatted2"
                                                label="Fecha Boleta"
                                                persistent-hint
                                                append-icon="mdi-calendar"
                                                v-bind="attrs"
                                                @blur="
                                                    btdate2 =
                                                        parseDate(
                                                            btdateFormatted2
                                                        )
                                                "
                                                hint="* Fecha de Boleta"
                                                v-on="on"
                                                dense
                                                solo
                                                :rules="rules"
                                                required
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="btdate2"
                                            no-title
                                            @input="menu4 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col md="4" class="pb-0">
                                    <v-menu
                                        ref="menu5"
                                        v-model="menu5"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                    >
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                v-model="btdateFormatted3"
                                                label="Fecha Término"
                                                persistent-hint
                                                append-icon="mdi-calendar"
                                                v-bind="attrs"
                                                @blur="
                                                    btdate3 =
                                                        parseDate(
                                                            btdateFormatted3
                                                        )
                                                "
                                                hint="* Fecha de Término"
                                                v-on="on"
                                                dense
                                                solo
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="btdate3"
                                            no-title
                                            @input="menu5 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col md="4" class="pb-0">
                                    <v-autocomplete
                                        v-model="btmodelRiesgoCrediticio"
                                        :items="itemsRiesgoCrediticio"
                                        :loading="isLoadingRiesgoCrediticio"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Riesgo Crediticio..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="showRiesgoCrediticio"
                                        hide-details
                                        @click="initializeRiesgoCrediticio"
                                        no-data-text="Cargando Riesgos Crediticios.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="2" class="pt-0 pb-0"
                                    ><v-text-field
                                        v-model="editSolicitudIngreso.btsueldo"
                                        persistent-hint
                                        hint="* Sueldo"
                                        solo
                                        dense
                                        @keypress="isNumber($event)"
                                    ></v-text-field
                                ></v-col>
                                <v-col md="2" class="pt-0 pb-0"
                                    ><v-text-field
                                        v-model="
                                            editSolicitudIngreso.btescolaridad
                                        "
                                        persistent-hint
                                        hint="* Escolaridad"
                                        solo
                                        dense
                                        @keypress="isNumber($event)"
                                    ></v-text-field
                                ></v-col>
                                <v-col md="2" class="pt-0 pb-0"
                                    ><v-text-field
                                        v-model="
                                            editSolicitudIngreso.btgratificacion
                                        "
                                        persistent-hint
                                        hint="* Gratificación"
                                        solo
                                        dense
                                        @keypress="isNumber($event)"
                                    ></v-text-field
                                ></v-col>
                                <v-col md="2" class="pt-0 pb-0"
                                    ><v-text-field
                                        v-model="
                                            editSolicitudIngreso.btincentivos
                                        "
                                        persistent-hint
                                        hint="* Incentivos"
                                        solo
                                        dense
                                        @keypress="isNumber($event)"
                                    ></v-text-field
                                ></v-col>
                                <v-col md="2" class="pt-0 pb-0"
                                    ><v-text-field
                                        v-model="
                                            editSolicitudIngreso.btotrosdesct
                                        "
                                        persistent-hint
                                        hint="* Otros Dscto"
                                        solo
                                        dense
                                        @keypress="isNumber($event)"
                                    ></v-text-field
                                ></v-col>
                                <v-col md="2" class="pt-0 pb-0"
                                    ><v-text-field
                                        v-model="
                                            editSolicitudIngreso.btimponible
                                        "
                                        persistent-hint
                                        hint="* Imponible"
                                        solo
                                        dense
                                        @keypress="isNumber($event)"
                                    ></v-text-field
                                ></v-col>
                            </v-row>
                            <v-row>
                                <v-col md="2" class="pt-0 pb-0">
                                    <v-text-field
                                        v-model="cancularLiquido"
                                        persistent-hint
                                        hint="* Líquido"
                                        solo
                                        dense
                                        :readonly="activebtLiquido"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="10" class="pt-0 pb-0">
                                    <v-textarea
                                        v-model="
                                            editSolicitudIngreso.btobservacion
                                        "
                                        label="Observación..."
                                        solo
                                        dense
                                        required
                                        :rules="rules"
                                    ></v-textarea>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-row>
                    <v-col class="text-right">
                        <v-btn color="primary" @click="next2">
                            Siguiente
                        </v-btn>
                    </v-col>
                </v-row>
            </v-stepper-content>
            <v-stepper-content step="3" class="grey lighten-1">
                <v-snackbar v-model="snackbar">
                    {{ textSnackbar }}
                    <template v-slot:action="{ attrs }">
                        <v-btn
                            color="pink"
                            text
                            v-bind="attrs"
                            @click="snackbar = false"
                        >
                            Cerrar
                        </v-btn>
                    </template>
                </v-snackbar>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-card-title class="pb-0"> Datos Aprobación </v-card-title>
                    <v-form ref="daform" lazy-validation>
                        <v-container>
                            <v-row>
                                <v-col md="4">
                                    <v-autocomplete
                                        v-model="
                                            editSolicitudIngreso.daest_solicitud
                                        "
                                        :items="daitemsEstadoSolicitud"
                                        :loading="daisLoadingEstadoSolicitud"
                                        dense
                                        item-text="descripcion_ane"
                                        item-value="identificador_ane"
                                        label="Estado de Solicitud..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        hide-details
                                        :rules="rules"
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="3" class="pb-0">
                                    <v-menu
                                        ref="menu6"
                                        v-model="menu6"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                    >
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                v-model="dadateFormatted"
                                                label="Fecha de Sesión"
                                                persistent-hint
                                                append-icon="mdi-calendar"
                                                v-bind="attrs"
                                                @blur="
                                                    dadate =
                                                        parseDate(
                                                            dadateFormatted
                                                        )
                                                "
                                                hint="* Fecha de Sesión"
                                                v-on="on"
                                                dense
                                                solo
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="dadate"
                                            no-title
                                            @input="menu6 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col md="3">
                                    <v-autocomplete
                                        v-model="damodelLibro"
                                        :items="daitemsLibro"
                                        :loading="daisLoadingLibro"
                                        dense
                                        item-text="descripcion_ane"
                                        item-value="identificador_ane"
                                        label="Libro..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        hide-details
                                        @click="initializeLibro"
                                        no-data-text="Cargando Libro.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="2" class="pb-0">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.danum_libro
                                        "
                                        persistent-hint
                                        hint="* Número de Libro"
                                        solo
                                        dense
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="3" class="pt-0">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.danro_folio
                                        "
                                        persistent-hint
                                        hint="* Número de Folio"
                                        solo
                                        dense
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3" class="pt-0">
                                    <v-text-field
                                        v-model="
                                            editSolicitudIngreso.danro_cuenta
                                        "
                                        persistent-hint
                                        hint="* Número de Cuenta"
                                        solo
                                        dense
                                    ></v-text-field>
                                </v-col>
                                <v-col md="6" class="pt-0">
                                    <v-textarea
                                        v-model="
                                            editSolicitudIngreso.daobservacion
                                        "
                                        label="Observación..."
                                        solo
                                        dense
                                        required
                                        :rules="rules"
                                        rows="2"
                                    ></v-textarea>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-card class="mb-4" color="grey lighten-1">
                    <v-card-title class="pb-0">
                        <v-layout align-center justify-center text-xs-center>
                            <v-flex xs6> Beneficiarios </v-flex>
                            <v-flex xs6>
                                <v-layout justify-end align-end>
                                    <v-switch
                                        v-model="modelbeActive"
                                        color="indigo darken-2"
                                        hide-details
                                        class="mt-0"
                                        stl
                                    ></v-switch>
                                </v-layout>
                            </v-flex>
                        </v-layout>
                    </v-card-title>
                    <v-form ref="beform" lazy-validation>
                        <v-container>
                            <v-row>
                                <v-col md="3" class="pb-0">
                                    <v-autocomplete
                                        :disabled="elementbeActive.beActive1"
                                        v-model="bemodelTipoDocumento"
                                        :items="beitemsTipoDocumento"
                                        :loading="beisLoadingTipoDocumento"
                                        dense
                                        item-text="nombre"
                                        item-value="idtipodocid"
                                        label="Tipo Documento Identidad..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="beshowTipoDocumento"
                                        hide-details
                                        :rules="rules"
                                        required
                                        @click="beinitializeTipoDocumento"
                                        no-data-text="Cargando Tipos de Documento.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                                <v-col md="3" class="pb-0">
                                    <v-text-field
                                        :disabled="elementbeActive.beActive2"
                                        v-model="
                                            editSolicitudIngreso.benro_doc_identidad
                                        "
                                        label="N° de documento de identidad..."
                                        solo
                                        dense
                                        :rules="rules"
                                        required
                                        append-icon="mdi-close-circle"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3" class="pb-0">
                                    <v-text-field
                                        :disabled="elementbeActive.beActive3"
                                        v-model="
                                            editSolicitudIngreso.beape_paterno
                                        "
                                        label="Apellido paterno..."
                                        solo
                                        dense
                                        :rules="rules"
                                        required
                                        append-icon="mdi-close-circle"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="3" class="pb-0">
                                    <v-text-field
                                        :disabled="elementbeActive.beActive4"
                                        v-model="
                                            editSolicitudIngreso.beape_materno
                                        "
                                        label="Apellido Materno..."
                                        solo
                                        dense
                                        :rules="rules"
                                        required
                                        append-icon="mdi-close-circle"
                                    ></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="4" class="pt-0">
                                    <v-text-field
                                        :disabled="elementbeActive.beActive5"
                                        v-model="editSolicitudIngreso.benombre"
                                        label="Nombres..."
                                        solo
                                        dense
                                        :rules="rules"
                                        required
                                        append-icon="mdi-close-circle"
                                    ></v-text-field>
                                </v-col>
                                <v-col md="4" class="pt-0">
                                    <v-menu
                                        ref="menu7"
                                        v-model="menu7"
                                        :close-on-content-click="false"
                                        transition="scale-transition"
                                        offset-y
                                        max-width="290px"
                                        min-width="auto"
                                    >
                                        <template
                                            v-slot:activator="{ on, attrs }"
                                        >
                                            <v-text-field
                                                :disabled="
                                                    elementbeActive.beActive6
                                                "
                                                v-model="bedateFormatted"
                                                persistent-hint
                                                append-icon="mdi-calendar"
                                                v-bind="attrs"
                                                @blur="
                                                    bedate =
                                                        parseDate(
                                                            bedateFormatted
                                                        )
                                                "
                                                hint="* Fecha de Nacimiento"
                                                v-on="on"
                                                dense
                                                solo
                                            ></v-text-field>
                                        </template>
                                        <v-date-picker
                                            v-model="bedate"
                                            no-title
                                            @input="menu7 = false"
                                        ></v-date-picker>
                                    </v-menu>
                                </v-col>
                                <v-col md="4" class="pt-0">
                                    <v-autocomplete
                                        :disabled="elementbeActive.beActive7"
                                        v-model="bemodelParentesco"
                                        :items="beitemsParentesco"
                                        :loading="beisLoadingParentesco"
                                        dense
                                        item-text="descripcion"
                                        item-value="idmaestro"
                                        label="Parentesco..."
                                        solo
                                        :append-icon="'mdi-plus-box'"
                                        @click:append="beshowParentesco"
                                        hide-details
                                        required
                                        :rules="rules"
                                        @click="beinitializeParentesco"
                                        no-data-text="Cargando Parentescos.."
                                    >
                                    </v-autocomplete>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="10">
                                    <v-data-table
                                        dense
                                        :headers="beheaders"
                                        :items="bedesserts"
                                        item-key="benro_doc_identidad"
                                        class="elevation-1"
                                    >
                                        <template
                                            v-slot:[`item.actions`]="{ item }"
                                        >
                                            <v-icon
                                                small
                                                @click="deleteItem(item)"
                                            >
                                                mdi-delete
                                            </v-icon>
                                        </template>
                                        <template v-slot:no-data>
                                            Tabla vacía...
                                        </template>
                                    </v-data-table>
                                </v-col>
                                <v-col md="2" class="text-center">
                                    <v-btn
                                        color="primary"
                                        @click="agregarBeneficiario"
                                        :disabled="elementbeActive.beActive8"
                                    >
                                        Agregar
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-form>
                </v-card>
                <v-row>
                    <v-col class="text-right">
                        <v-btn color="primary" @click="guardar1">
                            Guardar
                        </v-btn>
                    </v-col>
                </v-row>
            </v-stepper-content>
            <v-stepper-content step="4" class="grey lighten-1">
                <v-snackbar v-model="snackbar">
                    {{ textSnackbar }}
                    <template v-slot:action="{ attrs }">
                        <v-btn
                            color="pink"
                            text
                            v-bind="attrs"
                            @click="snackbar = false"
                        >
                            Cerrar
                        </v-btn>
                    </template>
                </v-snackbar>
                <v-row>
                    <v-col md="3"></v-col>
                    <v-col md="6">
                        <v-card class="mb-4 text-center">
                            <v-card-text>
                                <v-avatar size="240" class="pt-4">
                                    <img :src="url" alt="Cargar Foto..." />
                                </v-avatar>
                                <v-form class="mt-5">
                                    <v-row>
                                        <v-col md="1"></v-col>
                                        <v-col md="7" class="text-right">
                                            <v-file-input
                                                v-model="image"
                                                accept="image/*"
                                                label="Foto..."
                                                prepend-icon="mdi-paperclip"
                                                outlined
                                                dense
                                            ></v-file-input>
                                        </v-col>
                                        <v-col md="3" class="text-left">
                                            <v-btn
                                                dark
                                                color="indigo darken-4"
                                                @click="cargarFoto"
                                            >
                                                Subir
                                            </v-btn>
                                        </v-col>
                                        <v-col md="1"></v-col>
                                    </v-row>
                                </v-form>
                            </v-card-text>
                        </v-card>
                        <v-row>
                            <v-col class="text-right">
                                <v-btn color="primary" @click="nuevasolingadm">
                                    Nuevo
                                </v-btn>
                                <v-btn color="primary" @click="buscarsolingadm">
                                    Buscar
                                </v-btn>
                                <v-btn
                                    color="primary"
                                    :disabled="btnImprimir"
                                    @click="imprimir"
                                >
                                    Imprimir
                                </v-btn>
                            </v-col>
                        </v-row>
                    </v-col>
                    <v-col md="3"></v-col>
                </v-row>
            </v-stepper-content>
        </v-stepper-items>
    </v-stepper>
</template>
<script>
import axios from "axios";

const CancelToken = axios.CancelToken;
const source = CancelToken.source();

export default {
    data(vm) {
        return {
            source: true,
            img_default: "images/avatar/foto-default.jpg",
            btnImprimir: true,
            e1: 1,
            idpersona: "",
            identificador_sad: null,
            idconyuge: "",
            showStepFoto: false,
            rules: [(v) => !!v || "Este campo es requerido"],
            editSolicitudIngreso: {
                dgidSolicitudIngreso: 0,
                dgid_tipDocIden: 0,
                dgnum_tipoDocIden: "",
                dgcodModular: "",
                dgape_paterno: "",
                dgape_materno: "",
                dgnombre: "",
                dgcod_cargo: "",
                dgcod_carben: "",
                dgtip_socio: "",
                dgest_civil: "",
                dgedad: "",
                dgtelefono: "",
                dgmovil: "",
                dgfec_nacimiento: "",
                dgsexo: "",
                dgemail: "",
                dgimage: null,
                //
                lniddep: 0,
                lnidprov: 0,
                lniddist: 0,
                lncodigo: "",
                //
                dndireccion: "",
                dnreferencia: "",
                dnid_tipvi: 0,
                dniddep: 0,
                dnidprov: 0,
                dniddist: 0,
                dncodigo: "",
                //
                dpid_gradoEstudio: 0,
                dpid_profesion: 0,
                dpid_nivMagisterial: 0,
                //
                cyid_tipDocIden: 0,
                cynum_tipoDocIden: "",
                cysexo: "",
                cyest_civil: "",
                cyape_paterno: "",
                cyape_materno: "",
                cynombre: "",
                cytelefono: "",
                cymovil: "",
                cyfec_nacimiento: "",
                cycar_familiar: null,
                //
                frid_tipDocIden: 0,
                frnum_tipoDocIden: "",
                frid_parentesco: 0,
                frdireccion: "",
                frtelefono: "",
                frape_paterno: "",
                frape_materno: "",
                frnombre: "",
                friddep: 0,
                fridprov: 0,
                friddist: 0,
                frcodigo: "",
                //
                dtid_ugel: 0,
                dtid_tipoPlanilla: 0,
                dtid_convenio: 0,
                dtid_insEducativa: 0,
                dtid_cargo: 0,
                dtid_tipoContrato: 0,
                dtid_regimenLaboral: 0,
                dtid_regimenPensionario: 0,
                dtfec_ingreso: "",
                dtanhServicio: 0,
                //
                btfec_boleta: "",
                btfec_termino: "",
                btid_riesCrediticio: 0,
                btsueldo: 0,
                btescolaridad: 0,
                btgratificacion: 0,
                btincentivos: 0,
                btotrosdesct: 0,
                btimponible: 0,
                btliquido: 0,
                btobservacion: "",
                //
                daest_solicitud: 0,
                dafec_sesion: "",
                datip_libro: "",
                danro_cuenta: "",
                danum_libro: "",
                danro_folio: "",
                daobservacion: "-",
                daaprobacion: "00",
                //
                beid_tipDocIden: 0,
                benro_doc_identidad: "",
                beape_paterno: "",
                beape_materno: "",
                benombre: "",
                beid_parentesco: 0,
                befec_nacimiento: "",
            },
            itemsEstadoCivil: [
                { id: "S", nombre: "Soltero(a)" },
                { id: "C", nombre: "Casado(a)" },
                { id: "V", nombre: "Viudo(a)" },
                { id: "D", nombre: "Divorciado(a)" },
                { id: "P", nombre: "Conviviente" },
            ],
            itemsSexo: [
                { id: "M", nombre: "Masculino" },
                { id: "F", nombre: "Femenino" },
            ],
            itemsNivelMagisterial: [
                { id: "1", nombre: "Primera Escala Magisterial" },
                { id: "2", nombre: "Segunda Escala Magisterial" },
                { id: "3", nombre: "Tercera Escala Magisterial" },
                { id: "4", nombre: "Cuarta Escala Magisterial" },
                { id: "5", nombre: "Quinta Escala Magisterial" },
                { id: "6", nombre: "Sexta Escala Magisterial" },
                { id: "7", nombre: "Séptima Escala Magisterial" },
                { id: "8", nombre: "Octava Escala Magisterial" },
            ],
            bedesserts: [],
            beheaders: [
                { text: "N° Doc", value: "7" },
                { text: "Ape. Paterno", value: "3" },
                { text: "Ape. Materno", value: "4" },
                { text: "Nombres", value: "5" },
                {
                    text: "Fec. Nacimiento",
                    value: "8",
                },
                { text: "Acciones", value: "actions", sortable: false },
            ],
            validarReferencia: false,
            bevalidarReferencia: false,
            image: null,
            imageName: "",
            daisLoadingLibro: false,
            daitemsLibro: [],
            damodelLibro: null,
            daisLoadingEstadoSolicitud: false,
            daitemsEstadoSolicitud: [],
            damodelEstadoSolicitud: null,
            beisLoadingTipoDocumento: false,
            beitemsTipoDocumento: [],
            bemodelTipoDocumento: null,
            isEditingTipoDocumento: false,
            isLoadingTipoDocumento: false,
            itemsTipoDocumento: [],
            modelTipoDocumento: null,
            cyisEditingTipoDocumento: false,
            cyisLoadingTipoDocumento: false,
            cyitemsTipoDocumento: [],
            cymodelTipoDocumento: null,
            frisEditingTipoDocumento: false,
            frisLoadingTipoDocumento: false,
            fritemsTipoDocumento: [],
            frmodelTipoDocumento: null,
            isEditingTipoSocio: false,
            isLoadingTipoSocio: false,
            itemsTipoSocio: [],
            modelTipoSocio: null,
            isEditingDepartamento: false,
            isLoadingDepartamento: false,
            itemsDepartamento: [],
            modelDepartamento: null,
            dnisEditingDepartamento: false,
            dnisLoadingDepartamento: false,
            dnitemsDepartamento: [],
            dnmodelDepartamento: null,
            frisEditingDepartamento: false,
            frisLoadingDepartamento: false,
            fritemsDepartamento: [],
            frmodelDepartamento: null,
            isEditingProvincia: false,
            isLoadingProvincia: false,
            itemsProvincia: [],
            modelProvincia: null,
            dnisEditingProvincia: false,
            dnisLoadingProvincia: false,
            dnitemsProvincia: [],
            dnmodelProvincia: null,
            frisEditingProvincia: false,
            frisLoadingProvincia: false,
            fritemsProvincia: [],
            frmodelProvincia: null,
            isEditingDistrito: false,
            isLoadingDistrito: false,
            itemsDistrito: [],
            modelDistrito: null,
            dnmodelDistrito: null,
            dnisEditingDistrito: false,
            dnisLoadingDistrito: false,
            dnitemsDistrito: [],
            frmodelDistrito: null,
            frisEditingDistrito: false,
            frisLoadingDistrito: false,
            fritemsDistrito: [],
            isEditingTipoVivienda: false,
            isLoadingTipoVivienda: false,
            itemsTipoVivienda: [],
            modelTipoVivienda: null,
            isEditingGradoEstudios: false,
            isLoadingGradoEstudios: false,
            itemsGradoEstudios: [],
            modelGradoEstudios: null,
            isEditingProfesion: false,
            isLoadingProfesion: false,
            itemsProfesion: [],
            modelProfesion: null,
            isEditingParentesco: false,
            isLoadingParentesco: false,
            itemsParentesco: [],
            frmodelParentesco: null,
            beisLoadingParentesco: false,
            beitemsParentesco: [],
            bemodelParentesco: null,
            isEditingUgel: false,
            isLoadingUgel: false,
            itemsUgel: [],
            dtmodelUgel: null,
            isEditingTipoPlanilla: false,
            isLoadingTipoPlanilla: false,
            itemsTipoPlanilla: [],
            dtmodelTipoPlanilla: null,
            isEditingConvenio: false,
            isLoadingConvenio: false,
            itemsConvenio: [],
            dtmodelConvenio: null,
            isEditingInsEducativa: false,
            isLoadingInsEducativa: false,
            itemsInsEducativa: [],
            dtmodelInsEducativa: null,
            isEditingCargo: false,
            isLoadingCargo: false,
            itemsCargo: [],
            dtmodelCargo: null,
            isEditingTipoContrato: false,
            isLoadingTipoContrato: false,
            itemsTipoContrato: [],
            dtmodelTipoContrato: null,
            isEditingRegimenLaboral: false,
            isLoadingRegimenLaboral: false,
            itemsRegimenLaboral: [],
            dtmodelRegimenLaboral: null,
            isEditingRegimenPensionario: false,
            isLoadingRegimenPensionario: false,
            itemsRegimenPensionario: [],
            dtmodelRegimenPensionario: null,
            isEditingRiesgoCrediticio: false,
            isLoadingRiesgoCrediticio: false,
            itemsRiesgoCrediticio: [],
            btmodelRiesgoCrediticio: null,
            dialogFullScreanRiesgoCrediticio: false,
            dialogFullScreanRegimenPensionario: false,
            dialogFullScreanRegimenLaboral: false,
            dialogFullScreanTipoContrato: false,
            dialogFullScreanCargo: false,
            dialogFullScreanInsEducativa: false,
            dialogFullScreanConvenio: false,
            dialogFullScreanTipoPlanilla: false,
            dialogFullScreanUgel: false,
            dialogFullScreanParentesco: false,
            dialogFullScreanDepartamento: false,
            dialogFullScreanProvincia: false,
            dialogFullScreanDistrito: false,
            dialogFullScreanTipoVivienda: false,
            dialogFullScreanGradoEstudios: false,
            dialogFullScreanProfesion: false,
            dialogFullScreanTipoSocio: false,
            dialogFullscrean: false,
            modelFrActive: false,
            modelbeActive: false,
            snackbar: false,
            idSolicitudIngreso: 0,
            textSnackbar: "",
            date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                .toISOString()
                .substr(0, 10),
            dateFormatted: vm.formatDate(
                new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                    .toISOString()
                    .substr(0, 10)
            ),
            cydate: new Date(
                Date.now() - new Date().getTimezoneOffset() * 60000
            )
                .toISOString()
                .substr(0, 10),
            cydateFormatted: vm.formatDate(
                new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                    .toISOString()
                    .substr(0, 10)
            ),
            dtdate: new Date(
                Date.now() - new Date().getTimezoneOffset() * 60000
            )
                .toISOString()
                .substr(0, 10),
            dtdateFormatted: vm.formatDate(
                new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                    .toISOString()
                    .substr(0, 10)
            ),
            btdate2: new Date(
                Date.now() - new Date().getTimezoneOffset() * 60000
            )
                .toISOString()
                .substr(0, 10),
            btdateFormatted2: vm.formatDate(
                new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                    .toISOString()
                    .substr(0, 10)
            ),
            btdate3: new Date(
                Date.now() - new Date().getTimezoneOffset() * 60000
            )
                .toISOString()
                .substr(0, 10),
            btdateFormatted3: vm.formatDate(
                new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                    .toISOString()
                    .substr(0, 10)
            ),
            dadate: new Date(
                Date.now() - new Date().getTimezoneOffset() * 60000
            )
                .toISOString()
                .substr(0, 10),
            dadateFormatted: vm.formatDate(
                new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                    .toISOString()
                    .substr(0, 10)
            ),
            bedate: new Date(
                Date.now() - new Date().getTimezoneOffset() * 60000
            )
                .toISOString()
                .substr(0, 10),
            bedateFormatted: vm.formatDate(
                new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
                    .toISOString()
                    .substr(0, 10)
            ),
            user: null,
            datasda: null,
            menu1: false,
            menu2: false,
            menu3: false,
            menu4: false,
            menu5: false,
            menu6: false,
            menu7: false,
            elementActive: {
                frActive1: true,
                frActive2: true,
                frActive3: true,
                frActive4: true,
                frActive5: true,
                frActive6: true,
                frActive7: true,
                frActive8: true,
                frActive9: true,
                frActive10: true,
                frActive11: true,
            },
            elementbeActive: {
                beActive1: true,
                beActive2: true,
                beActive3: true,
                beActive4: true,
                beActive5: true,
                beActive6: true,
                beActive7: true,
                beActive8: true,
            },
            activebtLiquido: true,
        };
    },
    beforeRouteEnter(to, from, next) {
        if (source != null) {
          console.log("Si hay");
        }
        next();
    },
    beforeRouteLeave(to, from, next) {
        source.cancel();
        next();
    },
    computed: {
        computedDateFormatted() {
            return this.formatDate(this.date);
        },
        cancularLiquido: function () {
            let liquido =
                parseFloat(this.editSolicitudIngreso.btsueldo) +
                parseFloat(this.editSolicitudIngreso.btescolaridad) +
                parseFloat(this.editSolicitudIngreso.btgratificacion) +
                parseFloat(this.editSolicitudIngreso.btincentivos) -
                parseFloat(this.editSolicitudIngreso.btotrosdesct);

            this.editSolicitudIngreso.btliquido = liquido;
            return liquido;
        },
        url: {
            get: function () {
                console.log("image:---");
                console.log(this.image);
                if (!this.image) {
                    return URL.revokeObjectURL(this.img_default);
                } else {
                    return URL.createObjectURL(this.image);
                }
            },
            set: function (newValue) {
                this.img_default = newValue;
                console.log("imgDefault:" + this.img_default);
            },
        },
    },
    watch: {
        image(val) {
            if (val != null) {
                this.imageName = val.name;
            }
        },
        btmodelRiesgoCrediticio(val) {
            if (val != null) {
                this.editSolicitudIngreso.btid_riesCrediticio = val;
            }
        },
        dtmodelRegimenPensionario(val) {
            if (val != null) {
                this.editSolicitudIngreso.dtid_regimenPensionario = val;
            }
        },
        dtmodelRegimenLaboral(val) {
            if (val != null) {
                this.editSolicitudIngreso.dtid_regimenLaboral = val;
            }
        },
        dtmodelTipoContrato(val) {
            if (val != null) {
                this.editSolicitudIngreso.dtid_tipoContrato = val;
            }
        },
        dtmodelCargo(val) {
            if (val != null) {
                this.editSolicitudIngreso.dtid_cargo = val;
            }
        },
        dtmodelInsEducativa(val) {
            if (val != null) {
                this.editSolicitudIngreso.dtid_insEducativa = val;
            }
        },
        dtmodelConvenio(val) {
            if (val != null) {
                this.editSolicitudIngreso.dtid_convenio = val;
            }
        },
        dtmodelTipoPlanilla(val) {
            if (val != null) {
                this.editSolicitudIngreso.dtid_tipoPlanilla = val;
            }
        },
        dtmodelUgel(val) {
            if (val != null) {
                this.editSolicitudIngreso.dtid_ugel = val;
            }
        },
        modelbeActive(val) {
            if (val != null) {
                if (val == true) {
                    this.bevalidarReferencia = true;
                    this.elementbeActive = {
                        beActive1: false,
                        beActive2: false,
                        beActive3: false,
                        beActive4: false,
                        beActive5: false,
                        beActive6: false,
                        beActive7: false,
                        beActive8: false,
                    };
                } else {
                    this.bevalidarReferencia = false;
                    this.elementbeActive = {
                        beActive1: true,
                        beActive2: true,
                        beActive3: true,
                        beActive4: true,
                        beActive5: true,
                        beActive6: true,
                        beActive7: true,
                        beActive8: true,
                    };
                }
            }
        },
        modelFrActive(val) {
            console.log(val);
            if (val != null) {
                if (val == true) {
                    this.validarReferencia = true;
                    this.elementActive = {
                        frActive1: false,
                        frActive2: false,
                        frActive3: false,
                        frActive4: false,
                        frActive5: false,
                        frActive6: false,
                        frActive7: false,
                        frActive8: false,
                        frActive9: false,
                        frActive10: false,
                        frActive11: false,
                    };
                } else {
                    this.validarReferencia = false;
                    this.elementActive = {
                        frActive1: true,
                        frActive2: true,
                        frActive3: true,
                        frActive4: true,
                        frActive5: true,
                        frActive6: true,
                        frActive7: true,
                        frActive8: true,
                        frActive9: true,
                        frActive10: true,
                        frActive11: true,
                    };
                }
            }
        },
        damodelLibro(val) {
            this.editSolicitudIngreso.datip_libro = val;
        },
        modelTipoDocumento(val) {
            this.editSolicitudIngreso.dgid_tipDocIden = val;
        },
        cymodelTipoDocumento(val) {
            this.editSolicitudIngreso.cyid_tipDocIden = val;
        },
        frmodelTipoDocumento(val) {
            this.editSolicitudIngreso.frid_tipDocIden = val;
        },
        bemodelTipoDocumento(val) {
            this.editSolicitudIngreso.beid_tipDocIden = val;
        },
        modelTipoSocio(val) {
            this.editSolicitudIngreso.dgtip_socio = val;
        },
        modelDepartamento(val) {
            if (val != null) {
                this.editSolicitudIngreso.lniddep = val;
                this.itemsProvincia = [];
                this.initializeProvincia(val);
            } else {
                this.itemsProvincia = [];
            }
        },
        dnmodelDepartamento(val) {
            if (val != null) {
                this.editSolicitudIngreso.dniddep = val;
                this.dnitemsProvincia = [];
                this.dninitializeProvincia(val);
            } else {
                this.dnitemsProvincia = [];
            }
        },
        frmodelDepartamento(val) {
            if (val != null) {
                this.editSolicitudIngreso.friddep = val;
                this.fritemsProvincia = [];
                this.frinitializeProvincia(val);
            } else {
                this.fritemsProvincia = [];
            }
        },
        modelProvincia(val) {
            if (val != null) {
                this.editSolicitudIngreso.lnidprov = val;
                this.itemsDistrito = [];
                this.initializeDistrito(val);
            } else {
                this.itemsDistrito = [];
            }
        },
        dnmodelProvincia(val) {
            if (val != null) {
                this.editSolicitudIngreso.dnidprov = val;
                this.dnitemsDistrito = [];
                this.dninitializeDistrito(val);
            } else {
                this.dnitemsDistrito = [];
            }
        },
        frmodelProvincia(val) {
            if (val != null) {
                this.editSolicitudIngreso.fridprov = val;
                this.fritemsDistrito = [];
                this.frinitializeDistrito(val);
            } else {
                this.fritemsDistrito = [];
            }
        },
        modelDistrito(val) {
            console.log(val);
            if (val != null) {
                this.editSolicitudIngreso.lniddist = val;
            }
        },
        dnmodelDistrito(val) {
            console.log(val);
            if (val != null) {
                this.editSolicitudIngreso.dniddist = val;
            }
        },
        frmodelDistrito(val) {
            console.log(val);
            if (val != null) {
                this.editSolicitudIngreso.friddist = val;
            }
        },
        modelTipoVivienda(val) {
            console.log(val);
            if (val != null) {
                this.editSolicitudIngreso.dnid_tipvi = val;
            }
        },
        modelGradoEstudios(val) {
            console.log(val);
            if (val != null) {
                this.editSolicitudIngreso.dpid_gradoEstudio = val;
            }
        },
        modelProfesion(val) {
            console.log(val);
            if (val != null) {
                this.editSolicitudIngreso.dpid_profesion = val;
            }
        },
        modelParentesco(val) {
            console.log(val);
            if (val != null) {
                this.editSolicitudIngreso.frid_parentesco = val;
            }
        },
        bemodelParentesco(val) {
            if (val != null) {
                this.editSolicitudIngreso.beid_parentesco = val;
            }
        },
        date(val) {
            console.log("Date:" + val, this.date);
            this.editSolicitudIngreso.dgfec_nacimiento = val;
            this.dateFormatted = this.formatDate(this.date);
        },
        cydate(val) {
            console.log(val);
            this.editSolicitudIngreso.cyfec_nacimiento = val;
            this.cydateFormatted = this.formatDate(this.cydate);
        },
        dtdate(val) {
            console.log(val);
            this.editSolicitudIngreso.dtfec_ingreso = val;
            this.dtdateFormatted = this.formatDate(this.dtdate);
        },
        btdate2(val) {
            console.log(val);
            this.editSolicitudIngreso.btfec_boleta = val;
            this.btdateFormatted2 = this.formatDate(this.btdate2);
        },
        btdate3(val) {
            console.log(val);
            this.editSolicitudIngreso.btfec_termino = val;
            this.btdateFormatted3 = this.formatDate(this.btdate3);
        },
        dadate(val) {
            console.log(val);
            this.editSolicitudIngreso.dafec_sesion = val;
            this.dadateFormatted = this.formatDate(this.dadate);
        },
        bedate(val) {
            this.editSolicitudIngreso.befec_nacimiento = val;
            this.bedateFormatted = this.formatDate(this.bedate);
        },
    },
    created() {
        this.idSolicitudIngreso = this.$route.params.id;
        
        if (localStorage.getItem("User")) {
            this.user = JSON.parse(localStorage.getItem("User"));
            console.log("alohaa");
        }
        if (
            this.idSolicitudIngreso != undefined &&
            this.idSolicitudIngreso > 0
        ) {
            this.initializeLlenadoSolicitud(this.idSolicitudIngreso);
        } else {
            this.initializeEstadoSolicitud();
        }
    },
    methods: {
        initializeLlenadoSolicitud(id) {
            let me = this;
            me.identificador_sad = id;
            let url = "/solicitudAdmision/buscar"; //Ruta que hemos creado para enviar una tarea y guardarla
            let filtro = {
                nrodocumento: null,
                estado_sad: 0,
                fecsol_inicio: null,
                fecsol_fin: null,
                tipolibro: 0,
                idugel: 0,
                insteduca: 0,
                nrolibro: 0,
                tipoplanilla: null,
                idcargo: 0,
                tipocontrato: 0,
                idregimenlab: 0,
                idregimenpen: 0,
                nroctasocio: null,
                nrodocsocio: null,
                identificador_sad: parseInt(id),
                nrodoc_beneficiario: null,
                sexo_masculino: null,
                sexo_femenino: null,
            };

            axios
                .post(url, {
                    //estas variables son las que enviaremos para que crear la tarea
                    filtro: filtro,
                })
                .then(function (response) {
                    console.log(response.data);
                    me.datasda = response.data;
                    me.activeSwitch();
                    me.initializeTipoDocumento();
                    me.initializeTipoSocio();
                    me.initializeDepartamento();
                    me.initializeTipoVivienda();
                    me.dninitializeDepartamento();
                    me.initializeGradoEstudios();
                    me.initializeProfesion();
                    me.cyinitializeTipoDocumento();
                    me.frinitializeTipoDocumento();
                    me.initializeParentesco();
                    me.frinitializeDepartamento();
                    me.initializeUgel();
                    me.initializeTipoPlanilla();
                    me.initializeConvenio();
                    me.initializeInsEducativa();
                    me.initializeCargo();
                    me.initializeTipoContrato();
                    me.initializeRegimenLaboral();
                    me.initializeRegimenPensionario();
                    me.initializeRiesgoCrediticio();
                    me.initializeEstadoSolicitud();
                    me.initializeLibro();
                    // me.beinitializeTipoDocumento();
                    // me.beinitializeParentesco();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        activeSwitch() {
            let me = this;
            if (me.datasda.curentidad.length > 0) {
                me.datasda.curentidad.forEach((e) => {
                    if (e.tipopersona == "Familiar") {
                        me.modelFrActive = true;
                    }
                });
            }
            if (me.datasda.curbeneficiario.length > 0) {
                if (this.datasda != null) {
                    let index = 0;
                    if (this.datasda.curbeneficiario.length > 0) {
                        this.datasda.curbeneficiario.forEach((e) => {
                            me.bedesserts.push({
                                0: "B",
                                1: "S",
                                2: this.datasda.curbeneficiario[index]
                                    .tipobeneficiario_ben,
                                3: this.datasda.curbeneficiario[index]
                                    .apepat_ben,
                                4: this.datasda.curbeneficiario[index]
                                    .apemat_ben,
                                5: this.datasda.curbeneficiario[index]
                                    .nombres_ben,
                                6: parseInt(
                                    this.datasda.curbeneficiario[index]
                                        .nrodoc_ben
                                ),
                                7: this.datasda.curbeneficiario[index]
                                    .nrodoc_ben,
                                8: this.datasda.curbeneficiario[index]
                                    .fechanac_ben,
                                9: true,
                            });
                            index++;
                        });
                    }
                }
            }
        },
        deleteItem(item) {
            let editIndex = this.bedesserts.indexOf(item);
            this.bedesserts.splice(editIndex, 1);
        },
        async agregarBeneficiario() {
            let me = this;
            let bevalidate = await this.$refs.beform.validate();

            console.log("beestado:" + bevalidate);

            if (!bevalidate) {
                this.textSnackbar = "Debes llenar los campos en rojo!.";
                this.snackbar = true;
                return;
            }

            let nro_doc = me.editSolicitudIngreso.benro_doc_identidad;
            let validateNum = true;

            me.bedesserts.forEach((e) => {
                if (e[7] == nro_doc) {
                    validateNum = false;
                }
            });

            if (validateNum == false) {
                this.textSnackbar = "No puedes repetir el Núm. Documento.";
                this.snackbar = true;
                return;
            }

            me.bedesserts.push({
                0: "B",
                1: "S",
                2: me.editSolicitudIngreso.beid_parentesco,
                3: me.editSolicitudIngreso.beape_paterno,
                4: me.editSolicitudIngreso.beape_materno,
                5: me.editSolicitudIngreso.benombre,
                6: me.editSolicitudIngreso.benro_doc_identidad,
                7: me.editSolicitudIngreso.beid_tipDocIden,
                8: me.editSolicitudIngreso.befec_nacimiento,
                9: true,
            });
            console.log(me.bedesserts);
        },
        cargarFoto() {
            let url = "/solicitudAdmision/cargarImagen";
            let formData = new FormData();
            formData.append("file", this.image);
            formData.append("idpersona", this.idpersona);
            formData.append("idconyuge", this.idconyuge);
            axios
                .post(url, formData)
                .then((response) => {
                    if (response.data == 1) {
                        this.textSnackbar = "Se cargo correctamente la imagen.";
                        this.snackbar = true;
                        this.btnImprimir = false;
                    }
                })
                .catch((error) => {
                    this.textSnackbar =
                        "Tiene que cargar una imagen png, jpg o jpeg.";
                    this.snackbar = true;
                });
        },
        async guardar1() {
            let me = this;

            this.editSolicitudIngreso.btfec_boleta = this.btdate2;

            let validate = await this.$refs.form.validate();
            let lnvalidate = await this.$refs.lnform.validate();
            let dnvalidate = await this.$refs.dnform.validate();
            let cyvalidate = await this.$refs.cyform.validate();
            let frvalidate = true;
            if (this.validarReferencia) {
                frvalidate = await this.$refs.frform.validate();
            }
            let bevalidate = true;
            if (this.bevalidarReferencia) {
                bevalidate = await this.$refs.beform.validate();
            }
            let btvalidate = await this.$refs.btform.validate();
            let davalidate = await this.$refs.daform.validate();

            if (this.bevalidarReferencia && !me.bedesserts.length > 0) {
                this.textSnackbar = "Tienes que agregar un beneficiario!";
                this.snackbar = true;
                return;
            }

            console.log(
                validate,
                lnvalidate,
                dnvalidate,
                cyvalidate,
                frvalidate,
                btvalidate,
                bevalidate,
                davalidate
            );

            if (
                !(
                    validate &&
                    lnvalidate &&
                    dnvalidate &&
                    cyvalidate &&
                    frvalidate &&
                    btvalidate &&
                    bevalidate &&
                    davalidate
                )
            ) {
                return;
            }

            let url = null;
            if (this.identificador_sad != null) {
                url = "/solicitudAdmision/actualizar";
            } else {
                url = "/solicitudAdmision/guardar";
            }

            let value_guardar1 = "S";
            let value_guardar2 = "C";
            let value_guardar3 = "F";
            let idcargo = 0;
            let estado = true;
            let tipoubinac = 0;
            let tipoubidir = 0;
            let tiposoc = null;
            let titulo = null;
            let nrohijos = 0;
            let estado_per = "A";
            let nacionalidad = "P";
            let tiposocio = null;
            let idugel = 0;
            let lugarnac = null;
            let haburbana = null;
            let registrado = "TEST";
            let codpers = null;
            let idusu = 11070;
            let idsuc = 0;
            let secuencia = 1;
            let obj_familiar = null;
            let obj_beneficiario = null;
            let obj_solicitudadmision = null;

            let obj = {
                0: value_guardar1,
                1: this.editSolicitudIngreso.dgape_paterno,
                2: this.editSolicitudIngreso.dgape_materno,
                3: this.editSolicitudIngreso.dgnombre,
                4: this.editSolicitudIngreso.dgid_tipDocIden,
                5: this.editSolicitudIngreso.dgnum_tipoDocIden,
                6: this.editSolicitudIngreso.dndireccion,
                7: this.editSolicitudIngreso.dgtelefono,
                8: this.editSolicitudIngreso.dgsexo,
                9: this.editSolicitudIngreso.dgest_civil,
                10: this.editSolicitudIngreso.dgemail,
                11: this.editSolicitudIngreso.dgfec_nacimiento,
                12: idcargo,
                13: estado,
                14: this.editSolicitudIngreso.lncodigo,
                15: tipoubinac,
                16: tipoubidir,
                17: this.editSolicitudIngreso.dncodigo,
                18: this.editSolicitudIngreso.dgtip_socio,
                19: titulo,
                20: nrohijos,
                21: estado_per,
                22: this.editSolicitudIngreso.dgcod_cargo,
                23: this.editSolicitudIngreso.dgcod_carben,
                24: nacionalidad,
                25: this.editSolicitudIngreso.dtid_tipoPlanilla,
                26: this.editSolicitudIngreso.dtid_ugel,
                27: this.editSolicitudIngreso.dgmovil,
                28: lugarnac,
                29: haburbana,
                30: registrado,
                31: this.imageName,
                32: this.editSolicitudIngreso.dgcodModular,
                33: idusu,
                34: idsuc,
                35: this.editSolicitudIngreso.dniddist,
            };

            let obj_direccion = {
                0: value_guardar1,
                1: this.editSolicitudIngreso.dncodigo,
                2: 0,
                3: 0,
                4: null,
                5: 0,
                6: this.editSolicitudIngreso.dndireccion,
                7: this.editSolicitudIngreso.dnreferencia,
                8: this.editSolicitudIngreso.dnid_tipvi,
                9: null,
                10: secuencia,
                11: tipoubinac,
                12: this.editSolicitudIngreso.lncodigo,
                13: null,
                14: null,
                15: null,
                16: null,
                17: null,
                18: 0,
            };

            let obj_conyuge = {
                0: value_guardar2,
                1: this.editSolicitudIngreso.cyid_tipDocIden,
                2: this.editSolicitudIngreso.cynum_tipoDocIden,
                3: this.editSolicitudIngreso.cynombre,
                4: this.editSolicitudIngreso.cyape_paterno,
                5: this.editSolicitudIngreso.cyape_materno,
                6: null,
                7: this.editSolicitudIngreso.cysexo,
                8: this.editSolicitudIngreso.cyest_civil,
                9: "A",
                10: true,
                11: this.editSolicitudIngreso.cytelefono,
                12: this.editSolicitudIngreso.cymovil,
                13: this.editSolicitudIngreso.cycar_familiar,
                14: this.editSolicitudIngreso.cyfec_nacimiento,
                15: registrado,
                16: idusu,
            };

            if (this.validarReferencia) {
                obj_familiar = {
                    0: value_guardar3,
                    1: this.editSolicitudIngreso.frnum_tipoDocIden,
                    2: this.editSolicitudIngreso.frid_tipDocIden,
                    3: this.editSolicitudIngreso.frnombre,
                    4: this.editSolicitudIngreso.frape_paterno,
                    5: this.editSolicitudIngreso.frape_materno,
                    6: null,
                    7: this.editSolicitudIngreso.frcodigo,
                    8: 0,
                    9: this.editSolicitudIngreso.frdireccion,
                    10: this.editSolicitudIngreso.frtelefono,
                    11: "A",
                    12: true,
                    13: this.editSolicitudIngreso.frid_parentesco,
                    14: registrado,
                    15: idusu,
                };
            } else {
                obj_familiar = {};
            }

            let obj_datopersona = {
                0: this.editSolicitudIngreso.dpid_gradoEstudio,
                1: this.editSolicitudIngreso.dpid_profesion,
                2: this.editSolicitudIngreso.dpid_nivMagisterial,
                3: this.editSolicitudIngreso.dtid_convenio,
                4: this.editSolicitudIngreso.dtid_insEducativa,
                5: this.editSolicitudIngreso.dtid_cargo,
                6: this.editSolicitudIngreso.dtid_tipoContrato,
                7: this.editSolicitudIngreso.dtid_regimenLaboral,
                8: this.editSolicitudIngreso.dtid_regimenPensionario,
                9: this.editSolicitudIngreso.dtfec_ingreso,
                10: this.editSolicitudIngreso.dtanhServicio,
                11: null,
            };

            if (this.identificador_sad != null) {
                obj_solicitudadmision = {
                    0: this.editSolicitudIngreso.btfec_boleta,
                    1: this.editSolicitudIngreso.daest_solicitud,
                    2: null,
                    3: null,
                    4: this.editSolicitudIngreso.btsueldo,
                    5: this.editSolicitudIngreso.btimponible,
                    6: this.editSolicitudIngreso.btescolaridad,
                    7: this.editSolicitudIngreso.btgratificacion,
                    8: this.editSolicitudIngreso.btliquido,
                    9: this.editSolicitudIngreso.btid_riesCrediticio,
                    10: this.editSolicitudIngreso.btotrosdesct,
                    11: this.editSolicitudIngreso.btincentivos,
                    12: this.editSolicitudIngreso.btobservacion,
                    13: registrado,
                    14: this.editSolicitudIngreso.btfec_termino,
                    15:
                        this.editSolicitudIngreso.dafec_sesion != undefined
                            ? this.editSolicitudIngreso.dafec_sesion
                            : null,
                    16: this.editSolicitudIngreso.datip_libro,
                    17: this.editSolicitudIngreso.danum_libro,
                    18: this.editSolicitudIngreso.danro_folio,
                    19: this.editSolicitudIngreso.daobservacion,
                    20: this.editSolicitudIngreso.daaprobacion,
                };
            } else {
                obj_solicitudadmision = {
                    0: this.editSolicitudIngreso.btfec_boleta,
                    1: this.editSolicitudIngreso.daest_solicitud,
                    2: null,
                    3: null,
                    4: this.editSolicitudIngreso.btsueldo,
                    5: this.editSolicitudIngreso.btimponible,
                    6: this.editSolicitudIngreso.btescolaridad,
                    7: this.editSolicitudIngreso.btgratificacion,
                    8: this.editSolicitudIngreso.btliquido,
                    9: this.editSolicitudIngreso.btid_riesCrediticio,
                    10: this.editSolicitudIngreso.btotrosdesct,
                    11: this.editSolicitudIngreso.btincentivos,
                    12: this.editSolicitudIngreso.btobservacion,
                    13: registrado,
                    14: this.editSolicitudIngreso.btfec_termino,
                };
            }

            console.log(obj_direccion, obj_solicitudadmision);

            if (this.bevalidarReferencia) {
                obj_beneficiario = me.bedesserts;
            } else {
                obj_beneficiario = [];
            }

            axios
                .post(url, {
                    obj_identificador_sad: this.identificador_sad,
                    obj: obj,
                    obj_direccion: obj_direccion,
                    obj_conyuge: obj_conyuge,
                    obj_familiar: obj_familiar,
                    obj_datopersona: obj_datopersona,
                    obj_beneficiario: obj_beneficiario,
                    obj_solicitudadmision: obj_solicitudadmision,
                })
                .then(function (response) {
                    console.log(response);
                    me.idpersona = response.data[0].idpersona_socio;
                    me.idconyuge = response.data[0].idpersona_conyuge;
                    me.showStepFoto = true;
                    me.e1 = 4;
                    me.textSnackbar =
                        "Exito al registrar la solicitud de ingreso del socio.";
                    me.snackbar = true;
                })
                .catch(function (error) {
                    console.log(error);
                    me.textSnackbar =
                        "No se registro correctamente la solicutd de ingreso del socio.";
                    me.snackbar = true;
                });
        },
        next() {
            let me = this;
            me.e1 = 2;
        },
        next2() {
            let me = this;
            me.e1 = 3;
        },
        nuevasolingadm() {
            this.$router.push({ name: "solicitudIngreso" });
            this.$router.go();
        },
        buscarsolingadm() {
            this.$router.push({ name: "buscarSolicitudIngreso" });
        },
        imprimir() {
            let url = "/solicitudAdmision/imprimir";
            axios
                .post(
                    url,
                    {
                        idpersona: this.idpersona,
                        idconyuge: this.idconyuge,
                    },
                    { responseType: "arraybuffer" }
                )
                .then(function (response) {
                    let blob = new Blob([response.data], {
                        type: "application/pdf",
                    });
                    let link = document.createElement("a");
                    link.href = window.URL.createObjectURL(blob);
                    link.download = "test.pdf";
                    link.click();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        isNumber(evt) {
            evt = evt ? evt : window.event;
            var charCode = evt.which ? evt.which : evt.keyCode;
            if (
                charCode > 31 &&
                (charCode < 48 || charCode > 57) &&
                charCode !== 46
            ) {
                evt.preventDefault();
            } else {
                return true;
            }
        },
        changeDistrito(event, itemsDistrito) {
            itemsDistrito.forEach((distrito) => {
                if (distrito.iddist == event) {
                    this.editSolicitudIngreso.lncodigo = distrito.ubigeo;
                }
            });
        },
        dnchangeDistrito(event, dnitemsDistrito) {
            dnitemsDistrito.forEach((distrito) => {
                if (distrito.iddist == event) {
                    this.editSolicitudIngreso.dncodigo = distrito.ubigeo;
                }
            });
        },
        frchangeDistrito(event, fritemsDistrito) {
            fritemsDistrito.forEach((distrito) => {
                if (distrito.iddist == event) {
                    this.editSolicitudIngreso.frcodigo = distrito.ubigeo;
                }
            });
        },
        initializeLibro() {
            if (this.daitemsLibro.length > 0) return;

            this.daisLoadingLibro = true;

            let url = "/getLibro";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.daitemsLibro = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.tipolibro_sad != null) {
                                    this.damodelLibro =
                                        this.datasda.curlistado[
                                            index
                                        ].tipolibro_sad;
                                }
                                index++;
                            });
                        }
                    }
                    this.daisLoadingLibro = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.daisLoadingLibro = false));
        },
        initializeEstadoSolicitud() {
            if (this.daitemsEstadoSolicitud.length > 0) return;

            this.daisLoadingEstadoSolicitud = true;

            let url = "/getEstadoSolicitud";
            axios
                .get(url)
                .then((res) => {
                    let rolEstado = null;
                    let rolEstadoAll = [524, 528, 527, 529, 525, 526];
                    if (this.user.id_rol == 9) {
                        rolEstado = [524, 528, 527, 529];
                    } else if (this.user.id_rol == 19) {
                        rolEstado = [525, 526];
                    } else {
                        rolEstado = rolEstadoAll;
                    }

                    res.data.forEach((e) => {
                        if (rolEstado.includes(e.identificador_ane)) {
                            this.daitemsEstadoSolicitud.push(e);
                        }
                    });

                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.estado_sad != null) {
                                    this.damodelEstadoSolicitud =
                                        this.datasda.curlistado[
                                            index
                                        ].estado_sad;
                                    res.data.forEach((e) => {
                                        if (
                                            e.identificador_ane ==
                                            this.damodelEstadoSolicitud
                                        ) {
                                            this.daitemsEstadoSolicitud.push(e);
                                        }
                                    });
                                }

                                this.dadate =
                                    this.datasda.curlistado[
                                        index
                                    ].fechasesion_original;
                                this.dadateFormatted =
                                    this.datasda.curlistado[
                                        index
                                    ].fechasesion_sad;
                                this.editSolicitudIngreso.danum_libro =
                                    this.datasda.curlistado[index].nrolibro_sad;
                                this.editSolicitudIngreso.danum_libro =
                                    this.datasda.curlistado[index].nrofolio_sad;
                                this.editSolicitudIngreso.danro_cuenta =
                                    this.datasda.curlistado[
                                        index
                                    ].nroctasocio_sad;
                                this.editSolicitudIngreso.daobservacion =
                                    this.datasda.curlistado[
                                        index
                                    ].observacionaprobacion_sad;
                                this.editSolicitudIngreso.daest_solicitud =
                                    this.datasda.curlistado[index].estado_sad;

                                index++;
                            });
                        }
                    } else {
                        this.editSolicitudIngreso.daest_solicitud = 524;
                    }
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => {
                    this.daisLoadingEstadoSolicitud = false;
                });
        },
        initializeRiesgoCrediticio() {
            if (this.itemsRiesgoCrediticio.length > 0) return;

            this.isLoadingRiesgoCrediticio = true;

            let url = "/getRiesgoCrediticio";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsRiesgoCrediticio = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.riesgocrediticio_sad != null) {
                                    this.btmodelRiesgoCrediticio =
                                        this.datasda.curlistado[
                                            index
                                        ].riesgocrediticio_sad;
                                }
                                this.btdate2 =
                                    this.datasda.curlistado[
                                        index
                                    ].fechasolicitud_original;
                                this.btdateFormatted2 =
                                    this.datasda.curlistado[
                                        index
                                    ].fechasolicitud_sad;
                                this.btdate3 =
                                    this.datasda.curlistado[
                                        index
                                    ].fechatermino_original;
                                this.btdateFormatted3 =
                                    this.datasda.curlistado[
                                        index
                                    ].fechatermino_sad;

                                this.btdate2 =
                                    this.datasda.curlistado[
                                        index
                                    ].fechasolicitud_original;
                                this.editSolicitudIngreso.btsueldo =
                                    this.datasda.curlistado[
                                        index
                                    ].remuneracion_sad;
                                this.editSolicitudIngreso.btescolaridad =
                                    this.datasda.curlistado[
                                        index
                                    ].escolaridad_sad;
                                this.editSolicitudIngreso.btgratificacion =
                                    this.datasda.curlistado[
                                        index
                                    ].gratificacion_sad;
                                this.editSolicitudIngreso.btincentivos =
                                    this.datasda.curlistado[
                                        index
                                    ].incentivo_sad;
                                this.editSolicitudIngreso.btotrosdesct =
                                    this.datasda.curlistado[
                                        index
                                    ].otrodscto_sad;
                                this.editSolicitudIngreso.btimponible =
                                    this.datasda.curlistado[
                                        index
                                    ].montoimponible_sad;
                                this.editSolicitudIngreso.btliquido =
                                    this.datasda.curlistado[
                                        index
                                    ].totalliquido_sad;
                                this.editSolicitudIngreso.btobservacion =
                                    this.datasda.curlistado[
                                        index
                                    ].observacionevaluacion_sad;
                                index++;
                            });
                        }
                    }
                    this.isEditingRiesgoCrediticio = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingRiesgoCrediticio = false));
        },
        showRiesgoCrediticio() {
            this.dialogFullScreanRiesgoCrediticio = true;
        },
        initializeRegimenPensionario() {
            if (this.itemsRegimenPensionario.length > 0) return;

            this.isLoadingRegimenPensionario = true;

            let url = "/getTipoRegimenPensionario";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsRegimenPensionario = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.regimenpen_dpe != null) {
                                    this.dtmodelRegimenPensionario =
                                        this.datasda.curlistado[
                                            index
                                        ].regimenpen_dpe;
                                }
                                this.dtdate =
                                    this.datasda.curlistado[
                                        index
                                    ].fechaingreso_original;
                                this.dtdateFormatted =
                                    this.datasda.curlistado[
                                        index
                                    ].fechaingreso_dpe;
                                this.editSolicitudIngreso.dtanhServicio =
                                    this.datasda.curlistado[
                                        index
                                    ].tiemposervicio_dpe;
                                index++;
                            });
                        }
                    }
                    this.isEditingRegimenPensionario = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingRegimenPensionario = false));
        },
        showRegimenPensionario() {
            this.dialogFullScreanRegimenPensionario = true;
        },
        initializeRegimenLaboral() {
            if (this.itemsRegimenLaboral.length > 0) return;

            this.isLoadingRegimenLaboral = true;

            let url = "/getRegimenLaboral";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsRegimenLaboral = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.regimenlab_dpe != null) {
                                    this.dtmodelRegimenLaboral =
                                        this.datasda.curlistado[
                                            index
                                        ].regimenlab_dpe;
                                }
                                index++;
                            });
                        }
                    }
                    this.isEditingRegimenLaboral = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingRegimenLaboral = false));
        },
        showRegimenLaboral() {
            this.dialogFullScreanRegimenLaboral = true;
        },
        initializeTipoContrato() {
            if (this.itemsTipoContrato.length > 0) return;

            this.isLoadingTipoContrato = true;

            let url = "/getTipoContratoLaboral";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsTipoContrato = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.tipocontrato_dpe != null) {
                                    this.dtmodelTipoContrato =
                                        this.datasda.curlistado[
                                            index
                                        ].tipocontrato_dpe;
                                }
                                index++;
                            });
                        }
                    }
                    this.isEditingTipoContrato = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingTipoContrato = false));
        },
        showTipoContrato() {
            this.dialogFullScreanTipoContrato = true;
        },
        initializeCargo() {
            if (this.itemsCargo.length > 0) return;

            this.isLoadingCargo = true;

            let url = "/getTipoCargo";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsCargo = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.cargo_dpe != null) {
                                    this.dtmodelCargo =
                                        this.datasda.curlistado[
                                            index
                                        ].cargo_dpe;
                                }
                                index++;
                            });
                        }
                    }
                    this.isEditingCargo = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingCargo = false));
        },
        showCargo() {
            this.dialogFullScreanCargo = true;
        },
        initializeInsEducativa() {
            if (this.itemsInsEducativa.length > 0) return;

            this.isLoadingInsEducativa = true;

            let url = "/getTipoInstitucionEducativa";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsInsEducativa = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.insteduca_dpe != null) {
                                    this.dtmodelInsEducativa =
                                        this.datasda.curlistado[
                                            index
                                        ].insteduca_dpe;
                                }
                                index++;
                            });
                        }
                    }
                    this.isEditingInsEducativa = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingInsEducativa = false));
        },
        showInsEducativa() {
            this.dialogFullScreanInsEducativa = true;
        },
        initializeConvenio() {
            if (this.itemsConvenio.length > 0) return;

            this.isLoadingConvenio = true;

            let url = "/getTipoConvenio";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsConvenio = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.convenio_dpe != null) {
                                    this.dtmodelConvenio =
                                        this.datasda.curlistado[
                                            index
                                        ].convenio_dpe;
                                }
                                index++;
                            });
                        }
                    }
                    this.isEditingConvenio = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingConvenio = false));
        },
        showConvenio() {
            this.dialogFullScreanConvenio = true;
        },
        initializeTipoPlanilla() {
            if (this.itemsTipoPlanilla.length > 0) return;

            this.isLoadingTipoPlanilla = true;

            let url = "/getTipoPlanilla";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsTipoPlanilla = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.tipoplanilla != null) {
                                    this.dtmodelTipoPlanilla =
                                        this.datasda.curlistado[
                                            index
                                        ].tipoplanilla;
                                }
                                index++;
                            });
                        }
                    }
                    this.isEditingTipoPlanilla = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingTipoPlanilla = false));
        },
        showTipoPlanilla() {
            this.dialogFullScreanTipoPlanilla = true;
        },
        initializeUgel() {
            if (this.itemsUgel.length > 0) return;

            this.isLoadingUgel = true;

            let url = "/getUgel";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsUgel = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.idugel != null) {
                                    this.dtmodelUgel =
                                        this.datasda.curlistado[index].idugel;
                                }
                                index++;
                            });
                        }
                    }
                    this.isEditingUgel = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingUgel = false));
        },
        showUgel() {
            this.dialogFullScreanUgel = true;
        },
        initializeTipoVivienda() {
            if (this.itemsTipoVivienda.length > 0) return;

            this.isLoadingTipoVivienda = true;

            let url = "/getTipoVivienda";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsTipoVivienda = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curdireccion.length > 0) {
                            this.datasda.curdireccion.forEach((e) => {
                                if (e.idtipviv != null) {
                                    this.modelTipoVivienda =
                                        this.datasda.curdireccion[
                                            index
                                        ].idtipviv;
                                    this.editSolicitudIngreso.dndireccion =
                                        this.datasda.curdireccion[
                                            index
                                        ].direccion;
                                    this.editSolicitudIngreso.dnreferencia =
                                        this.datasda.curdireccion[index].refdir;
                                }
                                index++;
                            });
                        }
                    }

                    this.isEditingTipoVivienda = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingTipoVivienda = false));
        },
        showTipoVivienda() {
            this.dialogFullScreanTipoVivienda = true;
        },
        frinitializeDistrito(val) {
            if (this.fritemsDistrito.length > 0) return;

            this.frisLoadingDistrito = true;
            let id = val;

            let url = "/getDistrito/" + id;
            axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    this.fritemsDistrito = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Familiar") {
                                    this.frmodelDistrito =
                                        this.datasda.curentidad[index].iddist;
                                    this.fritemsDistrito.forEach((distrito) => {
                                        if (
                                            distrito.iddist ==
                                            this.frmodelDistrito
                                        ) {
                                            this.editSolicitudIngreso.frcodigo =
                                                distrito.ubigeo;
                                        }
                                    });
                                }
                                index++;
                            });
                        }
                    }
                    this.frisEditingDistrito = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.frisLoadingDistrito = false));
        },
        frshowDistrito() {
            this.dialogFullScreanDistrito = true;
        },
        dninitializeDistrito(val) {
            if (this.dnitemsDistrito.length > 0) return;

            this.dnisLoadingDistrito = true;
            let id = val;

            let url = "/getDistrito/" + id;
            axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    this.dnitemsDistrito = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curdireccion.length > 0) {
                            this.datasda.curdireccion.forEach((e) => {
                                if (e.iddist != null) {
                                    this.dnmodelDistrito =
                                        this.datasda.curdireccion[index].iddist;
                                    this.dnitemsDistrito.forEach((distrito) => {
                                        if (
                                            distrito.iddist ==
                                            this.dnmodelDistrito
                                        ) {
                                            this.editSolicitudIngreso.dncodigo =
                                                distrito.ubigeo;
                                        }
                                    });
                                }
                                index++;
                            });
                        }
                    }

                    this.dnisEditingDistrito = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.dnisLoadingDistrito = false));
        },
        dnshowDistrito() {
            this.dialogFullScreanDistrito = true;
        },
        initializeDistrito(val) {
            if (this.itemsDistrito.length > 0) return;

            this.isLoadingDistrito = true;
            let id = val;

            let url = "/getDistrito/" + id;
            axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    this.itemsDistrito = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Socio") {
                                    this.modelDistrito =
                                        this.datasda.curentidad[index].iddist;
                                    this.itemsDistrito.forEach((distrito) => {
                                        if (
                                            distrito.iddist ==
                                            this.modelDistrito
                                        ) {
                                            this.editSolicitudIngreso.lncodigo =
                                                distrito.ubigeo;
                                        }
                                    });
                                }
                                index++;
                            });
                        }
                    }

                    this.isEditingDistrito = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingDistrito = false));
        },
        showDistrito() {
            this.dialogFullScreanDistrito = true;
        },
        initializeProvincia(val) {
            if (this.itemsProvincia.length > 0) return;

            this.isLoadingProvincia = true;
            let id = val;

            let url = "/getProvincia/" + id;
            axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    this.itemsProvincia = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Socio") {
                                    this.modelProvincia =
                                        this.datasda.curentidad[index].idprov;
                                }
                                index++;
                            });
                        }
                    }

                    this.isEditingProvincia = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingProvincia = false));
        },
        showProvincia() {
            this.dialogFullScreanProvincia = true;
        },
        dninitializeProvincia(val) {
            if (this.dnitemsProvincia.length > 0) return;

            this.dnisLoadingProvincia = true;
            let id = val;

            let url = "/getProvincia/" + id;
            axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    this.dnitemsProvincia = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curdireccion.length > 0) {
                            this.datasda.curdireccion.forEach((e) => {
                                if (e.idprov != null) {
                                    this.dnmodelProvincia =
                                        this.datasda.curdireccion[index].idprov;
                                }
                                index++;
                            });
                        }
                    }
                    this.dnisEditingProvincia = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.dnisLoadingProvincia = false));
        },
        dnshowProvincia() {
            this.dialogFullScreanProvincia = true;
        },
        frinitializeProvincia(val) {
            if (this.fritemsProvincia.length > 0) return;

            this.frisLoadingProvincia = true;
            let id = val;

            let url = "/getProvincia/" + id;
            axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    this.fritemsProvincia = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Familiar") {
                                    this.frmodelProvincia =
                                        this.datasda.curentidad[index].idprov;
                                }
                                index++;
                            });
                        }
                    }
                    this.frisEditingProvincia = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.frisLoadingProvincia = false));
        },
        frshowProvincia() {
            this.dialogFullScreanProvincia = true;
        },
        initializeDepartamento() {
            if (this.itemsDepartamento.length > 0) return;

            this.isLoadingDepartamento = true;

            let url = "/getUbigeo";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsDepartamento = res.data;
                    console.log(this.datasda);
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Socio") {
                                    this.modelDepartamento =
                                        this.datasda.curentidad[index].iddep;
                                }
                                index++;
                            });
                        }
                    }

                    this.isEditingDepartamento = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isLoadingDepartamento = false));
        },
        showDepartamento() {
            this.dialogFullScreanDepartamento = true;
        },
        dninitializeDepartamento() {
            if (this.dnitemsDepartamento.length > 0) return;

            this.dnisLoadingDepartamento = true;

            let url = "/getUbigeo";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.dnitemsDepartamento = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curdireccion.length > 0) {
                            this.datasda.curdireccion.forEach((e) => {
                                if (e.iddep != null) {
                                    this.dnmodelDepartamento =
                                        this.datasda.curdireccion[index].iddep;
                                }
                                index++;
                            });
                        }
                    }
                    console.log("Departamento:" + this.dnmodelDepartamento);
                    this.dnisEditingDepartamento = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.dnisLoadingDepartamento = false));
        },
        dnshowDepartamento() {
            this.dialogFullScreanDepartamento = true;
        },
        frinitializeDepartamento() {
            if (this.fritemsDepartamento.length > 0) return;

            this.frisLoadingDepartamento = true;

            let url = "/getUbigeo";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.fritemsDepartamento = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Familiar") {
                                    this.frmodelDepartamento =
                                        this.datasda.curentidad[index].iddep;
                                }
                                index++;
                            });
                        }
                    }
                    this.frisEditingDepartamento = true;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.frisLoadingDepartamento = false));
        },
        frshowDepartamento() {
            this.dialogFullScreanDepartamento = true;
        },
        formatDate(date) {
            if (!date) return null;

            const [year, month, day] = date.split("-");
            return `${day}/${month}/${year}`;
        },
        parseDate(date) {
            if (!date) return null;

            const [day, month, year] = date.split("/");
            return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
        },
        beinitializeTipoDocumento() {
            if (this.beitemsTipoDocumento.length > 0) return;
            this.beisLoadingTipoDocumento = true;
            let url = "/typeDocumentIdentify";
            axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    this.beitemsTipoDocumento = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curbeneficiario.length > 0) {
                            this.datasda.curbeneficiario.forEach((e) => {
                                if (e.nrodoc_ben != null) {
                                    this.bemodelTipoDocumento = parseInt(
                                        this.datasda.curbeneficiario[index]
                                            .nrodoc_ben
                                    );
                                }
                                console.log(this.bemodelTipoDocumento);
                                index++;
                            });
                        }
                    }
                    this.beisLoadingTipoDocumento = false;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        beshowTipoDocumento() {
            this.dialogFullscrean = true;
        },
        initializeTipoDocumento() {
            if (this.itemsTipoDocumento.length > 0) return;
            this.isLoadingTipoDocumento = true;
            let url = "/typeDocumentIdentify";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    this.itemsTipoDocumento = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Socio") {
                                    this.modelTipoDocumento =
                                        this.datasda.curentidad[
                                            index
                                        ].idtipodocid;
                                    this.editSolicitudIngreso.dgnum_tipoDocIden =
                                        this.datasda.curentidad[index].nrodoc;
                                    this.editSolicitudIngreso.dgcodModular =
                                        this.datasda.curentidad[
                                            index
                                        ].codmodular;
                                    this.editSolicitudIngreso.dgape_paterno =
                                        this.datasda.curentidad[index].ape_pat;
                                    this.editSolicitudIngreso.dgape_materno =
                                        this.datasda.curentidad[index].ape_mat;
                                    this.editSolicitudIngreso.dgnombre =
                                        this.datasda.curentidad[index].nombres;
                                    this.editSolicitudIngreso.dgcod_cargo =
                                        this.datasda.curentidad[index].codcargo;
                                    this.editSolicitudIngreso.dgcod_carben =
                                        this.datasda.curentidad[
                                            index
                                        ].codcargoben;
                                    this.editSolicitudIngreso.dgest_civil =
                                        this.datasda.curentidad[index].estciv;
                                    this.editSolicitudIngreso.dgedad =
                                        this.datasda.curentidad[index].edad;
                                    this.editSolicitudIngreso.dgtelefono =
                                        this.datasda.curentidad[index].telefono;
                                    this.editSolicitudIngreso.dgmovil =
                                        this.datasda.curentidad[index].movil;
                                    this.editSolicitudIngreso.dgsexo =
                                        this.datasda.curentidad[index].sexo;
                                    this.date =
                                        this.datasda.curentidad[
                                            index
                                        ].fecha_original;
                                    this.dateFormatted =
                                        this.datasda.curentidad[index].fecnac;
                                    this.editSolicitudIngreso.dgemail =
                                        this.datasda.curentidad[index].correo;
                                    this.url =
                                        "storage/" +
                                        this.datasda.curentidad[index].foto;
                                    console.log("Url:" + this.url);
                                }
                                index++;
                            });
                        }
                    }

                    this.isLoadingTipoDocumento = false;
                })
                .catch((err) => {
                    if (axios.isCancel(err)) {
                      this.$router.go();
                    }
                })
                .finally(() => (this.isEditingTipoDocumento = true));
        },
        showTipoDocumento() {
            this.dialogFullscrean = true;
        },
        cyinitializeTipoDocumento() {
            if (this.cyitemsTipoDocumento.length > 0) return;
            this.cyisLoadingTipoDocumento = true;
            let url = "/typeDocumentIdentify";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.cyitemsTipoDocumento = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Conyuge") {
                                    this.cymodelTipoDocumento =
                                        this.datasda.curentidad[
                                            index
                                        ].idtipodocid;
                                    this.editSolicitudIngreso.cynum_tipoDocIden =
                                        this.datasda.curentidad[index].nrodoc;
                                    this.editSolicitudIngreso.cysexo =
                                        this.datasda.curentidad[index].sexo;
                                    this.editSolicitudIngreso.cyest_civil =
                                        this.datasda.curentidad[index].estciv;
                                    this.editSolicitudIngreso.cyape_paterno =
                                        this.datasda.curentidad[index].ape_pat;
                                    this.editSolicitudIngreso.cyape_materno =
                                        this.datasda.curentidad[index].ape_mat;
                                    this.editSolicitudIngreso.cynombre =
                                        this.datasda.curentidad[index].nombres;
                                    this.cydate =
                                        this.datasda.curentidad[
                                            index
                                        ].fecha_original;
                                    this.cydateFormatted =
                                        this.datasda.curentidad[index].fecnac;
                                    this.editSolicitudIngreso.cytelefono =
                                        this.datasda.curentidad[index].telefono;
                                    this.editSolicitudIngreso.cymovil =
                                        this.datasda.curentidad[index].movil;
                                    this.editSolicitudIngreso.cycar_familiar =
                                        this.datasda.curentidad[
                                            index
                                        ].cargafamiliar;
                                }
                                index++;
                            });
                        }
                    }

                    this.cyisLoadingTipoDocumento = false;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.cyisEditingTipoDocumento = true));
        },
        cyshowTipoDocumento() {
            this.dialogFullscrean = true;
        },
        frinitializeTipoDocumento() {
            if (this.fritemsTipoDocumento.length > 0) return;
            this.frisLoadingTipoDocumento = true;
            let url = "/typeDocumentIdentify";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.fritemsTipoDocumento = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Familiar") {
                                    this.frmodelTipoDocumento =
                                        this.datasda.curentidad[
                                            index
                                        ].idtipodocid;
                                    this.editSolicitudIngreso.frnum_tipoDocIden =
                                        this.datasda.curentidad[index].nrodoc;
                                    this.editSolicitudIngreso.frdireccion =
                                        this.datasda.curentidad[
                                            index
                                        ].direccion;
                                    this.editSolicitudIngreso.frtelefono =
                                        this.datasda.curentidad[index].telefono;
                                    this.editSolicitudIngreso.frape_paterno =
                                        this.datasda.curentidad[index].ape_pat;
                                    this.editSolicitudIngreso.frape_materno =
                                        this.datasda.curentidad[index].ape_mat;
                                    this.editSolicitudIngreso.frnombre =
                                        this.datasda.curentidad[index].nombres;
                                }
                                index++;
                            });
                        }
                    }
                    this.frisLoadingTipoDocumento = false;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.frisEditingTipoDocumento = true));
        },
        frshowTipoDocumento() {
            this.dialogFullscrean = true;
        },
        initializeTipoSocio(vm) {
            if (this.itemsTipoSocio.length > 0) return;
            this.isLoadingTipoSocio = true;
            let url = "/getTipoSocio";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsTipoSocio = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Socio") {
                                    this.modelTipoSocio =
                                        this.datasda.curentidad[index].tiposoc;
                                }
                                index++;
                            });
                        }
                    }
                    this.isLoadingTipoSocio = false;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isEditingTipoSocio = true));
        },
        showGradoEstudios() {
            this.dialogFullScreanGradoEstudios = true;
        },
        initializeGradoEstudios() {
            if (this.itemsGradoEstudios.length > 0) return;
            this.isLoadingGradoEstudios = true;
            let url = "/getGradoEstudios";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsGradoEstudios = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.gradoestudio_dpe != null) {
                                    this.modelGradoEstudios =
                                        this.datasda.curlistado[
                                            index
                                        ].gradoestudio_dpe;
                                }
                                index++;
                            });
                        }
                    }
                    this.isLoadingGradoEstudios = false;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isEditingGradoEstudios = true));
        },
        showProfesion() {
            this.dialogFullScreanProfesion = true;
        },
        initializeProfesion() {
            if (this.itemsProfesion.length > 0) return;
            this.isLoadingProfesion = true;
            let url = "/getProfesion";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsProfesion = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curlistado.length > 0) {
                            this.datasda.curlistado.forEach((e) => {
                                if (e.profesion_dpe != null) {
                                    this.modelProfesion =
                                        this.datasda.curlistado[
                                            index
                                        ].profesion_dpe;
                                    this.editSolicitudIngreso.dpid_nivMagisterial =
                                        this.datasda.curlistado[
                                            index
                                        ].nivelmagis_dpe;
                                }
                                index++;
                            });
                        }
                    }

                    this.isLoadingProfesion = false;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isEditingProfesion = true));
        },
        showParentesco() {
            this.dialogFullScreanParentesco = true;
        },
        initializeParentesco() {
            if (this.itemsParentesco.length > 0) return;
            this.isLoadingParentesco = true;
            let url = "/getParentesco";
            axios
                .get(url, {
                    cancelToken: source.token,
                })
                .then((res) => {
                    console.log(res);
                    this.itemsParentesco = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curentidad.length > 0) {
                            this.datasda.curentidad.forEach((e) => {
                                if (e.tipopersona == "Familiar") {
                                    this.editSolicitudIngreso.frid_parentesco =
                                        this.datasda.curentidad[
                                            index
                                        ].idparentesco;
                                }
                                index++;
                            });
                        }
                    }
                    this.isLoadingParentesco = false;
                })
                .catch((err) => {
                    console.log(err);
                })
                .finally(() => (this.isEditingParentesco = true));
        },
        beshowParentesco() {
            this.dialogFullScreanParentesco = true;
        },
        beinitializeParentesco() {
            if (this.beitemsParentesco.length > 0) return;
            this.beisLoadingParentesco = true;
            let url = "/getParentesco";
            axios
                .get(url)
                .then((res) => {
                    console.log(res);
                    this.beitemsParentesco = res.data;
                    if (this.datasda != null) {
                        let index = 0;
                        if (this.datasda.curbeneficiario.length > 0) {
                            this.datasda.curbeneficiario.forEach((e) => {
                                if (e.tipobeneficiario_ben != null) {
                                    this.bemodelParentesco =
                                        this.datasda.curbeneficiario[
                                            index
                                        ].tipobeneficiario_ben;
                                }
                                index++;
                            });
                        }
                    }
                    this.beisLoadingParentesco = false;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        showTipoSocio() {
            this.dialogFullScreanTipoSocio = true;
        },
        getDataTipDocIden() {
            let numDoc = this.editSolicitudIngreso.num_tipoDocIden;
            let url = "/getDataTipoDocIden/" + numDoc;
            axios
                .get(url)
                .then((res) => {
                    console.log(res.apellidoPaterno, res);
                    this.editSolicitudIngreso.ape_paterno =
                        res.data.apellidoPaterno;
                    this.editSolicitudIngreso.ape_materno =
                        res.data.apellidoMaterno;
                    this.editSolicitudIngreso.nombre = res.data.nombres;
                    this.textSnackbar = "Exito al consultar a la API Reniec.";
                    this.snackbar = true;
                })
                .catch((err) => {
                    console.log(err);
                    this.textSnackbar = "Error al consultar a la API Reniec.";
                    this.snackbar = true;
                });
        },
    },
};
</script>
<style>
.v-messages.theme--light {
    color: black;
    font-weight: bold;
}
</style>
