<template>
  <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table">
    <v-data-table
      dense
      :headers="headers"
      :items="desserts"
      sort-by="id"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>Usuario</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Nuevo
              </v-btn>
            </template>
            <v-form ref="userForm" lazy-validation>
              <v-card>
                <v-card-title>
                  <span class="text-h5">{{ formTitle }}</span>
                </v-card-title>
                <v-card-text>
                  <v-container>
                    <v-row>
                      <v-col cols="12" sm="6" md="12">
                        <v-text-field
                          v-model="editedItem.name"
                          label="Nombre"
                          dense
                          :rules="rules"
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="12">
                        <v-text-field
                          v-model="editedItem.email"
                          label="Email"
                          :rules="emailRules"
                          dense
                          required
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="12">
                        <v-text-field
                          v-model="editedItem.pass_nohash"
                          label="Password"
                          :append-icon="
                            showPassword ? 'mdi-eye' : 'mdi-eye-off'
                          "
                          :type="showPassword ? 'text' : 'password'"
                          counter
                          @click:append="showPassword = !showPassword"
                          :rules="passwordRules"
                          required
                          dense
                        ></v-text-field>
                      </v-col>
                      <v-col cols="12" sm="6" md="12">
                        <v-autocomplete
                          dense
                          :disabled="!isEditingRol"
                          v-model="editedItem.id_rol"
                          :items="itemsRol"
                          :loading="isLoadingRol"
                          clearable
                          hide-selected
                          item-text="nombre_rol"
                          item-value="identificador_rol"
                          label="Buscar por Rol..."
                          :rules="rules"
                          required
                        >
                          <template v-slot:no-data>
                            <v-list-item>
                              <v-list-item-title>
                                Buscar por
                                <strong>Rol</strong>
                              </v-list-item-title>
                            </v-list-item>
                          </template>
                          <template v-slot:item="{ item }">
                            <v-list-item-content>
                              <v-list-item-title
                                v-text="item.nombre_rol"
                              ></v-list-item-title>
                              <v-list-item-subtitle
                                v-text="item.identificador_rol"
                              ></v-list-item-subtitle>
                            </v-list-item-content>
                          </template>
                        </v-autocomplete>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-switch
                          v-model="editedItem.estado"
                          label="Estado"
                          color="indigo darken-2"
                          dense
                          :rules="rules"
                          required
                        ></v-switch>
                      </v-col>
                      <v-col cols="12" sm="6" md="4">
                        <v-text-field
                          v-model="editedItem.id"
                          label="Id"
                          v-show="false"
                          dense
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
            </v-form>
          </v-dialog>
          <v-dialog v-model="dialogDelete" max-width="500px">
            <v-card>
              <v-card-title class="text-h6">
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
            <br />
            <ul>
              <li v-for="error in errors" :key="error.message">
                {{ error.message }}
              </li>
            </ul>
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
      showPassword: false,
      rules: [(v) => !!v || "Este campo is requerido"],
      emailRules: [
        (v) => !!v || "E-mail is requerido",
        (v) => /.+@.+\..+/.test(v) || "E-mail debe ser válido",
      ],
      passwordRules: [
        (v) => !!v || "Este campo is requerido",
        (v) =>
          (v && v.length >= 6) ||
          "La contraseña debe tener más de 6 caracteres",
      ],
      isEditingRol: false,
      isLoadingRol: false,
      itemsRol: [],
      modelRol: null,
      dialog: false,
      dialogDelete: false,
      loading: true,
      firstLoad: true,
      snackbar: false,
      text: "",
      errors: [],
      headers: [
        {
          text: "Id",
          value: "id",
          align: " d-none",
        },
        { text: "Nombre", value: "name" },
        { text: "Email", value: "email" },
        { text: "Password", value: "password", align: " d-none"},
        { text: "id_rol", value: "id_rol", align: " d-none"},
        { text: "Estado", value: "nombre_estado" },
        { text: "Rol", value: "nombre_rol" },
        { text: "Fecha Creación", value: "created_at" },
        { text: "Fecha Actualización", value: "updated_at" },
        { text: "Acciones", value: "actions", sortable: false },
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        id: 0,
        name: "",
        email: "",
        password: "",
        estado: true,
        id_rol: 0,
      },
      defaultItem: {
        id: 0,
        name: "",
        email: "",
        password: "",
        estado: true,
        id_rol: 0,
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
    }
  },
  created() {
    this.initialize();
    this.initializeRol();
  },
  methods: {
    initializeRol() {
      if (this.itemsRol.length > 0) return;

      this.isLoadingRol = true;

      let url = "/getRol";
      axios
        .get(url)
        .then((res) => {
          console.log(res);
          this.itemsRol = res.data;
          this.isEditingRol = true;
        })
        .catch((err) => {
          console.log(err);
        })
        .finally(() => (this.isLoadingRol = false));
    },
    initialize() {
      let me = this;
      let url = "/getUsers";
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
      console.log(item,this.editedIndex);
      this.editedItem = Object.assign({}, item);
      console.log(this.editedItem);
      this.dialog = true;
    },
    deleteItem(item) {
        this.editedIndex = this.desserts.indexOf(item);
        this.editedItem = Object.assign({}, item);
        this.dialogDelete = true;
    },
    deleteItemConfirm() {
        let me = this;
        let id = me.editedItem.id;
        axios
          .delete("/usuario/borrar/" + id)
          .then(function (response) {
            console.log(response);
            if (response.data === 1) {
              me.text = "Se eliminó el tipo de cargo Cod: " + id;
            } else {
              me.text = "No se eliminó el tipo de cargo";
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
    async save() {
      let me = this;
      let url = "/api/register";
      let validate = await me.$refs.userForm.validate();
      if (!validate) {
        return;
      }
      let textSave = me.formSave;
      axios
        .post(url, {
          //estas variables son las que enviaremos para que crear la tarea
          editedItem: me.editedItem,
        })
        .then(function (response) {
          if (response.data[0].estado_registro === true) {
            me.text =
              "Se " + textSave + " el usuario con Id: " + response.data[0].id;
          } else {
            let message = "";
            for (const key in response.data[0].errors) {
              response.data[0].errors[key].forEach((e) => {
                me.errors.push({ message: e });
              });
            }
            me.text = "No se " + textSave + " el usuario por:";
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