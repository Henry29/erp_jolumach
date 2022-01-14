<template>
  <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table">
    <v-data-table
      dense
      :headers="headers"
      :items="desserts"
      sort-by="idtipodocid"
      class="elevation-1"
      :loading="loadingTab"
      loading-text="Cargando, Por favor esperar!"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>Distrito</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-row>
            <v-col cols="5" sm="5" md="5">
              <v-autocomplete
                :disabled="!isEditingProvincia"
                v-model="model"
                :items="items"
                :loading="isLoading"
                dense
                clearable
                hide-details
                hide-selected
                item-text="nombre"
                item-value="iddep"
                label="Buscar por Departamento..."
                solo
              >
                <template v-slot:no-data>
                  <v-list-item>
                    <v-list-item-title>
                      Buscar provincias por
                      <strong>Departamento</strong>
                    </v-list-item-title>
                  </v-list-item>
                </template>
                <template v-slot:item="{ item }">
                  <v-list-item-content>
                    <v-list-item-title v-text="item.nombre"></v-list-item-title>
                    <v-list-item-subtitle
                      v-text="item.codigo"
                    ></v-list-item-subtitle>
                  </v-list-item-content>
                </template>
              </v-autocomplete>
            </v-col>
            <v-col cols="5" sm="5" md="5">
              <v-autocomplete
                :disabled="!isEditingDistrito"
                v-model="modelDistrito"
                :items="itemsDistrito"
                :loading="isLoadingDistrito"
                :search-input.sync="searchDistrito"
                dense
                clearable
                hide-details
                hide-selected
                item-text="nombre"
                item-value="idprov"
                label="Buscar por Provincia..."
                solo
              >
                <template v-slot:no-data>
                  <v-list-item>
                    <v-list-item-title>
                      Buscar distritos por
                      <strong>Provincia</strong>
                    </v-list-item-title>
                  </v-list-item>
                </template>
                <template v-slot:item="{ item }">
                  <v-list-item-content>
                    <v-list-item-title v-text="item.nombre"></v-list-item-title>
                    <v-list-item-subtitle
                      v-text="item.codigo"
                    ></v-list-item-subtitle>
                  </v-list-item-content>
                </template>
              </v-autocomplete>
            </v-col>
          </v-row>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn
                color="primary"
                dark
                class="mb-2"
                v-bind="attrs"
                v-on="on"
                v-show="btn_new"
              >
                Nuevo
              </v-btn>
            </template>
            <v-card>
              <v-card-title>
                <span class="text-h5">{{ formTitle }}</span>
              </v-card-title>

              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        v-model="editedItem.codigo"
                        label="Codigo"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        v-model="editedItem.ubigeo"
                        label="Ubigeo"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-text-field
                        v-model="editedItem.distrito"
                        label="Nombre"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        v-model="editedItem.iddep"
                        label="IdDep"
                        v-show="false"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        v-model="editedItem.idprov"
                        label="IdProv"
                        v-show="false"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        v-model="editedItem.iddist"
                        label="IdDist"
                        v-show="false"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">
                  Cancelar
                </v-btn>
                <v-btn color="blue darken-1" text @click="save">
                  Guardar
                </v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card>
              <v-card-title class="text-h5"
                >¿Esta seguro de eliminar este elemento?</v-card-title
              >
              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="closeDelete"
                  >Cancelar</v-btn
                >
                <v-btn color="blue darken-1" text @click="deleteItemConfirm"
                  >Listo</v-btn
                >
                <v-spacer></v-spacer>
              </v-card-actions>
            </v-card>
          </v-dialog>
          <v-snackbar v-model="snackbar">
            {{ text }}
            <template v-slot:action="{ attrs }">
              <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
                Cerrar
              </v-btn>
            </template>
          </v-snackbar>
        </v-toolbar>
      </template>
      <template v-slot:[`item.actions`]="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)"> mdi-pencil </v-icon>
        <v-icon small @click="deleteItem(item)"> mdi-delete </v-icon>
      </template>
      <template v-slot:no-data>
        No hay resultados. Por favor seleccione un departamento.
      </template>
    </v-data-table>
  </v-skeleton-loader>
