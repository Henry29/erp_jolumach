<template>
  <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table">
    <v-data-table
      dense
      :headers="headers"
      :items="desserts"
      sort-by="idmaestro"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>Ugel</v-toolbar-title>
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
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                        dense
                        v-model="editedItem.descripcion"
                        label="Descripción"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">
                      <v-text-field
                        dense
                        v-model="editedItem.direccion"
                        label="Dirección"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-autocomplete
                        dense
                        :disabled="!isEditingProvincia"
                        v-model="model"
                        :items="items"
                        :loading="isLoading"
                        clearable
                        hide-details
                        hide-selected
                        item-text="nombre"
                        item-value="iddep"
                        label="Buscar por Departamento..."
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
                            <v-list-item-title
                              v-text="item.nombre"
                            ></v-list-item-title>
                            <v-list-item-subtitle
                              v-text="item.codigo"
                            ></v-list-item-subtitle>
                          </v-list-item-content>
                        </template>
                      </v-autocomplete>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-autocomplete
                        dense
                        :disabled="!isEditingDistrito"
                        v-model="modelDistrito"
                        :items="itemsDistrito"
                        :loading="isLoadingDistrito"
                        clearable
                        hide-details
                        hide-selected
                        item-text="nombre"
                        item-value="idprov"
                        label="Buscar por Provincia..."
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
                            <v-list-item-title
                              v-text="item.nombre"
                            ></v-list-item-title>
                            <v-list-item-subtitle
                              v-text="item.codigo"
                            ></v-list-item-subtitle>
                          </v-list-item-content>
                        </template>
                      </v-autocomplete>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-autocomplete
                        dense
                        :disabled="!isEditingUbigeo"
                        v-model="modelUbigeo"
                        :items="itemsUbigeo"
                        :loading="isLoadingUbigeo"
                        clearable
                        hide-details
                        hide-selected
                        item-text="distrito"
                        item-value="ubigeo"
                        label="Buscar por Distrito..."
                      >
                        <template v-slot:no-data>
                          <v-list-item>
                            <v-list-item-title>
                              Buscar distritos para
                              <strong>Cod. Ubigeo</strong>
                            </v-list-item-title>
                          </v-list-item>
                        </template>
                        <template v-slot:item="{ item }">
                          <v-list-item-content>
                            <v-list-item-title
                              v-text="item.distrito"
                            ></v-list-item-title>
                            <v-list-item-subtitle
                              v-text="item.ubigeo"
                            ></v-list-item-subtitle>
                          </v-list-item-content>
                        </template>
                      </v-autocomplete>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        dense
                        v-model="editedItem.codubi"
                        label="Cod. Ubi."
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        dense
                        v-model="editedItem.codempresa"
                        label="Cod. Emp."
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        dense
                        v-model="editedItem.coddes"
                        label="Cod. Des."
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-switch
                        dense
                        v-model="editedItem.estado"
                        label="Estado"
                        color="indigo darken-2"
                        hide-details
                      ></v-switch>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        v-model="editedItem.idugel"
                        label="Id"
                        v-show="false"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="red darken-1" text @click="close">
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
                    color="red darken-2"
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
        <v-icon small color="red darken-1" @click="deleteItem(item)"> mdi-delete </v-icon>
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
      isLoading: false,
      isEditingProvincia: false,
      isEditingDistrito: false,
      isEditingUbigeo: false,
      items: [],
      btn_new: false,
      isLoadingDistrito: false,
      itemsDistrito: [],
      modelDistrito: null,
      isLoadingUbigeo: false,
      itemsUbigeo: [],
      modelUbigeo: null,
      model: null,
      tab: null,
      tabDistrito: null,
      tabUbigeo: null,
      dialog: false,
      dialogDelete: false,
      loading: true,
      firstLoad: true,
      snackbar: false,
      text: "",
      headers: [
        {
          text: "N°",
          sortable: true,
          value: "nro",
        },
        {
          text: "Id",
          value: "idugel",
          align: " d-none",
        },
        { text: "Descripción", value: "descripcion" },
        { text: "Dirección", value: "direccion" },
        { text: "Cod. Ubi.", value: "codubi" },
        { text: "Cod. Empresa", value: "codempresa" },
        { text: "Cod. Des.", value: "coddes" },
        { text: "Estado", value: "estadodescripcion" },
        { text: "Acciones", value: "actions", sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        idugel: 0,
        descripcion: "",
        direccion: "",
        codubi: "",
        codempresa: "",
        coddes: "",
        estado: true,
      },
      defaultItem: {
        idugel: 0,
        descripcion: "",
        direccion: "",
        codubi: "",
        codempresa: "",
        coddes: "",
        estado: true,
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
        this.itemsDistrito = [];
        this.initializeDistrito(val);
      } else {
        this.tab = null;
        this.itemsDistrito = [];
      }
    },
    modelDistrito(val) {
      if (val != null) {
        this.tabDistrito = 0;
        this.itemsUbigeo = [];
        this.initializeUbigeo(val);
      } else {
        this.tabDistrito = null;
        this.itemsUbigeo = [];
      }
    },
    modelUbigeo(val) {
      if (val != null) {
        this.tabUbigeo = 0;
        this.editedItem.codubi = val;
      } else {
        this.tabUbigeo = null;
      }
    },
  },
  created() {
    this.initialize();
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
    initializeDistrito(id) {
      if (this.itemsDistrito.length > 0) return;

      this.isLoadingDistrito = true;

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
    initializeUbigeo(id) {
      if (this.itemsUbigeo.length > 0) return;

      this.isLoadingUbigeo = true;

      let url = "/getDistrito/" + id;
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsUbigeo = res.data;
          this.isEditingUbigeo = true;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.isLoadingUbigeo = false));
    },
    initialize() {
      let me = this;
      let url = "/getUgel";
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
      let id = me.editedItem.idugel;
      axios
        .delete("/ugel/borrar/" + id)
        .then(function (response) {
          console.log(response);
          if (response.data === 1) {
            me.text = "Se eliminó la Ugel Cod: " + id;
          } else {
            me.text = "No se eliminó la Ugel";
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
      let url = "/ugel/guardar"; //Ruta que hemos creado para enviar una tarea y guardarla
      let textSave = me.formSave;
      axios
        .post(url, {
          //estas variables son las que enviaremos para que crear la tarea
          editedItem: me.editedItem,
        })
        .then(function (response) {
          if (response.data[0].estado_registro === true) {
            me.text =
              "Se " + textSave + " la Ugel Cod: " + response.data[0].idugel;
          } else {
            me.text = "No se " + textSave + " la Ugel";
          }
          me.dialog = false;
          me.snackbar = true;
          me.initialize();
          me.clear();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    clear() {
      let me = this;
      me.snackbar = false;
      me.items = [];
      me.itemsDistrito = [];
      me.itemsUbigeo = [];
    },
  },
};
</script>