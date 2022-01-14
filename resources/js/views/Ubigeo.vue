<template v-slot:top>
  <v-card>
    <v-tabs v-model="tab" background-color="indigo darken-2" centered dark>
      <v-tabs-slider color="dark"></v-tabs-slider>
      <v-tab href="#tab-1"> Departamento </v-tab>
      <v-tab href="#tab-2"> Provincia </v-tab>
      <v-tab href="#tab-3"> Distrito </v-tab>
      <v-tabs-items v-model="tab">
        <v-tab-item value="tab-1">
          <v-card flat>
            <app-departamento></app-departamento>
          </v-card>
        </v-tab-item>
        <v-tab-item value="tab-2">
          <v-card flat>
            <app-provincia></app-provincia>  
          </v-card>
        </v-tab-item>
        <v-tab-item value="tab-3">
          <v-card flat>
            <app-distrito></app-distrito>  
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-tabs>
  </v-card>
</template>
<script>
export default {
  data() {
    return {
      tab: null,
      items: ["Departamento", "Provincia", "Distrito"],
    };
  },
};
</script>