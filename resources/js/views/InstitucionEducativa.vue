<template>
    <v-skeleton-loader v-if="firstLoad" :loading="loading" type="table">
        <v-toolbar class="mb-2" color="indigo accent-3" dark flat>
            <v-toolbar-title>Gestión Institución Educativa</v-toolbar-title>
        </v-toolbar>
        <v-data-table dense :headers="headers" :items="desserts" sort-by="idmaestro" class="elevation-1"
            :loading="loadingTab" loading-text="Cargando, Por favor esperar!">
            <template v-slot:top>
                <v-toolbar flat>
                    <!-- <v-toolbar-title>Institucion Educativa</v-toolbar-title> -->
                    <!-- <v-divider class="mx-4" inset vertical></v-divider> -->
                    <v-row>
                        <v-col cols="12" sm="12" md="5">
                            <v-autocomplete :disabled="!isEditingUgel" v-model="modelUgel" :items="itemsUgel"
                                :loading="isLoadingUgel" dense clearable hide-details hide-selected
                                item-text="descripcion" item-value="idugel" label="Buscar por Ugel..." solo>
                                <template v-slot:no-data>
                                    <v-list-item>
                                        <v-list-item-title>
                                            Buscar Institucion Educativa por
                                            <strong>Ugel</strong>
                                        </v-list-item-title>
                                    </v-list-item>
                                </template>
                                <template v-slot:item="{ item }">
                                    <v-list-item-content>
                                        <v-list-item-title v-text="item.descripcion"></v-list-item-title>
                                        <v-list-item-subtitle v-text="item.codubi"></v-list-item-subtitle>
                                    </v-list-item-content>
                                </template>
                            </v-autocomplete>
                        </v-col>
                    </v-row>
                    <v-spacer></v-spacer>
                    <v-dialog v-model="dialog" max-width="800px">
                        <template v-slot:activator="{ on, attrs }">
                            <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on" v-show="btn_new">
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
                                        <v-col cols="12" sm="12" md="6">
                                            <v-autocomplete dense :disabled="!isEditingTipoInsEdu"
                                                v-model="modelTipoInsEdu" :items="itemsTipoInsEdu"
                                                :loading="isLoadingTipoInsEdu" clearable hide-details hide-selected
                                                item-text="descripcion" item-value="idmaestro"
                                                label="Buscar por Tipo de Institucion Educativa...">
                                                <template v-slot:no-data>
                                                    <v-list-item>
                                                        <v-list-item-title>
                                                            Buscar por
                                                            <strong>Tipo de Institucion Educativa</strong>
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                </template>
                                                <template v-slot:item="{ item }">
                                                    <v-list-item-content>
                                                        <v-list-item-title v-text="item.descripcion">
                                                        </v-list-item-title>
                                                        <v-list-item-subtitle v-text="item.codigo">
                                                        </v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </template>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col cols="12" sm="8" md="3">
                                            <v-text-field dense v-model="editedItem.descripcion" label="Descripción">
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="4" md="3">
                                            <v-text-field dense v-model="editedItem.codigo" label="Nro"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-autocomplete dense :disabled="!isEditingZona" v-model="modelZona"
                                                :items="itemsZona" :loading="isLoadingZona" clearable hide-details
                                                hide-selected item-text="descripcion" item-value="idmaestro"
                                                label="Buscar por Zona...">
                                                <template v-slot:no-data>
                                                    <v-list-item>
                                                        <v-list-item-title>
                                                            Buscar por
                                                            <strong>Zona</strong>
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                </template>
                                                <template v-slot:item="{ item }">
                                                    <v-list-item-content>
                                                        <v-list-item-title v-text="item.descripcion">
                                                        </v-list-item-title>
                                                        <v-list-item-subtitle v-text="item.codigo">
                                                        </v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </template>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field dense v-model="editedItem.nomzona" label="Zona">
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field dense v-model="editedItem.refdir" label="Referencia">
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field dense v-model="editedItem.telefono" label="Telefono">
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-autocomplete dense :disabled="!isEditingDeno" v-model="modelDeno"
                                                :items="itemsDeno" :loading="isLoadingDeno" clearable hide-details
                                                hide-selected item-text="denominacion" item-value="iddenominacion"
                                                label="Buscar por Vía...">
                                                <template v-slot:no-data>
                                                    <v-list-item>
                                                        <v-list-item-title>
                                                            Buscar por
                                                            <strong>Vía</strong>
                                                        </v-list-item-title>
                                                    </v-list-item>
                                                </template>
                                                <template v-slot:item="{ item }">
                                                    <v-list-item-content>
                                                        <v-list-item-title v-text="item.denominacion">
                                                        </v-list-item-title>
                                                        <v-list-item-subtitle v-text="item.codigo">
                                                        </v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </template>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="6">
                                            <v-text-field dense v-model="editedItem.direccion" label="Dirección">
                                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-autocomplete dense :disabled="!isEditingProvincia" v-model="model"
                                                :items="items" :loading="isLoading" clearable hide-details hide-selected
                                                item-text="nombre" item-value="iddep"
                                                label="Buscar por Departamento...">
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
                                                        <v-list-item-subtitle v-text="item.codigo">
                                                        </v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </template>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-autocomplete dense :disabled="!isEditingDistrito" v-model="modelDistrito"
                                                :items="itemsDistrito" :loading="isLoadingDistrito" clearable
                                                hide-details hide-selected item-text="nombre" item-value="idprov"
                                                label="Buscar por Provincia...">
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
                                                        <v-list-item-subtitle v-text="item.codigo">
                                                        </v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </template>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-autocomplete dense :disabled="!isEditingUbigeo" v-model="modelUbigeo"
                                                :items="itemsUbigeo" :loading="isLoadingUbigeo" clearable hide-details
                                                hide-selected item-text="distrito" item-value="ubigeo"
                                                label="Buscar por Distrito...">
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
                                                        <v-list-item-title v-text="item.distrito"></v-list-item-title>
                                                        <v-list-item-subtitle v-text="item.ubigeo">
                                                        </v-list-item-subtitle>
                                                    </v-list-item-content>
                                                </template>
                                            </v-autocomplete>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field dense v-model="editedItem.codubi" label="Cod. Ubi."
                                                v-show="showCodUbi"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="editedItem.idinstedu" label="Id" v-show="false">
                                            </v-text-field>
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
                isEditingTipoInsEdu: false,
                isEditingProvincia: false,
                isEditingDistrito: false,
                isEditingUbigeo: false,
                isEditingUgel: false,
                isEditingZona: false,
                isEditingDeno: false,
                items: [],
                btn_new: false,
                isLoadingDistrito: false,
                itemsDistrito: [],
                modelDistrito: null,
                isLoadingUgel: false,
                itemsUgel: [],
                modelUgel: null,
                isLoadingUbigeo: false,
                itemsUbigeo: [],
                modelUbigeo: null,
                isLoadingTipoInsEdu: false,
                itemsTipoInsEdu: [],
                modelTipoInsEdu: null,
                isLoadingZona: false,
                itemsZona: [],
                modelZona: null,
                isLoadingDeno: false,
                itemsDeno: [],
                modelDeno: null,
                model: null,
                tab: null,
                tabDistrito: null,
                tabUbigeo: null,
                tabUgel: null,
                tabTipoInsEdu: null,
                tabZona: null,
                tabDeno: null,
                dialog: false,
                dialogDelete: false,
                loading: true,
                firstLoad: true,
                snackbar: false,
                showCodUbi: false,
                text: "",
                headers: [{
                        text: "IdInsEdu",
                        value: "idinstedu",
                        align: " d-none",
                    },
                    {
                        text: "Id",
                        value: "idugel",
                        align: " d-none",
                    },
                    {
                        text: "IdTipInsEdu",
                        value: "idtipinstedu",
                        align: " d-none",
                    },
                    {
                        text: "Descripción",
                        value: "descripcion"
                    },
                    {
                        text: "Dirección",
                        value: "direccion"
                    },
                    {
                        text: "Codigo",
                        value: "codigo",
                        align: " d-none"
                    },
                    {
                        text: "Cod. Ubi",
                        value: "codubi",
                        align: " d-none"
                    },
                    {
                        text: "idZona",
                        value: "idzona",
                        align: " d-none"
                    },
                    {
                        text: "Zona",
                        value: "nomzona",
                        align: " d-none"
                    },
                    {
                        text: "Referencia",
                        value: "refdir"
                    },
                    {
                        text: "Vía",
                        value: "iddeno",
                        align: " d-none"
                    },
                    {
                        text: "Estado",
                        value: "estado",
                        align: " d-none"
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
                    idinstedu: 0,
                    idugel: 0,
                    idtipinstedu: 0,
                    descripcion: "",
                    codigo: "",
                    idzona: 0,
                    nomzona: "",
                    iddeno: 0,
                    direccion: "",
                    refdir: "",
                    telefono: "",
                    estado: true,
                    codubi: "",
                },
                defaultItem: {
                    idinstedu: 0,
                    idugel: 0,
                    idtipinstedu: 0,
                    descripcion: "",
                    codigo: "",
                    idzona: 0,
                    nomzona: "",
                    iddeno: 0,
                    direccion: "",
                    refdir: "",
                    telefono: "",
                    estado: true,
                    codubi: "",
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
            modelUgel(val) {
                if (val != null) {
                    this.tabUgel = 0;
                    this.editedItem.idugel = val;
                    this.btn_new = true;
                    this.initialize(val);
                } else {
                    this.tabUgel = null;
                }
            },
            modelTipoInsEdu(val) {
                if (val != null) {
                    this.tabTipoInsEdu = 0;
                    this.editedItem.idtipinstedu = val;
                } else {
                    this.tabTipoInsEdu = null;
                }
            },
            modelZona(val) {
                if (val != null) {
                    this.tabZona = 0;
                    this.editedItem.idzona = val;
                } else {
                    this.tabZona = null;
                }
            },
            modelDeno(val) {
                if (val != null) {
                    this.tabDeno = 0;
                    this.editedItem.iddeno = val;
                } else {
                    this.tabDeno = null;
                }
            },
        },
        created() {
            this.initializeUgel();
            this.initializeTipInsEdu();
            this.initializeZona();
            this.initializeVia();
            this.initializeProvincia();
        },
        methods: {
            initializeVia() {
                if (this.itemsDeno.length > 0) return;
                this.isLoadingDeno = true;
                let url = "/getTipoVia";
                axios
                    .get(url)
                    .then((res) => {
                        console.log(res);
                        this.itemsDeno = res.data;
                        this.isEditingDeno = true;
                    })
                    .catch((err) => {
                        console.log(err);
                    })
                    .finally(() => (this.isLoadingDeno = false));
            },
            initializeZona() {
                if (this.itemsZona.length > 0) return;
                this.isLoadingZona = true;
                let url = "/getTipoZona";
                axios
                    .get(url)
                    .then((res) => {
                        console.log(res);
                        this.itemsZona = res.data;
                        this.isEditingZona = true;
                    })
                    .catch((err) => {
                        console.log(err);
                    })
                    .finally(() => (this.isLoadingZona = false));
            },
            initializeTipInsEdu() {
                if (this.itemsTipoInsEdu.length > 0) return;
                this.isLoadingTipoInsEdu = true;
                let url = "/getTipoInstitucionEducativa";
                axios
                    .get(url)
                    .then((res) => {
                        console.log(res);
                        this.itemsTipoInsEdu = res.data;
                        this.isEditingTipoInsEdu = true;
                    })
                    .catch((err) => {
                        console.log(err);
                    })
                    .finally(() => (this.isLoadingTipoInsEdu = false));
            },
            initializeUgel() {
                if (this.itemsUgel.length > 0) return;
                this.isLoadingUgel = true;
                let url = "/getUgel";
                this.loading = false;
                axios
                    .get(url)
                    .then((res) => {
                        console.log(res);
                        this.itemsUgel = res.data;
                        this.isEditingUgel = true;
                    })
                    .catch((err) => {
                        console.log(err);
                    })
                    .finally(() => (this.isLoadingUgel = false));
            },
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
            initialize(id) {
                let me = this;
                let url = "/getInstitucionEducativa/" + id;
                me.loadingTab = true;
                axios
                    .get(url)
                    .then(function (response) {
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
                const itemTipInstEdu = this.getItemByIdInstEdu(item.idtipinstedu);
                const itemTipZona = this.getItemByIdZona(item.idzona);
                const itemTipDeno = this.getItemByIdDeno(item.iddeno);
                this.modelTipoInsEdu = itemTipInstEdu;
                this.modelZona = itemTipZona;
                this.modelDeno = itemTipDeno;
                this.showCodUbi = true;
                this.dialog = true;
            },
            getItemByIdInstEdu(id) {
                return this.itemsTipoInsEdu.find((item) => item.idmaestro === id);
            },
            getItemByIdZona(id) {
                return this.itemsZona.find((item) => item.idmaestro === id);
            },
            getItemByIdDeno(id) {
                return this.itemsDeno.find((item) => item.iddenominacion === id);
            },
            deleteItem(item) {
                this.editedIndex = this.desserts.indexOf(item);
                this.editedItem = Object.assign({}, item);
                this.dialogDelete = true;
            },
            deleteItemConfirm() {
                let me = this;
                let id = me.editedItem.idinstedu;
                let idUgel = me.editedItem.idugel;
                axios
                    .delete("/institucionEducativa/borrar/" + id)
                    .then(function (response) {
                        console.log(response);
                        if (response.data === 1) {
                            me.text = "Se eliminó la Ugel Cod: " + id;
                        } else {
                            me.text = "No se eliminó la Ugel";
                        }
                        me.dialogDelete = false;
                        me.snackbar = true;
                        me.initialize(idUgel);
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
                let url = "/institucionEducativa/guardar"; //Ruta que hemos creado para enviar una tarea y guardarla
                let textSave = me.formSave;
                let idUgel = me.editedItem.idugel;
                axios
                    .post(url, {
                        //estas variables son las que enviaremos para que crear la tarea
                        editedItem: me.editedItem,
                    })
                    .then(function (response) {
                        console.log(response);
                        if (response.data[0].estado_registro === true) {
                            me.text =
                                "Se " +
                                textSave +
                                " la Institución Educativa Cod: " +
                                response.data[0].idinstedu;
                        } else {
                            me.text = "No se " + textSave + " la Institución Educativa";
                        }
                        me.dialog = false;
                        me.snackbar = true;
                        me.initialize(idUgel);
                        me.clear();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            clear() {
                let me = this;
                //   me.snackbar = false;
                me.items = [];
                me.itemsDistrito = [];
                me.itemsUbigeo = [];
            },
        },
    };

</script>
