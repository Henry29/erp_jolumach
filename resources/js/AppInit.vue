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
        <v-list-group
          v-for="item in items"
          :key="item.title"
          v-model="item.active"
          :prepend-icon="item.action"
          no-action
        >
          <template v-slot:activator>
            <v-list-item-content>
              <v-list-item-title v-text="item.title"></v-list-item-title>
            </v-list-item-content>
          </template>

          <v-list-item
            v-for="child in item.items"
            :key="child.title"
            link
            :to="child.path"
          >
            <v-list-item-content>
              <v-list-item-title v-text="child.title"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-group>
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
    routeCurrent: null,
    items: [
      {
        action: "mdi-view-dashboard",
        active: false,
        title: "Panel",
        items: [{ title: "Estado del App", path: "/" }],
      },
      {
        action: "mdi-buffer",
        active: false,
        items: [
          { title: "Tipo de Documento", path: "/tipoDocumentoIdentidad" },
          { title: "Ubigeo", path: "/ubigeo" },
          { title: "Tipo de Vivienda", path: "/tipoVivienda" },
          { title: "Grado de Estudios", path: "/gradoEstudios" },
          { title: "Profesión", path: "/profesion" },
          { title: "Ugel", path: "/ugel" },
          { title: "Tipo de Planilla", path: "/tipoPlanilla" },
          { title: "Tipo de Convenio", path: "/tipoConvenio" },
          {
            title: "Tipo de Institución Educativa",
            path: "/tipoInstitucionEducativa",
          },
          { title: "Institución Educativa", path: "/institucionEducativa" },
          { title: "Tipo de Zona", path: "/tipoZona" },
          { title: "Tipo de Vía", path: "/tipoVia" },
          { title: "Tipo de Cargo", path: "/tipoCargo" },
          { title: "Tipo de Contrato Laboral", path: "/tipoContratoLaboral" },
          { title: "Regimen Laboral", path: "/regimenLaboral" },
          { title: "Tipo de Regimen Pensionario", path: "/tipoRegimenPensionario" },
          { title: "Tipo de Discapacidad", path: "/tipoDiscapacidad" },
        ],
        title: "Tabla Maestra",
      },
    ],
  }),
  created() {
    this.$vuetify.theme.light = true;
    this.routeCurrent = this.$route.path;
    this.items.forEach((e1) => {
      e1.items.forEach((e2) => {
        if (e2.path == this.routeCurrent) {
          e1.active = true;
        }
      });
    });
  },
};
</script>