<template>
    <div class="dashboard">
        <v-toolbar class="mt-5" flat>
            <v-toolbar-title>
                <span class="caption">Bienvenido a Cosemselam Erp></span><br>Dashboard
            </v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn icon>
            </v-btn>
        </v-toolbar>

        <v-divider></v-divider>

        <v-container class="mt-5">
            <!-- /* -------------------------------------------------------------------------- */ -->
            <!-- /* ---------------------------------- CARDS --------------------------------- */ -->
            <v-row>
                <!-- /* ---------------------------- count de soscios ---------------------------- */ -->
                <v-col cols="12" sm="4">
                    <v-hover v-slot="{ hover }" open-delay="200">
                        <v-card color="light-green lighten-1" :elevation="hover ? 16 : 2">
                            <v-row>
                                <v-col cols="12" sm="8">
                                    <v-list-item three-line>
                                        <v-list-item-content>
                                            <div class="mb-4">
                                                <v-btn fab color="light-green lighten-2" elevation="0">
                                                    <v-icon color="white">mdi-badge-account</v-icon>
                                                </v-btn>
                                            </div>
                                            <v-list-item-title class="headline mb-1 white--text">
                                                20
                                            </v-list-item-title>
                                            <v-list-item-subtitle class="white--text">Solicitud de Socios registrados
                                            </v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-col>
                                <v-col cols="12" sm="4">
                                    <v-avatar size="100" class="ml-n10 mt-6" tile>
                                        <v-img src="images/add_database.png"></v-img>
                                    </v-avatar>
                                </v-col>
                            </v-row>
                        </v-card>
                    </v-hover>
                </v-col>
                <!-- /* ----------------------------- Count de ventas ---------------------------- */ -->
                <v-col cols="12" sm="4">
                    <v-hover v-slot="{hover }" open-delay="200">
                        <v-card color="pink darken-1" :elevation="hover ? 16 : 2">
                            <v-row>
                                <v-col cols="12" sm="8">
                                    <v-list-item three-line>
                                        <v-list-item-content>
                                            <div class="mb-4">
                                                <v-btn fab color="pink lighten-2" elevation="0">
                                                    <v-icon color="white">mdi-cart-check</v-icon>
                                                </v-btn>
                                            </div>
                                            <v-list-item-title class="headline mb-1 white--text">
                                                S/. 450.00
                                            </v-list-item-title>
                                            <v-list-item-subtitle class="white--text">Ventas Market
                                            </v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-col>
                                <v-col cols="12" sm="4">
                                    <v-avatar size="100" class="ml-n10 mt-6" tile>
                                        <v-img src="images/shop.png"></v-img>
                                    </v-avatar>
                                </v-col>
                            </v-row>
                        </v-card>
                    </v-hover>
                </v-col>
                <!-- /* --------------------------------- Count 3 -------------------------------- */ -->
                <v-col cols="12" sm="4">
                    <v-hover v-slot="{ hover }" open-delay="200">
                        <v-card color="orange darken-1" :elevation="hover ? 16 :2">
                            <v-row>
                                <v-col cols="12" sm="8">
                                    <v-list-item three-line>
                                        <v-list-item-content>
                                            <div class="mb-4">
                                                <v-btn fab color="orange lighten-2" elevation="0">
                                                    <v-icon color="white">mdi-file-cabinet</v-icon>
                                                </v-btn>
                                            </div>
                                            <v-list-item-title class="headline mb-1 white--text">
                                                3 Documentos Generados <br>
                                            </v-list-item-title>
                                            <v-list-item-subtitle class="white--text">Reporte Contable
                                            </v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-col>
                                <v-col cols="12" sm="4">
                                    <v-avatar size="100" class="ml-n10 mt-6" tile>
                                        <v-img src="images/increase.png"></v-img>
                                    </v-avatar>
                                </v-col>
                            </v-row>
                        </v-card>
                    </v-hover>
                </v-col>
            </v-row>

            <v-row>
                <v-col cols="12" sm="6">
                    <v-card>
                        <v-app-bar flat color="rgba(0,0,0,0)">
                            <v-toolbar-title class="title black--text pl-0 ml-2">
                                Impression
                            </v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn color="green" class="white--text mr-2">BOTON</v-btn>
                        </v-app-bar>
                    </v-card>
                </v-col>
                <v-col cols="12" sm="6">
                    <template v-slot:header>
                            <v-toolbar class="mb-2" color="indigo darken-5" dark flat>
                                <v-toolbar-title>This is a header</v-toolbar-title>
                            </v-toolbar>
                        </template>
                    <v-card>
                        <v-app-bar flat color="rgba(0,0,0,0)">
                            <v-toolbar-title class="title black--text pl-0 ml-2">
                                Impression
                            </v-toolbar-title>
                            <v-spacer></v-spacer>
                            <v-btn color="green" class="white--text mr-2">BOTON</v-btn>
                        </v-app-bar>

                        <v-data-table :headers="headers" :items="desserts" :items-per-page="5" class="elevation-1">
                        </v-data-table>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <v-parallax dark src="images/cosemselam.jpeg">
                            </v-parallax>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



