<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
      clipped
      dark
      class="indigo darken-4"
    >
      <v-list dense>
        <v-list-item link to="/">
          <v-list-item-action>
            <v-icon>mdi-view-dashboard</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Panel</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link to="/tipoDocumentoIdentidad">
          <v-list-item-action>
            <v-icon>mdi-buffer</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Tipo de Documento</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar app clipped-left dark class="indigo darken-4">
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Jolumach ERP</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container>
        <router-view></router-view>
      </v-container>
    </v-main>

    <v-footer app dark class="indigo darken-2">
      <v-col class="text-center">
        <span>© {{ new Date().getFullYear() }} - Jolumach ERP</span>
      </v-col>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  props: {
    source: String,
  },
  data: () => ({
    drawer: null,
  }),
  created() {
    this.$vuetify.theme.light = true;
  },
};
</script>