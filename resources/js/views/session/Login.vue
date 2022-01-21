<template>
  <v-app id="inspire">
    <v-container fill-height fluid>
      <v-row align="center" justify="center">
        <v-col>
          <v-layout wrap>
            <v-flex sm12 md4 offset-md4>
              <v-card elevation="4" light tag="section">
                <v-card-title class="indigo darken-2">
                  <v-layout align-center justify-space-between>
                    <v-flex>
                      <h3 class="white--text text-center">Jolumach ERP</h3>
                    </v-flex>
                  </v-layout>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                  <validation-observer ref="observer">
                    <v-form @submit.prevent="login">
                      <validation-provider
                        v-slot="{ errors }"
                        name="email"
                        rules="required|email"
                      >
                        <v-text-field
                          outline
                          label="Correo"
                          v-model="inputLogin.email"
                          :error-messages="errors"
                          required
                        ></v-text-field>
                      </validation-provider>
                      <validation-provider
                        v-slot="{ errors }"
                        name="password"
                        :rules="{
                          required: true  
                        }"
                      >
                        <v-text-field
                          outline
                          label="Password"
                          type="password"
                          v-model="inputLogin.password"
                          :error-messages="errors"
                          required
                        ></v-text-field>
                      </validation-provider>
                      <v-row>
                        <v-col class="text-right">
                          <v-btn
                            color="info"
                            padding="20"
                            class="indigo darken-2 mt-6"
                            type="submit"
                          >
                            <v-icon dark center class="pa-2">
                              mdi-lock-open-variant</v-icon
                            >
                          </v-btn>
                        </v-col>
                      </v-row>
                    </v-form>
                  </validation-observer>
                </v-card-text>
                <v-divider></v-divider>
              </v-card>
            </v-flex>
          </v-layout>
        </v-col>
      </v-row>
    </v-container>
  </v-app>
</template>
<script>
import { required, digits, email, max, regex } from "vee-validate/dist/rules";
import {
  extend,
  ValidationObserver,
  ValidationProvider,
  setInteractionMode,
} from "vee-validate";

setInteractionMode("eager");

extend("digits", {
  ...digits,
  message: "{_field_} debe ser {length} digits. ({_value_})",
});

extend("required", {
  ...required,
  message: "{_field_} no puede estar vacío.",
});

extend("max", {
  ...max,
  message: "{_field_} no debe ser mayor de {length} characters",
});

extend("regex", {
  ...regex,
  message: "{_field_} {_value_} no coincide {regex}",
});

extend("email", {
  ...email,
  message: "Email no válido.",
});

export default {
  components: {
    ValidationProvider,
    ValidationObserver,
  },
  props: {
    source: String,
  },
  data() {
    return {
      stateLogin: false,
      inputLogin: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    async login() {
      let validate = await this.$refs.observer.validate();
      if (validate) {
        let me = this;
        let url = "/api/login";
        axios
          .post(url, {
            email: this.inputLogin.email,
            password: this.inputLogin.password,
          })
          .then(function (response) {
            console.log(response);
            localStorage.Authorization = response.data.token;
            me.$router.push({ path: "/dashboard" });
          })
          .catch(function (error) {
            console.log(error);
          });
      }
    },
  },
};
</script>
<style>
.v-btn,
.v-card {
  border-radius: 4px;
}

.v-card__title {
  text-transform: uppercase;
}
</style>