<script>
    export default {
        

        data() {
            return {
                headers: [{
                        text: 'Dessert (100g serving)',
                        align: 'start',
                        sortable: false,
                        value: 'name',
                    },
                    {
                        text: 'Calories',
                        value: 'calories'
                    },
                    {
                        text: 'Fat (g)',
                        value: 'fat'
                    },
                    {
                        text: 'Carbs (g)',
                        value: 'carbs'
                    },
                    {
                        text: 'Protein (g)',
                        value: 'protein'
                    },
                    {
                        text: 'Iron (%)',
                        value: 'iron'
                    },
                ],
                desserts: [{
                        name: 'Frozen Yogurt',
                        calories: 159,
                        fat: 6.0,
                        carbs: 24,
                        protein: 4.0,
                        iron: '1%',
                    },
                    {
                        name: 'Ice cream sandwich',
                        calories: 237,
                        fat: 9.0,
                        carbs: 37,
                        protein: 4.3,
                        iron: '1%',
                    },
                    {
                        name: 'Eclair',
                        calories: 262,
                        fat: 16.0,
                        carbs: 23,
                        protein: 6.0,
                        iron: '7%',
                    },
                    {
                        name: 'Cupcake',
                        calories: 305,
                        fat: 3.7,
                        carbs: 67,
                        protein: 4.3,
                        iron: '8%',
                    },
                    {
                        name: 'Gingerbread',
                        calories: 356,
                        fat: 16.0,
                        carbs: 49,
                        protein: 3.9,
                        iron: '16%',
                    },
                    {
                        name: 'Jelly bean',
                        calories: 375,
                        fat: 0.0,
                        carbs: 94,
                        protein: 0.0,
                        iron: '0%',
                    },
                    {
                        name: 'Lollipop',
                        calories: 392,
                        fat: 0.2,
                        carbs: 98,
                        protein: 0,
                        iron: '2%',
                    },
                    {
                        name: 'Honeycomb',
                        calories: 408,
                        fat: 3.2,
                        carbs: 87,
                        protein: 6.5,
                        iron: '45%',
                    },
                    {
                        name: 'Donut',
                        calories: 452,
                        fat: 25.0,
                        carbs: 51,
                        protein: 4.9,
                        iron: '22%',
                    },
                    {
                        name: 'KitKat',
                        calories: 518,
                        fat: 26.0,
                        carbs: 65,
                        protein: 7,
                        iron: '6%',
                    },
                ],
            }
        },
    };

</script>
// <style lang="sass" scoped>
    //     .v-card.on-hover.theme--dark background-color: rgba(#FFF, 0.8)>.v-card__text color: #000

    // 

</style>
<style scoped>
    .border {
        border-right: 1px solid grey
    }

</style>
