<template>
  <v-card floating max-width="300">
    <v-list dense>
      <v-list-item v-for="(item, i) in items" :key="i">
        <v-list-item-icon>
          <v-icon v-text="item.icon"></v-icon>
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
      { text: "Real-Time", icon: "mdi-clock" },
      { text: "Audience", icon: "mdi-account" },
      { text: "Conversions", icon: "mdi-flag" },
    ],
  }),
};
</script>
<style scoped>
.v-card {
  margin-top: 15px;
  margin-left: 5%;
  z-index: 1000;
}
</style>