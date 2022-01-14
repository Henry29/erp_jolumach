<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <v-parallax
              dark
              src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
            >
              <v-row align="center" justify="center">
                <v-col class="text-center" cols="12">
                  <h1 class="text-h4 font-weight-thin mb-4">Bienvenidos a Jolumach ERP</h1>
                  <h4 class="subheading">Aplicación en desarrollo!</h4>
                </v-col>
              </v-row>
            </v-parallax>
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
      header: "Panel",
    };
  },
};
</script>