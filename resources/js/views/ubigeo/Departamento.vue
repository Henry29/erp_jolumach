<template>
  <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table">
    <v-data-table
      dense
      :headers="headers"
      :items="desserts"
      sort-by="iddep"
      class="elevation-1"
      :loading="loadingTab"
      loading-text="Cargando, Por favor esperar!"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>Departamento</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
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
                        label="Id"
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
        <v-btn color="primary" @click="initialize"> Cargar </v-btn>
      </template>
    </v-data-table>
  </v-skeleton-loader>
</template>
<script>
export default {
  data() {
    return {
      loadingTab: false,
      dialog: false,
      dialogDelete: false,
      loading: true,
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
          text: "Id",
          value: "iddep",
          align: " d-none",
        },
        { text: "Codigo", value: "codigo" },
        { text: "Ubigeo", value: "ubigeo" },
        { text: "Nombre", value: "nombre" },
        { text: "Acciones", value: "actions", sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        iddep: 0,
        codigo: "",
        ubigeo: "",
        nombre: "",
      },
      defaultItem: {
        iddep: 0,
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
  },
  created() {
    this.initialize();
  },
  methods: {
    initialize() {
      let me = this;
      let url = "/getUbigeo";
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
      let id = me.editedItem.iddep;
      axios
        .delete("/ubigeo/borrar/" + id)
        .then(function (response) {
          console.log(response);
          if (response.data === 1) {
            me.text = "Se eliminó el departamento Cod: " + id;
          } else {
            me.text = "No se eliminó el departamento";
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
    save() {
      let me = this;
      let url = "/ubigeo/guardar"; //Ruta que hemos creado para enviar una tarea y guardarla
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
              " el departamento Cod: " +
              response.data[0].iddep;
          } else {
            me.text = "No se " + textSave + " el departamento";
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
};
</script>