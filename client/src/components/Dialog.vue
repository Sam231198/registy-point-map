<template>
  <v-card v-if="dialog" floating width="500" class="mx-auto">
    <v-card-title class="headline"> Cadastrar um novo local </v-card-title>

    <v-form v-model="valid">
      <v-container>
        <v-row>
          <v-col cols="12">
            <v-text-field
              v-model="name"
              :counter="10"
              label="Nome do local"
              required
              outlined
            ></v-text-field>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-select
              v-model="category"
              :items="categories"
              label="Categoria"
              outlined
            ></v-select>
          </v-col>
        </v-row>

        <v-row>
          <v-col cols="12">
            <v-text-field
              v-model="address"
              label="Endereço"
              required
              outlined
            ></v-text-field>
          </v-col>
        </v-row>
      </v-container>
    </v-form>

    <v-divider></v-divider>

    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn color="red" text @click="$emit('Close')"> CancelaR </v-btn>
      <v-btn color="green" text @click="$emit('Close')"> Cadastrar </v-btn>
    </v-card-actions>
  </v-card>
</template>
<script>
export default {
  props: ["dialog"],
  data: function () {
    return {
      name: "",
      category: "",
      address: "",
      categories: [
        "Alimentação",
        "Tecnologia",
        "Saúde",
        "Serviços",
        "Distribuição",
        "Outros",
      ],
    };
  },
};
</script>
<style scoped>
.v-card {
  position: fixed;
  left: 30%;
  top: 15%;
  z-index: 10000;
}
</style>