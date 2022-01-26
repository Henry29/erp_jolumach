<template>
  <v-stepper non-linear value="1">
    <v-stepper-header>
      <v-stepper-step editable step="1"> Datos Generales </v-stepper-step>
      <v-divider></v-divider>
      <v-stepper-step editable step="2"> Datos Personales </v-stepper-step>
      <v-divider></v-divider>
      <v-stepper-step editable step="3"> Datos Evaluación </v-stepper-step>
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
          <v-form>
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
                      >
                      </v-autocomplete>
                    </v-col>
                    <v-col md="6">
                      <v-text-field
                        v-model="editSolicitudIngreso.num_tipoDocIden"
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
                        v-model="editSolicitudIngreso.codModular"
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
                    v-model="editSolicitudIngreso.ape_paterno"
                    label="Apellido Paterno..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="editSolicitudIngreso.ape_materno"
                    label="Apellido Materno..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-text-field
                    v-model="editSolicitudIngreso.nombre"
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
                    v-model="editSolicitudIngreso.cod_cargo"
                    label="Código Cargo..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="3">
                  <v-text-field
                    v-model="editSolicitudIngreso.cod_carben"
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
                    v-model="editSolicitudIngreso.edad"
                    label="Edad..."
                    solo
                    dense
                    hide-details
                    suffix="años"
                  ></v-text-field>
                </v-col>
                <v-col md="3">
                  <v-text-field
                    v-model="editSolicitudIngreso.telefono"
                    label="Telefono..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="3">
                  <v-text-field
                    v-model="editSolicitudIngreso.movil"
                    label="Móvil..."
                    solo
                    dense
                    hide-details
                  ></v-text-field>
                </v-col>
                <v-col md="3">
                  <v-select
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
                        prepend-icon="mdi-calendar"
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
                    v-model="editSolicitudIngreso.email"
                    label="Correo..."
                    solo
                    dense
                  ></v-text-field>
                </v-col>
                <v-col md="4">
                  <v-file-input
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
          <v-form>
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
                  >
                  </v-autocomplete>
                </v-col>
              </v-row>
            </v-container>
          </v-form>
        </v-card>
      </v-stepper-content>
      <v-stepper-content step="2">
        <v-card class="mb-4" color="grey lighten-1"></v-card>
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
      editSolicitudIngreso: {
        idSolicitudIngreso: 0,
        id_tipDocIden: 0,
        num_tipoDocIden: "",
        codModular: "",
        ape_paterno: "",
        ape_materno: "",
        cod_cargo: "",
        nombre: "",
        tip_socio: "",
        edad: "",
        telefono: "",
        movil: "",
        iddep: 0,
        idprov: 0,
        iddist: 0,
        lug_nacimiento: "",
      },
      itemsEstadoCivil: [
        { id: "S", nombre: "Soltero" },
        { id: "C", nombre: "Casado" },
      ],
      itemsSexo: [
        { id: "M", nombre: "Masculino" },
        { id: "F", nombre: "Femenino" },
      ],
      isEditingTipoDocumento: false,
      isLoadingTipoDocumento: false,
      itemsTipoDocumento: [],
      modelTipoDocumento: null,
      isEditingTipoSocio: false,
      isLoadingTipoSocio: false,
      itemsTipoSocio: [],
      modelTipoSocio: null,
      isEditingDepartamento: false,
      isLoadingDepartamento: false,
      itemsDepartamento: [],
      modelDepartamento: null,
      isEditingProvincia: false,
      isLoadingProvincia: false,
      itemsProvincia: [],
      modelProvincia: null,
      isEditingDistrito: false,
      isLoadingDistrito: false,
      itemsDistrito: [],
      modelDistrito: null,
      dialogFullScreanDepartamento: false,
      dialogFullScreanProvincia: false,
      dialogFullScreanDistrito: false,
      dialogFullScreanTipoSocio: false,
      dialogFullscrean: false,
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
      menu1: false,
    };
  },
  computed: {
    computedDateFormatted() {
      return this.formatDate(this.date);
    },
  },
  watch: {
    modelTipoDocumento(val) {
      this.editSolicitudIngreso.id_tipDocIden = val;
    },
    modelTipoSocio(val) {
      this.editSolicitudIngreso.tip_socio = val;
    },
    modelDepartamento(val) {
      if (val != null) {
        this.editSolicitudIngreso.iddep = val;
        this.itemsProvincia = [];
        this.initializeProvincia(val);
      } else {
        this.itemsProvincia = [];
      }
    },
    modelProvincia(val) {
      if (val != null) {
        this.editSolicitudIngreso.idprov = val;
        this.itemsDistrito = [];
        this.initializeDistrito(val);
      } else {
        this.itemsDistrito = [];
      }
    },
    modelDistrito(val) {
      console.log(val);
      if (val != null) {
        this.editSolicitudIngreso.iddist = val;
      }
    },
    date(val) {
      this.editSolicitudIngreso.edad = val;
      this.dateFormatted = this.formatDate(this.date);
    },
  },
  created() {
    this.initializeTipoDocumento();
    this.initializeTipoSocio();
    this.initializeDepartamento();
  },
  methods: {
    changeDistrito(event, itemsDistrito) {
      itemsDistrito.forEach((distrito) => {
        if (distrito.iddist == event) {
          this.editSolicitudIngreso.lug_nacimiento = distrito.ubigeo;
        }
      });
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
    showTipoSocio() {
      this.dialogFullScreanTipoSocio = true;
    },
    getDataTipDocIden() {
      let numDoc = this.editSolicitudIngreso.num_tipoDocIden;
      let url = "/getDataTipoDocIden/" + numDoc;
      axios
        .get(url)
        .then((res) => {
          console.log(res.apellidoPaterno,res);
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