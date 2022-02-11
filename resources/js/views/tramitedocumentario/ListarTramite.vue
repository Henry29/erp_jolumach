 <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>LISTA - Tramite Documentario</v-toolbar-title>
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
                      
                    label="caja 1"
                      ></v-text-field>
                       <v-text-field                       
                        label="caja 2"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="6">

                      <v-text-field                       
                        label="caja 3"

                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="12">
                      <v-text-field
                       
                        label="Motivo"
                      ></v-text-field>
                    </v-col>                   
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                      
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
            <template >
              <v-btn color="pink" text v-bind="attrs" @click="snackbar = false">
                Cerrar
              </v-btn>
            </template>
          </v-snackbar>
        </v-toolbar>
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
        {
          text: "N°",
          sortable: true,
          value: "nro",
        },
        {
          text: "Id",
          value: "idmaestro",
          align: " d-none",
        },
        { text: "Codigo", value: "codigo" },
        { text: "tipo documento", value: "abrev" },
        { text: "tipo tramite", value: "descripcion" },
        { text: "requisitos", value: "estadodescripcion" },       
      ],
      desserts: [],
      editedIndex: -1,
      editedItem: {
        idmaestro: 0,
        codigo: "",
        abrev: "",
        descripcion: "",
        estado: true,
      },
      defaultItem: {
        idmaestro: 0,
        codigo: "",
        abrev: "",
        descripcion: "",
        estado: true,
      },
    };
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "Nuevo" : "Editar";
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
  methods: {//
    initialize() {
      let me = this;
    let url = "/getTipoVivienda";
      axios
       // .get(url)
      
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
    
  },
};
      </script>
      
     