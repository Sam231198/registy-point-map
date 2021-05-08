<template>
  <v-card floating max-width="200">
    <v-list dense>
      <v-list-item v-for="(item, i) in items" :key="i">
        <v-list-item-icon>
          <v-icon :color="item.color" > mdi-map-marker </v-icon>
        </v-list-item-icon>
        <v-list-item-content>
          <v-list-item-title v-text="item.text"></v-list-item-title>
        </v-list-item-content>
      </v-list-item>
    </v-list>
  </v-card>
</template>

<script>
export default {
  name: "ToolBar",
  data: () => ({
    items: [
      { text: "Alimentação", color: "yellow" },
      { text: "Tecnologia", color: "blue" },
      { text: "Saúde", color: "red" },
      { text: "Serviços", color: "orange" },
      { text: "Distribuição ", color: "green" },
      { text: "Outros ", color: "grey" },
    ],
  }),
};
</script>
<style scoped>
.v-card {
  margin-top: 15px;
  margin-left: 10px;
  z-index: 1000;
}
</style>