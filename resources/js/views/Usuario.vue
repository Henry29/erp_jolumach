<template>
  <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table">
    <v-data-table
      dense
      :headers="headers" 
      :items=" desserts"   
      sort-by="id"
      class="elevation-1"
    >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>lista Usuarios</v-toolbar-title>
          <v-divider class="mx-4" inset vertical></v-divider>
           <v-btn color="primary" @click="initialize()"> Cargar </v-btn>
          <v-spacer></v-spacer>  
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on">
                Nuevo Usuario
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
                        v-model="editedItem.name"
                        label="Nombre"
                      ></v-text-field>
                      <v-text-field
                        v-model="editedItem.email"
                        label="Correo"
                      ></v-text-field>
                       <v-text-field
                       v-model="editedItem.password"
                        label="Contraseña"
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
                <v-btn color="blue darken-1" text @click="save" >
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
    </v-data-table>
    
  </v-skeleton-loader>
</template>
 <script>
export default {
  data() {
    return {
      dialog: false,
      dialogDelete: false,
      loading: true,
      firstLoad: true,
      snackbar: false,
      text: "",
      headers: [     
        { text: "Codigo", value: "id" },
        { text: "nom bres", value: "name" },
        { text: "correo", value: "email" } ,
        { text: "Contraseña", value: "password" },
        { text: "Acciones", value: "actions", sortable: false } 
      ],
      desserts: [],
      editedIndex: -1,
     editedItem: {
        id: 0,
        name: "",
        email: "",
        password: "",
       
      },
      defaultItem: {
        id: 0,
        name: "",
        email: "",
        password: "",
      },

    };
  },
   computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Nuevo Usuario" : "Editar";
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
     initialize()
    {
      let me = this;
      let url = "/getUsuario";
      axios
        .get(url)
        .then(function (response) {
          me.desserts = response.data;
          me.loading = false;
          //  console.log( me.desserts)
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
      let id = me.editedItem.id;
      let nombre=me.editedItem.name;
      axios
        .delete("/usuario/borrar/" + id)
        .then(function (response) {
          console.log(response);
          if (response.data === 1) {
            me.text = "Se eliminó el usuario Cod: " + nombre;
          } else {
            me.text = "No se eliminó el usuario";
          }
          me.dialogDelete = false;
          me.snackbar = true;
          me.initialize();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
save() {
      let me = this;
      let url = "/usuario/guardar"; //Ruta que hemos creado para enviar una tarea y guardarla
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
              " usuario : " +
              response.data[0].id;
          } else {
            me.text = "No se " + textSave + " usuario";
          }
          me.dialog = false;
          me.snackbar = true;
          me.initialize();
        })
        .catch(function (error) {
          console.log(error);
        });
    },
 closeDelete() {
      this.dialogDelete = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },


    clear() {
      let me = this;
      me.snackbar = false;
    },
  },
};
</script>