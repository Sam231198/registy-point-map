<template>
  <v-card v-if="dialog" floating width="500" class="mx-auto">
    <v-card-title class="headline grey lighten-2">
      Privacy Policy
    </v-card-title>

    <v-form v-model="valid">
      <v-container>
        <v-row>
          <v-col cols="12" md="4">
            <v-text-field
              v-model="firstname"
              :rules="nameRules"
              :counter="10"
              label="First name"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="12" md="4">
            <v-text-field
              v-model="lastname"
              :rules="nameRules"
              :counter="10"
              label="Last name"
              required
            ></v-text-field>
          </v-col>

          <v-col cols="12" md="4">
            <v-text-field
              v-model="address"
              :rules="emailRules"
              label="E-mail"
              required
            ></v-text-field>
          </v-col>
        </v-row>
      </v-container>
    </v-form>

    <v-divider></v-divider>

    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn color="primary" text @click="$emit('Close')"> I accept </v-btn>
    </v-card-actions>
  </v-card>
</template>
<script>
export default {
  props: ['dialog']
};
</script>
<style scoped>
.v-card {
  position: fixed;
  left: 30%;
  top: 25%;
  z-index: 1000;
}
</style>