<template>
  <v-stepper non-linear value="1">
    <v-stepper-header>
      <v-stepper-step editable step="1"> Datos Generales </v-stepper-step>
      <v-divider></v-divider>
      <v-stepper-step editable step="2"> Datos Personales </v-stepper-step>
      <v-divider></v-divider>
      <v-stepper-step step="3"> Datos Evaluación </v-stepper-step>
    </v-stepper-header>
    <v-stepper-items>
      <v-stepper-content step="1">
        <v-card class="mb-4" color="grey lighten-1">
          <v-snackbar v-model="snackbar">
            {{ textSnackbar }}
            <template v-slot:action="{ attrs }">
              <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
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
                  @click="dialogFullScreanRegimenPensionario = false"
                >
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanRegimenPensionario = false"
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
                  @click="dialogFullScreanRiesgoCrediticio = false"
                >
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanRiesgoCrediticio = false"
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
                  @click="dialogFullScreanRegimenLaboral = false"
                >
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanRegimenLaboral = false"
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
                <v-btn icon dark @click="dialogFullScreanTipoContrato = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanTipoContrato = false"
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
                <v-btn icon dark @click="dialogFullScreanCargo = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullScreanCargo = false">
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
                <v-btn icon dark @click="dialogFullScreanInsEducativa = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanInsEducativa = false"
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
                <v-btn icon dark @click="dialogFullScreanTipoPlanilla = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanTipoPlanilla = false"
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
                <v-btn icon dark @click="dialogFullScreanUgel = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullScreanUgel = false">
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
                <v-btn icon dark @click="dialogFullScreanGradoEstudios = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanGradoEstudios = false"
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
                <v-btn icon dark @click="dialogFullScreanProfesion = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullScreanProfesion = false">
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
                <v-btn icon dark @click="dialogFullScreanTipoVivienda = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanTipoVivienda = false"
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
                <v-btn icon dark @click="dialogFullscrean = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullscrean = false">
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
                <v-btn icon dark @click="dialogFullScreanTipoSocio = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullScreanTipoSocio = false">
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
                <v-btn icon dark @click="dialogFullScreanDepartamento = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn
                    dark
                    text
                    @click="dialogFullScreanDepartamento = false"
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
                <v-btn icon dark @click="dialogFullScreanProvincia = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullScreanProvincia = false">
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
                <v-btn icon dark @click="dialogFullScreanDistrito = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullScreanDistrito = false">
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
                        :disabled="!isEditingTipoDocumento"
                        v-model="modelTipoDocumento"
                        :items="itemsTipoDocumento"
                        :loading="isLoadingTipoDocumento"
                        dense
                        item-text="nombre"
                        item-value="idtipodocid"
                        label="Tipo Documento Identidad..."
                        solo
                        :append-icon="'mdi-plus-box'"
                        @click:append="showTipoDocumento"
                        hide-details
                        :rules="rules"
                        required
                      >
                      </v-autocomplete>
                    </v-col>
                    <v-col md="6">
                      <v-text-field
                        v-model="editSolicitudIngreso.dgnum_tipoDocIden"
                        label="Nº Documento..."
                        solo
                        dense
                        hide-details
                        :append-icon="'mdi-api'"
                        @click:append="getDataTipDocIden"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-col>
                <v-col md="4">
                  <v-row>
                    <v-col md="12">
                      <v-text-field
                        v-model="editSolicitudIngreso.dgcodModular"
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
                    v-model="editSolicitudIngreso.dgape_paterno"
                    label="Apellido Paterno..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="editSolicitudIngreso.dgape_materno"
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
                    v-model="editSolicitudIngreso.dgcod_cargo"
                    label="Código Cargo..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="3">
                  <v-text-field
                    v-model="editSolicitudIngreso.dgcod_carben"
                    label="Código Carben..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="3">
                  <v-autocomplete
                    :disabled="!isEditingTipoSocio"
                    v-model="modelTipoSocio"
                    :items="itemsTipoSocio"
                    :loading="isLoadingTipoSocio"
                    dense
                    item-text="descripcion"
                    item-value="idmaestro"
                    label="Tipo Socio..."
                    solo
                    :append-icon="'mdi-plus-box'"
                    @click:append="showTipoSocio"
                    hide-details
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="3">
                  <v-select
                    :items="itemsEstadoCivil"
                    v-model="editSolicitudIngreso.dgest_civil"
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
                    v-model="editSolicitudIngreso.dgtelefono"
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
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="dateFormatted"
                        label="Fecha de Nacimiento"
                        persistent-hint
                        append-icon="mdi-calendar"
                        v-bind="attrs"
                        @blur="date = parseDate(dateFormatted)"
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
                <v-col md="4">
                  <v-file-input
                    v-model="image"
                    accept="image/*"
                    label="Foto..."
                    solo
                    dense
                  ></v-file-input>
                </v-col>
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
                <v-btn icon dark @click="dialogFullscrean = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullscrean = false">
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
                <v-btn icon dark @click="dialogFullScreanTipoSocio = false">
                  <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-toolbar-title>Ventana Modal</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-toolbar-items>
                  <v-btn dark text @click="dialogFullScreanTipoSocio = false">
                    Regresar
                  </v-btn>
                </v-toolbar-items>
              </v-toolbar>
              <v-card-text class="mt-5">
                <app-tipSocio></app-tipSocio>
              </v-card-text>
            </v-card>
          </v-dialog>
          <v-card-title class="pb-0">Lugar de Nacimiento</v-card-title>
          <v-form ref="lnform" lazy-validation>
            <v-container>
              <v-row>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingDepartamento"
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
                    @change="(event) => changeDistrito(event, itemsDistrito)"
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
                    v-model="editSolicitudIngreso.dndireccion"
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
                    v-model="editSolicitudIngreso.dnreferencia"
                    label="Referencia..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingTipoVivienda"
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
                  >
                  </v-autocomplete>
                </v-col>
              </v-row>
              <v-row>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!dnisEditingDepartamento"
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
                      (event) => dnchangeDistrito(event, dnitemsDistrito)
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
          <v-card-title class="pb-0">Datos Profesionales</v-card-title>
          <v-form>
            <v-container>
              <v-row>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingGradoEstudios"
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
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingProfesion"
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
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="4">
                  <v-select
                    :items="itemsNivelMagisterial"
                    v-model="editSolicitudIngreso.dpid_nivMagisterial"
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
      </v-stepper-content>
      <v-stepper-content step="2">
        <v-dialog
          v-model="dialogFullScreanParentesco"
          fullscreen
          hide-overlay
          transition="dialog-bottom-transition"
        >
          <v-card>
            <v-toolbar dark color="indigo darken-4">
              <v-btn icon dark @click="dialogFullScreanParentesco = false">
                <v-icon>mdi-close</v-icon>
              </v-btn>
              <v-toolbar-title>Ventana Modal</v-toolbar-title>
              <v-spacer></v-spacer>
              <v-toolbar-items>
                <v-btn dark text @click="dialogFullScreanParentesco = false">
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
                    :disabled="!isEditingTipoDocumento"
                    v-model="cymodelTipoDocumento"
                    :items="itemsTipoDocumento"
                    :loading="isLoadingTipoDocumento"
                    dense
                    item-text="nombre"
                    item-value="idtipodocid"
                    label="Tipo Documento Identidad..."
                    solo
                    :append-icon="'mdi-plus-box'"
                    @click:append="showTipoDocumento"
                    hide-details
                    :rules="rules"
                    required
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="3">
                  <v-text-field
                    v-model="editSolicitudIngreso.cynum_tipoDocIden"
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
                    v-model="editSolicitudIngreso.cyest_civil"
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
                    v-model="editSolicitudIngreso.cyape_paterno"
                    label="Apellido Paterno..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="editSolicitudIngreso.cyape_materno"
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
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="cydateFormatted"
                        label="Fecha de Nacimiento"
                        persistent-hint
                        append-icon="mdi-calendar"
                        v-bind="attrs"
                        @blur="cydate = parseDate(cydateFormatted)"
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
                    v-model="editSolicitudIngreso.cytelefono"
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
                    v-model="editSolicitudIngreso.cycar_familiar"
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
                    :disabled="
                      !isEditingTipoDocumento || elementActive.frActive1
                    "
                    v-model="frmodelTipoDocumento"
                    :items="itemsTipoDocumento"
                    :loading="isLoadingTipoDocumento"
                    dense
                    item-text="nombre"
                    item-value="idtipodocid"
                    label="Tipo Documento Identidad..."
                    solo
                    :append-icon="'mdi-plus-box'"
                    @click:append="showTipoDocumento"
                    hide-details
                    :rules="rules"
                    required
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="editSolicitudIngreso.frnum_tipoDocIden"
                    label="Nº Documento..."
                    solo
                    dense
                    hide-details
                    :disabled="elementActive.frActive2"
                    :rules="rules"
                    required
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingParentesco || elementActive.frActive3"
                    v-model="frmodelParentesco"
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
                  >
                  </v-autocomplete>
                </v-col>
              </v-row>
              <v-row>
                <v-col md="8">
                  <v-text-field
                    v-model="editSolicitudIngreso.frdireccion"
                    label="Dirección..."
                    solo
                    dense
                    hide-details
                    :disabled="elementActive.frActive4"
                    :rules="rules"
                    required
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="editSolicitudIngreso.frtelefono"
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
                    v-model="editSolicitudIngreso.frape_paterno"
                    label="Apellido Paterno..."
                    solo
                    dense
                    hide-details
                    :disabled="elementActive.frActive6"
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="editSolicitudIngreso.frape_materno"
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
                    :disabled="
                      !frisEditingDepartamento || elementActive.frActive9
                    "
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
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="
                      !frisEditingProvincia || elementActive.frActive10
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
                    :disabled="!frisEditingDistrito || elementActive.frActive11"
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
                      (event) => frchangeDistrito(event, fritemsDistrito)
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
                    :disabled="!isEditingUgel"
                    v-model="dtmodelUgel"
                    :items="itemsUgel"
                    :loading="isLoadingUgel"
                    dense
                    item-text="descripcion"
                    item-value="idmaestro"
                    label="Ugel..."
                    solo
                    :append-icon="'mdi-plus-box'"
                    @click:append="showUgel"
                    hide-details
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingTipoPlanilla"
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
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingConvenio"
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
                  >
                  </v-autocomplete>
                </v-col>
              </v-row>
              <v-row>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingInsEducativa"
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
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingCargo"
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
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="4">
                  <v-autocomplete
                    :disabled="!isEditingTipoContrato"
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
                  >
                  </v-autocomplete>
                </v-col>
              </v-row>
              <v-row>
                <v-col md="3">
                  <v-autocomplete
                    :disabled="!isEditingRegimenLaboral"
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
                  >
                  </v-autocomplete>
                </v-col>
                <v-col md="3">
                  <v-autocomplete
                    :disabled="!isEditingRegimenPensionario"
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
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="dtdateFormatted"
                        label="Fecha de Nacimiento"
                        persistent-hint
                        append-icon="mdi-calendar"
                        v-bind="attrs"
                        @blur="dtdate = parseDate(dtdateFormatted)"
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
                    v-model="editSolicitudIngreso.dtanhServicio"
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
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="btdateFormatted2"
                        label="Fecha Boleta"
                        persistent-hint
                        append-icon="mdi-calendar"
                        v-bind="attrs"
                        @blur="btdate2 = parseDate(btdateFormatted2)"
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
                    <template v-slot:activator="{ on, attrs }">
                      <v-text-field
                        v-model="btdateFormatted3"
                        label="Fecha Término"
                        persistent-hint
                        append-icon="mdi-calendar"
                        v-bind="attrs"
                        @blur="btdate3 = parseDate(btdateFormatted3)"
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
                    :disabled="!isEditingRiesgoCrediticio"
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
                    v-model="editSolicitudIngreso.btescolaridad"
                    persistent-hint
                    hint="* Escolaridad"
                    solo
                    dense
                    @keypress="isNumber($event)"
                  ></v-text-field
                ></v-col>
                <v-col md="2" class="pt-0 pb-0"
                  ><v-text-field
                    v-model="editSolicitudIngreso.btgratificacion"
                    persistent-hint
                    hint="* Gratificación"
                    solo
                    dense
                    @keypress="isNumber($event)"
                  ></v-text-field
                ></v-col>
                <v-col md="2" class="pt-0 pb-0"
                  ><v-text-field
                    v-model="editSolicitudIngreso.btincentivos"
                    persistent-hint
                    hint="* Incentivos"
                    solo
                    dense
                    @keypress="isNumber($event)"
                  ></v-text-field
                ></v-col>
                <v-col md="2" class="pt-0 pb-0"
                  ><v-text-field
                    v-model="editSolicitudIngreso.btotrosdesct"
                    persistent-hint
                    hint="* Otros Dscto"
                    solo
                    dense
                    @keypress="isNumber($event)"
                  ></v-text-field
                ></v-col>
                <v-col md="2" class="pt-0 pb-0"
                  ><v-text-field
                    v-model="editSolicitudIngreso.btimponible"
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
                    v-model="editSolicitudIngreso.btobservacion"
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
            <v-btn color="primary" @click="guardar1"> Guardar </v-btn>
            <v-btn color="primary" @click="imprimir"> Imprimir </v-btn>
          </v-col>
        </v-row>
      </v-stepper-content>
      <v-stepper-content step="3">
        <v-card class="mb-4" color="grey lighten-1"></v-card>
        <v-row>
          <v-col class="text-right">
            <v-btn color="primary"> Guardar </v-btn>
            <v-btn color="primary"> Salir </v-btn>
            <v-btn color="primary"> Imprimir </v-btn>
          </v-col>
        </v-row>
      </v-stepper-content>
    </v-stepper-items>
  </v-stepper>