</template>
<script>
export default {
  data() {
    return {
      loadingTab: false,
      isEditingProvincia: false,
      isEditingDistrito: false,
      isLoading: false,
      items: [],
      btn_new: false,
      model: null,
      isLoadingDistrito: false,
      itemsDistrito: [],
      modelDistrito: null,
      searchDistrito: null,
      tab: null,
      tabDistrito: null,
      dialog: false,
      dialogDelete: false,
      loading: false,
      firstLoad: true,
      snackbar: false,
      text: "",
      headers: [
        {
          text: "N°",
          align: "start",
          sortable: true,
          value: "nro",
        },
        {
          text: "IdDep",
          value: "iddep",
          align: " d-none",
        },
        {
          text: "IdProv",
          value: "idprov",
          align: " d-none",
        },
        {
          text: "IdDist",
          value: "iddist",
          align: " d-none",
        },
        { text: "Codigo", value: "codigo" },
        { text: "Ubigeo", value: "ubigeo" },
        { text: "Distrito", value: "distrito" },
        { text: "Acciones", value: "actions", sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        iddep: 0,
        idprov: 0,
        iddist: 0,
        codigo: "",
        ubigeo: "",
        distrito: "",
      },
      defaultItem: {
        iddep: 0,
        idprov: 0,
        iddist: 0,
        codigo: "",
        ubigeo: "",
        distrito: "",
      },
    };
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Nuevo" : "Editar";
    },
    formSave() {
      return this.editedIndex === -1 ? "registró" : "actualizó";
    },
  },
  watch: {
    dialog(val) {
      val || this.close();
    },
    dialogDelete(val) {
      val || this.closeDelete();
    },
    model(val) {
      console.log(val);
      if (val != null) {
        this.tab = 0;
        this.editedItem.iddep = val;
        this.itemsDistrito = [];
        this.initializeDistrito();
      } else {
        this.tab = null;
        this.itemsDistrito = [];
      }
    },
    modelDistrito(val) {
      if (val != null) {
        this.tabDistrito = 0;
        this.editedItem.idprov = val;
        this.btn_new = true;
        this.initialize(val);
      } else {
        this.btn_new = false;
        this.tabDistrito = null;
      }
    },
  },
  created() {
    this.initializeProvincia();
  },
  methods: {
    initializeProvincia() {
      if (this.items.length > 0) return;

      this.isLoading = true;

      let url = "/getUbigeo";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.items = res.data;
          this.isEditingProvincia = true;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.isLoading = false));
    },
    initializeDistrito() {
      if (this.itemsDistrito.length > 0) return;

      this.isLoadingDistrito = true;
      let id = this.editedItem.iddep;

      let url = "/getProvincia/" + id;
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
    initialize(id) {
      let me = this;
      let url = "/getDistrito/" + id;
      me.loadingTab = true;
      axios
        .get(url)
        .then(function (response) {
          console.log(response);
          me.desserts = response.data;
          me.loading = false;
          me.loadingTab = false;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
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
      let id = me.editedItem.iddist;
      axios
        .delete("/distrito/borrar/" + id)
        .then(function (response) {
          console.log(response);
          if (response.data === 1) {
            me.text = "Se eliminó el distrito Cod: " + id;
          } else {
            me.text = "No se eliminó el distrito";
          }
          me.dialogDelete = false;
          me.snackbar = true;
          me.initialize(me.editedItem.idprov);
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
    save() {
      let me = this;
      let url = "/distrito/guardar"; //Ruta que hemos creado para enviar una tarea y guardarla
      let textSave = me.formSave;
      axios
        .post(url, {
          //estas variables son las que enviaremos para que crear la tarea
          editedItem: me.editedItem,
        })
        .then(function (response) {
          if (response.data[0].estado_registro === true) {
            me.text =
              "Se " + textSave + " el distrito Cod: " + response.data[0].iddist;
          } else {
            me.text = "No se " + textSave + " el distrito";
          }
          me.dialog = false;
          me.snackbar = true;
          me.initialize(me.editedItem.idprov);
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
};
</script>