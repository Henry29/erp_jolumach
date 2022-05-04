<template>
<div class="sec">
    <v-toolbar class="mb-2" :color="apertura ? 'green lighten-2': '	red lighten-2'" dark flat elevation="1">
        <v-toolbar-title v-if="apertura">Apertura de caja</v-toolbar-title>
        <v-toolbar-title v-if="!apertura">Cerrado de caja</v-toolbar-title>
    </v-toolbar>
    <v-card>
        <v-container>
            <v-card>
                <v-card-title>Sobre la caja actual</v-card-title>
                <v-card-text>
                    <v-text-field></v-text-field>
                    <v-radio-group v-model="picked" mandatory row>
                        <v-radio label="Principal" value="0"></v-radio>
                        <v-radio label="Secundaria" value="1"></v-radio>
                        <v-radio label="Caja Chica" value="2"></v-radio>
                    </v-radio-group>
                </v-card-text>
            </v-card>
            <br>
            <v-card>
                <v-card-text>
                <v-row>
                    <v-col lg = "6" md="6" sm="12">
                    <v-text-field
                        label="Usuario Asignado"
                        hide-details="auto"
                        v-model="user.name"
                        readonly
                    ></v-text-field>
                    </v-col>
                    <v-col lg = "6" md="6" sm="12">
                        <v-text-field
                            label="Area Asignada"
                            hide-details="auto"
                        ></v-text-field>
                    </v-col>
                </v-row>
                <v-row>
                    <v-col lg = "6" md="6" sm="12">
                        <v-text-field
                            label="Nombre"
                            hide-details="auto"
                        ></v-text-field>
                    </v-col>
                    <v-col lg = "6" md="6" sm="12">
                        <v-text-field
                            v-model="fecha"
                            label="Fecha"
                            prepend-icon="mdi-calendar"
                            readonly
                            ></v-text-field>
                    </v-col>
                </v-row>
                </v-card-text>
            </v-card>
            <br>
            <v-card>
                <v-card-text>
                    <v-row>
                        <v-col lg = "6" md="12" sm="12">
                            <v-row>
                                <v-col lg = "3" md="3" sm="12">Moneda:</v-col>
                                <v-col lg = "9" md="9" sm="12">
                                    <v-select
                                        filled
                                        :items="moneda"
                                        item-text= "moneda"
                                        item-value= "idmoneda"
                                    ></v-select>
                                    
                                </v-col>
                            </v-row>
                        </v-col>
                        <v-col lg = "6" md="12" sm="12">
                            <v-row>
                                <v-col lg = "3" md="3" sm="12">Turno:</v-col>
                                <v-col lg = "9" md="9" sm="12">
                                    <v-select
                                        :items="turno"
                                        filled
                                    ></v-select>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col lg = "6" md="12" sm="12">
                            <v-row>
                                <v-col lg = "3" md="3" sm="12">Saldo Anterior:</v-col>
                                <v-col lg = "9" md="9" sm="12">
                                    <v-text-field
                                        label="PlaceHolder"
                                        solo
                                    ></v-text-field>
                                </v-col>
                                <v-col lg = "3" md="3" sm="12">Monto:</v-col>
                                <v-col lg = "9" md="9" sm="12">
                                    <v-text-field
                                        label="PlaceHolder"
                                        solo
                                    ></v-text-field>    
                                </v-col>
                            </v-row>
                        </v-col>

                        <v-col lg = "6" md="12" sm="12">
                            <v-row>
                                <v-col lg = "3" md="3" sm="12">Observación:</v-col>
                                <v-col lg = "9" md="9" sm="12">
                                    <v-textarea
                                        label="PlaceHolder"
                                        solo
                                    ></v-textarea>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col></v-col>
                        <v-col>
                            <v-btn @click="downloadItem">Reporte  Prueba</v-btn>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-container>
    </v-card>
</div>
</template>
<script>
import Axios from 'axios';
export default {
    data() {
        return {
            message: "",
            picked: 0,
            user: null,
            turno: ['Mañana','Tarde'],
            fecha: (new Date()).toISOString().substr(0, 10),
            moneda : [],
            apertura: true,
        };
    },
    created() {
        if (localStorage.getItem("User")) {
            this.user = JSON.parse(localStorage.getItem("User"));
        }
        this.initMoneda();
    },
    methods: {
        initMoneda(){
            Axios
                .get('/getTipoMoneda')
                .then((response) => {
                    this.moneda = response.data;
                    console.log(this.moneda);
                }
                ).catch((error)=>{
                    console.log(error);
                });
        },
        downloadItem () {
            Axios.get('/Reporte/CajaPDF', { responseType: 'blob' })
                .then(response => {
                    const blob = new Blob([response.data], { type: 'application/pdf' });
                    const link = document.createElement('a');
                    link.href = URL.createObjectURL(blob);
                    link.download = '/Reporte/CajaPDF';
                    link.click();
                    URL.revokeObjectURL(link.href);
                }).catch(console.error)
        }
    }
    
}
</script>