</template>


<script>
export default {
  data(vm) {
    return {
      idpersona: "",
      idconyuge: "",
      rules: [(v) => !!v || "Este campo is requerido"],
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
      validarReferencia: false,
      image: null,
      imageName: "",
      isEditingTipoDocumento: false,
      isLoadingTipoDocumento: false,
      itemsTipoDocumento: [],
      modelTipoDocumento: null,
      cymodelTipoDocumento: null,
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
      snackbar: false,
      textSnackbar: "",
      date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
      dateFormatted: vm.formatDate(
        new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
          .toISOString()
          .substr(0, 10)
      ),
      cydate: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
      cydateFormatted: vm.formatDate(
        new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
          .toISOString()
          .substr(0, 10)
      ),
      dtdate: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
      dtdateFormatted: vm.formatDate(
        new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
          .toISOString()
          .substr(0, 10)
      ),
      btdate2: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
      btdateFormatted2: vm.formatDate(
        new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
          .toISOString()
          .substr(0, 10)
      ),
      btdate3: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
      btdateFormatted3: vm.formatDate(
        new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
          .toISOString()
          .substr(0, 10)
      ),
      menu1: false,
      menu2: false,
      menu3: false,
      menu4: false,
      menu5: false,
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
      activebtLiquido: true,
    };
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
    modelTipoDocumento(val) {
      this.editSolicitudIngreso.dgid_tipDocIden = val;
    },
    cymodelTipoDocumento(val) {
      this.editSolicitudIngreso.cyid_tipDocIden = val;
    },
    frmodelTipoDocumento(val) {
      this.editSolicitudIngreso.frid_tipDocIden = val;
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
    date(val) {
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
  },
  created() {
    this.initializeTipoDocumento();
    this.initializeTipoSocio();
    this.initializeTipoVivienda();
    this.initializeDepartamento();
    this.dninitializeDepartamento();
    this.frinitializeDepartamento();
    this.initializeGradoEstudios();
    this.initializeProfesion();
    this.initializeParentesco();
    this.initializeUgel();
    this.initializeTipoPlanilla();
    this.initializeConvenio();
    this.initializeInsEducativa();
    this.initializeCargo();
    this.initializeTipoContrato();
    this.initializeRegimenLaboral();
    this.initializeRegimenPensionario();
    this.initializeRiesgoCrediticio();
  },
  methods: {
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
      let btvalidate = await this.$refs.btform.validate();

      console.log(
        validate,
        lnvalidate,
        dnvalidate,
        cyvalidate,
        frvalidate,
        btvalidate
      );

      if (
        !(
          validate &&
          lnvalidate &&
          dnvalidate &&
          cyvalidate &&
          frvalidate &&
          btvalidate
        )
      ) {
        return;
      }

      let url = "/solicitudAdmision/guardar";

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
        18: tiposoc,
        19: titulo,
        20: nrohijos,
        21: estado_per,
        22: this.editSolicitudIngreso.dgcod_cargo,
        23: this.editSolicitudIngreso.dgcod_carben,
        24: nacionalidad,
        25: tiposocio,
        26: idugel,
        27: this.editSolicitudIngreso.dgmovil,
        28: lugarnac,
        29: haburbana,
        30: registrado,
        31: this.imageName,
        32: codpers,
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

      let obj_solicitudadmision = {
        0: this.editSolicitudIngreso.btfec_boleta,
        1: 0,
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

      axios
        .post(url, {
          obj: obj,
          obj_direccion: obj_direccion,
          obj_conyuge: obj_conyuge,
          obj_familiar: obj_familiar,
          obj_datopersona: obj_datopersona,
          obj_solicitudadmision: obj_solicitudadmision,
        })
        .then(function (response) {
          me.idpersona = response.data[0].idpersona_socio;
          me.idconyuge = response.data[0].idpersona_conyuge;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    imprimir() {
      let url = "/solicitudAdmision/imprimir";
      axios
        .post(url, {
          idpersona: this.idpersona,
          idconyuge: this.idconyuge,
        },{responseType: 'arraybuffer'})
        .then(function (response) {
          let blob = new Blob([response.data], { type: "application/pdf" });
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
    initializeRiesgoCrediticio() {
      if (this.itemsRiesgoCrediticio.length > 0) return;

      this.isLoadingRiesgoCrediticio = true;

      let url = "/getRiesgoCrediticio";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsRiesgoCrediticio = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsRegimenPensionario = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsRegimenLaboral = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsTipoContrato = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsCargo = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsInsEducativa = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsConvenio = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsTipoPlanilla = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsUgel = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsTipoVivienda = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsDepartamento = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.dnitemsDepartamento = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.fritemsDepartamento = res.data;
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
    initializeTipoDocumento() {
      if (this.itemsTipoDocumento.length > 0) return;
      this.isLoadingTipoDocumento = true;
      let url = "/typeDocumentIdentify";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsTipoDocumento = res.data;
          this.isLoadingTipoDocumento = false;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.isEditingTipoDocumento = true));
    },
    showTipoDocumento() {
      this.dialogFullscrean = true;
    },
    initializeTipoSocio() {
      if (this.itemsTipoSocio.length > 0) return;
      this.isLoadingTipoSocio = true;
      let url = "/getTipoSocio";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsTipoSocio = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsGradoEstudios = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsProfesion = res.data;
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
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsParentesco = res.data;
          this.isLoadingParentesco = false;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.isEditingParentesco = true));
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
          this.editSolicitudIngreso.ape_paterno = res.data.apellidoPaterno;
          this.editSolicitudIngreso.ape_materno = res.data.apellidoMaterno;
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