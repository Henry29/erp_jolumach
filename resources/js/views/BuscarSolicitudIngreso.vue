<template>
  <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table">
    <v-card>
      <v-expansion-panels>
        <v-expansion-panel>
          <v-expansion-panel-header>
            <h3>BUSQUEDA</h3>
          </v-expansion-panel-header>
          <v-expansion-panel-content>
            <v-form lazy-validation ref="bform">
              <v-row>
                <v-col sm="3" md="3">
                  <v-text-field
                    v-model="buscarObj.nrodocumento_sad"
                    label="Núm. Doc. Solicitud Adm."
                    solo
                    dense
                    append-icon="mdi-close-circle"
                  ></v-text-field>
                </v-col>
                <v-col sm="3" md="3">
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
                        hint="* Fecha Inicio"
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
                <v-col sm="3" md="3">
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
                        v-model="dateFormatted2"
                        label="Fecha de Fin"
                        persistent-hint
                        append-icon="mdi-calendar"
                        v-bind="attrs"
                        @blur="date2 = parseDate(dateFormatted2)"
                        hint="* Fecha Fin"
                        v-on="on"
                        dense
                        solo
                      ></v-text-field>
                    </template>
                    <v-date-picker
                      v-model="date2"
                      no-title
                      @input="menu2 = false"
                    ></v-date-picker>
                  </v-menu>
                </v-col>
                <v-col sm="3" md="3">
                  <v-autocomplete
                    v-model="buscarObj.estado_sad"
                    :items="bitemsEstadoSolicitud"
                    :loading="bisLoadingEstadoSolicitud"
                    dense
                    item-text="descripcion_ane"
                    item-value="identificador_ane"
                    label="Estado de Solicitud..."
                    solo
                    :append-icon="'mdi-close-circle'"
                    hide-details
                    @click="initializeEstadoSolicitud"
                    no-data-text="Cargando Estados de Solicitud"
                  >
                  </v-autocomplete>
                </v-col>
                <v-col sm="3" md="3" class="pt-0">
                  <v-autocomplete
                    v-model="buscarObj.tipoplanilla"
                    :items="bitemsTipoPlanilla"
                    :loading="bisLoadingTipoPlanilla"
                    dense
                    item-text="descripcion"
                    item-value="idmaestro"
                    label="Tipo de Planilla..."
                    solo
                    :append-icon="'mdi-close-circle'"
                    hide-details
                    @click="initializeTipoPlanilla"
                    no-data-text="Cargando Tipos de planilla.."
                  >
                  </v-autocomplete>
                </v-col>
                <v-col sm="3" md="3" class="pt-0">
                  <v-autocomplete
                    v-model="buscarObj.tipocontrato"
                    :items="bitemsTipoContrato"
                    :loading="bisLoadingTipoContrato"
                    dense
                    item-text="descripcion"
                    item-value="idmaestro"
                    label="Tipo Contrato..."
                    solo
                    :append-icon="'mdi-close-circle'"
                    hide-details
                    @click="initializeTipoContrato"
                    no-data-text="Cargando Tipos de contrato.."
                  >
                  </v-autocomplete>
                </v-col>
                <v-col sm="3" md="3" class="pt-0">
                  <v-autocomplete
                    v-model="buscarObj.idregimenlab"
                    :items="bitemsRegimenLaboral"
                    :loading="bisLoadingRegimenLaboral"
                    dense
                    item-text="descripcion"
                    item-value="idmaestro"
                    label="Regimen Laboral..."
                    solo
                    :append-icon="'mdi-close-circle'"
                    hide-details
                    @click="initializeRegimenLaboral"
                    no-data-text="Cargando Regimenes Laborales.."
                  >
                  </v-autocomplete>
                </v-col>
                <v-col sm="3" md="3" class="pt-0">
                  <v-autocomplete
                    v-model="buscarObj.idregimenpen"
                    :items="bitemsRegimenPensionario"
                    :loading="bisLoadingRegimenPensionario"
                    dense
                    item-text="descripcion"
                    item-value="idmaestro"
                    label="Regimen Pensionario..."
                    solo
                    :append-icon="'mdi-close-circle'"
                    hide-details
                    @click="initializeRegimenPensionario"
                    no-data-text="Cargando Regimenes Pensionarios.."
                  >
                  </v-autocomplete>
                </v-col>
              </v-row>
              <v-row>
                <v-col></v-col>
                <v-col class="text-right">
                  <v-btn dark color="indigo darken-1" @click="search">
                    Buscar
                  </v-btn>
                </v-col>
              </v-row>
            </v-form>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-expansion-panels>
    </v-card>
    <v-card>
      <v-card-title> Solicitud Ingreso de Admisión </v-card-title>
      <v-card-text>
        <v-data-table
          dense
          :headers="headers"
          :items="desserts"
          sort-by="nro"
          :sort-desc="true"
          class="elevation-1"
          :loading="loadingTab"
          loading-text="Cargando, Por favor esperar!"
        >
          <template v-slot:[`item.actions`]="{ item }">
            <v-icon small class="mr-2" @click="editItem(item)">
              mdi-pencil
            </v-icon>
          </template>
          <template v-slot:no-data> No hay resultados. </template>
        </v-data-table>
      </v-card-text>
    </v-card>
  </v-skeleton-loader>
