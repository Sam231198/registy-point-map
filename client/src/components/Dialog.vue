<template>
  <v-card v-if="props.dialog" floating width="500" class="mx-auto">
    <v-card-title class="headline"> Cadastrar um novo local </v-card-title>

    <v-form v-model="valid">
      <v-container>
        <v-row>
          <v-col cols="12">
            <v-text-field
              v-model="name"
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
      <v-btn color="red" text @click="$emit('Close')"> Fechar </v-btn>
      <v-btn color="green" text @click="cadastro"> Cadastrar </v-btn>
    </v-card-actions>
  </v-card>
</template>
<script>
export default {
  props: ["props"],
  data: function () {
    return {
      name: null,
      category: null,
      address: null,
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
  methods: {
    cadastro: function () {
      this.axios
        .post("http://localhost:8000/locations", {
          name: this.name,
          address: this.address,
          category: this.category,
          lat: this.props.lat,
          lng: this.props.lng,
        })
        .then((response) => {
          if (response.status === 201) {

            // Zerando os dados apos serem salvos
            this.name = null;
            this.address = null;
            this.category = null;
            this.props.lat = null;
            this.props.lng = null;

            /**
             * informa ao componente pai que foi cadastro e o component pai ira invocar a função para tirar o modal
             */
            this.$emit("cadastro");
          }
        });
    },
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