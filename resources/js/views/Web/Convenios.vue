<template>
    <div class="section-convenios">
        <v-toolbar class="mb-2" color="green lighten-2" dark flat elevation="1">
            <v-toolbar-title class="text-capitalize">Gestión Convenios Comerciales</v-toolbar-title>
        </v-toolbar>
        <br>
        <!-- /* ---------------------------- Datable ---------------------------- */ -->
        <v-data-table :headers="headers" :items="desserts" type="table" sort-by="idco" class="elevation-1">
            <template v-slot:top>
                <v-toolbar flat >
                    <h4>Listado de Convenios</h4>
                    <!-- <v-divider class="mx-4" inset vertical></v-divider> -->
                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="700px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn color="green" dark class="mb-2" v-bind="attrs" v-on="on">
                                <v-icon dark>mdi-pen-plus</v-icon>
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
                                        <v-col cols="6" sm="6" md="6">
                                            <v-text-field v-model="editedItem.descripcion" label="Descripcion" outlined
                                                dense required hint="Nombre">
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="6" sm="6" md="6">
                                            <v-text-field v-model="editedItem.direccion" label="Direccion" outlined
                                                dense></v-text-field>
                                        </v-col>
                                        <v-col cols="6" sm="6" md="6">
                                            <v-text-field v-model="editedItem.telefono" label="Telefono" outlined dense>
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="6" sm="6" md="6">
                                            <!-- <v-text-field v-model="editedItem.idco" label="id" v-show="false" outlined dense>
                                        </v-text-field> -->
                                            <v-autocomplete outlined dense clearable hide-details hide-selected
                                                item-text="descripcion" item-value="idarea" label="Area">
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col cols="6" sm="6" md="4">
                                            <v-switch v-model="editedItem.estado" label="Estado" color="green darken-2"
                                                hide-details></v-switch>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>

                            <v-card-actions>
                                <v-spacer></v-spacer>
                                <v-btn color="red darken-1" text @click="close">
                                    Cancelar
                                </v-btn>
                                <v-btn color="green darken-1" text @click="save"> Guardar </v-btn>
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
                                    <v-btn class="ma-2" dark color="indigo darken-2" @click="closeDelete">
                                        No
                                    </v-btn>
                                    <v-btn class="ma-2" dark color="indigo darken-2" @click="deleteItemConfirm">
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
        </v-data-table>
    </div>

</template>
<script>
    export default {
        data() {
            return {
                dialog: false,
                dialogDelete: false,

                idarea: 0,
                items: [],
                model: null,
                snackbar: false,
                text: "",
                headers: [{
                        text: "N°",
                        value: "idco",
                    },
                    {
                        text: "Nombre",
                        value: "descripcion"
                    },
                    {
                        text: "Ubicacion",
                        value: "direccion"
                    },
                    {
                        text: "telefono",
                        value: "telefono"
                    },
                    {
                        text: "Area",
                        value: "idarea",
                        // align: " d-none"
                    },
                    {
                        text: "Estado",
                        value: "estado"
                    },
                    {
                        text: "Acciones",
                        value: "actions",
                        sortable: false
                    },
                ],
                desserts: [],
                editedIndex: -1,
                editedItem: {
                    idco: 0,
                    descripcion: "",
                    direccion: "",
                    telefono: "",
                    idarea: 0,
                    estado: true,
                },
                defaultItem: {
                    idco: 0,
                    descripcion: "",
                    direccion: "",
                    telefono: "",
                    idarea: 0,
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
        },

        created() {
            this.initialize();
        },
        methods: {
            initialize() {
                let me = this;
                let url = "/getConvenio";
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

            //  selectAnexoAuxiliar(){
            //     let me=this;
            //     var url= '/categoria/selectCategoria';
            //     axios.get(url).then(function (response) {
            //         //console.log(response);
            //         var respuesta= response.data;
            //         me.arrayAnexoAuxiliar = respuesta.anexoauxiliar;
            //     })
            //     .catch(function (error) {
            //         console.log(error);
            //     });
            // },
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
                let id = me.editedItem.idco;
                axios
                    .delete("/borrar" + id)
                    .then(function (response) {
                        console.log(response);
                        if (response.data === 1) {
                            me.text = "Se eliminó el tipo de Vía Cod: " + id;
                        } else {
                            me.text = "No se eliminó el tipo de Vía";
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
                let url = "/guardar"; //Ruta que hemos creado para enviar una tarea y guardarla
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
                                " el tipo de Vía Cod: " +
                                response.data[0].idco;
                        } else {
                            me.text = "No se " + textSave + " el tipo de Vía";
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