</template>
<script>
export default {
  data(vm) {
    return {
      loadingTab: false,
      items: [],
      loading: true,
      firstLoad: true,
      //   snackbar: false,
      //   text: "",
      rules: [(v) => !!v || "Este campo es requerido"],
      headers: [
        {
          text: "N°",
          value: "nro",
        },
        { text: "Num. Doc.", value: "nrodocumento_sad" },
        { text: "Id.", value: "identificador_sad" },
        { text: "Estado", value: "estado_descripcion" },
        { text: "Fec. Ingreso", value: "fechaingreso_sad" },
        { text: "Fec. Solicitud", value: "fechasolicitud_sad" },
        { text: "Fec. Sesión", value: "fechasesion_sad" },
        { text: "Acciones", value: "actions", sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      buscarObj: {
        nrodocumento_sad: null,
        fecsol_inicio: null,
        fecsol_fin: null,
        estado_sad: 0,
        tipoplanilla: null,
        tipocontrato: 0,
        idregimenlab: 0,
        idregimenpen: 0,
      },
      menu1: false,
      date: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
      dateFormatted: vm.formatDate(
        new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
          .toISOString()
          .substr(0, 10)
      ),
      menu2: false,
      date2: new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
        .toISOString()
        .substr(0, 10),
      dateFormatted2: vm.formatDate(
        new Date(Date.now() - new Date().getTimezoneOffset() * 60000)
          .toISOString()
          .substr(0, 10)
      ),
      bitemsEstadoSolicitud: [],
      bisLoadingEstadoSolicitud: false,
      bisLoadingTipoPlanilla: false,
      bitemsTipoPlanilla: [],
      bisLoadingTipoContrato: false,
      bitemsTipoContrato: [],
      bisLoadingRegimenLaboral: false,
      bitemsRegimenLaboral: [],
      bisLoadingRegimenPensionario: false,
      bitemsRegimenPensionario: [],
    };
  },
  computed: {
    computedDateFormatted() {
      return this.formatDate(this.date);
    },
  },
  watch: {
    date(val) {
      this.buscarObj.fecsol_inicio = val;
      this.dateFormatted = this.formatDate(this.date);
    },
    date2(val) {
      this.buscarObj.fecsol_fin = val;
      this.dateFormatted2 = this.formatDate(this.date2);
    },
  },
  created() {
    this.initialize();
  },
  methods: {
    search() {
      this.initialize();
    },
    initializeRegimenPensionario() {
      if (this.bitemsRegimenPensionario.length > 0) return;

      this.bisLoadingRegimenPensionario = true;

      let url = "/getTipoRegimenPensionario";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.bitemsRegimenPensionario = res.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.bisLoadingRegimenPensionario = false));
    },
    initializeRegimenLaboral() {
      if (this.bitemsRegimenLaboral.length > 0) return;

      this.bisLoadingRegimenLaboral = true;

      let url = "/getRegimenLaboral";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.bitemsRegimenLaboral = res.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.bisLoadingRegimenLaboral = false));
    },
    initializeTipoContrato() {
      if (this.bitemsTipoContrato.length > 0) return;

      this.bisLoadingTipoContrato = true;

      let url = "/getTipoContratoLaboral";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.bitemsTipoContrato = res.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.bisLoadingTipoContrato = false));
    },
    initializeTipoPlanilla() {
      if (this.bitemsTipoPlanilla.length > 0) return;

      this.bisLoadingTipoPlanilla = true;

      let url = "/getTipoPlanilla";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.bitemsTipoPlanilla = res.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.bisLoadingTipoPlanilla = false));
    },
    initializeEstadoSolicitud() {
      if (this.bitemsEstadoSolicitud.length > 0) return;

      this.bisLoadingEstadoSolicitud = true;

      let url = "/getEstadoSolicitud";
      axios
        .get(url)
        .then((res) => {
          this.bitemsEstadoSolicitud = res.data;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => {
          this.bisLoadingEstadoSolicitud = false;
        });
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
    initialize() {
      let me = this;
      let url = "/solicitudAdmision/buscar"; //Ruta que hemos creado para enviar una tarea y guardarla
      let filtro = {
        nrodocumento: this.buscarObj.nrodocumento_sad,
        estado_sad: this.buscarObj.estado_sad,
        fecsol_inicio: this.buscarObj.fecsol_inicio,
        fecsol_fin: this.buscarObj.fecsol_fin,
        tipolibro: 0,
        idugel: 0,
        insteduca: 0,
        nrolibro: 0,
        tipoplanilla: this.buscarObj.tipoplanilla,
        idcargo: 0,
        tipocontrato: this.buscarObj.tipocontrato,
        idregimenlab: this.buscarObj.idregimenlab,
        idregimenpen: this.buscarObj.idregimenpen,
        nroctasocio: null,
        nrodocsocio: null,
        identificador_sad: 0,
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
          me.loading = false;
          me.desserts = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    editItem(item) {
      let id = item.identificador_sad;
      let router = this.$router;
      router.push({ name: "solicitudIngresoId", params: { id } });
    },
    deleteItem(item) {
      this.editedIndex = this.desserts.indexOf(item);
      this.editedItem = Object.assign({}, item);
    },
  },
};
</script>