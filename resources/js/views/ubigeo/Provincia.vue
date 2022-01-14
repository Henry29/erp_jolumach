<template>
  <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table">
    <v-data-table
      dense
      :headers="headers"
      :items="desserts"
      sort-by="idprov"
      class="elevation-1"
      :loading="loadingTab"
      loading-text="Cargando, Por favor esperar!"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>Pronvicia</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-row>
            <v-col cols="12" sm="12" md="5">
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
                        v-model="editedItem.nombre"
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
              <v-card-title class="text-h5">
                ¿Esta seguro de eliminar este elemento?
              </v-card-title>
              <v-spacer></v-spacer>
              <v-layout justify-center>
                <v-card-text class="text-center">
                  <v-icon large color="red darken-2"> mdi-delete-alert </v-icon>
                </v-card-text>
              </v-layout>
              <v-spacer></v-spacer>
              <v-layout justify-center>
                <v-card-actions>
                  <v-spacer></v-spacer>
                  <v-btn
                    class="ma-2"
                    dark
                    color="indigo darken-2"
                    @click="closeDelete"
                  >
                    No
                  </v-btn>
                  <v-btn
                    class="ma-2"
                    dark
                    color="indigo darken-2"
                    @click="deleteItemConfirm"
                  >
                    Si
                  </v-btn>
                </v-card-actions>
              </v-layout>
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
      isLoading: false,
      isEditingProvincia: false,
      items: [],
      btn_new: false,
      model: null,
      tab: null,
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
        { text: "Codigo", value: "codigo" },
        { text: "Ubigeo", value: "ubigeo" },
        { text: "Departamento", value: "departamento" },
        { text: "Provincia", value: "nombre" },
        { text: "Acciones", value: "actions", sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        iddep: 0,
        idprov: 0,
        codigo: "",
        ubigeo: "",
        nombre: "",
      },
      defaultItem: {
        iddep: 0,
        idprov: 0,
        codigo: "",
        ubigeo: "",
        nombre: "",
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
      if (val != null) {
        this.tab = 0;
        this.editedItem.iddep = val;
        this.btn_new = true;
        this.initialize(val);
      } else {
        this.btn_new = false;
        this.tab = null;
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
    initialize(id) {
      let me = this;
      let url = "/getProvincia/" + id;
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
      let id = me.editedItem.idprov;
      axios
        .delete("/provincia/borrar/" + id)
        .then(function (response) {
          console.log(response);
          if (response.data === 1) {
            me.text = "Se eliminó la provincia Cod: " + id;
          } else {
            me.text = "No se eliminó la provincia";
          }
          me.dialogDelete = false;
          me.snackbar = true;
          me.initialize(me.editedItem.iddep);
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
      let url = "/provincia/guardar"; //Ruta que hemos creado para enviar una tarea y guardarla
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
              " la provinicia Cod: " +
              response.data[0].idprov;
          } else {
            me.text = "No se " + textSave + " la provincia";
          }
          me.dialog = false;
          me.snackbar = true;
          me.initialize(me.editedItem.iddep);
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