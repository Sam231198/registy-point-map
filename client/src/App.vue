<template>
  <v-app>
    <v-main>
      <div id="mapDiv">
        <Dialog
          :props="dialogDados"
          v-on:Close="onDialog"
          v-on:cadastro="loadingMarkers"
        />
        <LMap :zoom="zoom" :center="center" @click="selectPosition" :options="{zoomControl: false}">
          <LTileLayer :url="url" />

          <LMarker
            v-for="(item, index) in locations"
            :key="index"
            :lat-lng="[parseFloat(item.lat), parseFloat(item.lng)]"
            @mouseover="
              openPopUp([parseFloat(item.lat), parseFloat(item.lng)], 'marker')
            "
          >
            <LIcon
              :iconUrl="`https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-${
                colorCategory[item.category]
              }.png`"
              shadowUrl="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png"
            />
            <l-tooltip>
              <b>Nome: {{ item.name }}</b>
              <br />
              <span>Categoria: {{ item.category }}</span>
              <br />
              <span>Endereço: {{ item.address }}</span>
            </l-tooltip>
          </LMarker>

          <ToolBar />
        </LMap>
      </div>
    </v-main>
  </v-app>
</template>

<script>
import Dialog from "./components/Dialog";
import L from "leaflet";
import {
  LMap,
  LTileLayer,
  LMarker,
  LIcon,
  LTooltip
} from "vue2-leaflet";
import ToolBar from "./components/ToolBar";

// corrige erro de link do icone default
delete L.Icon.Default.prototype._getIconUrl;

L.Icon.Default.mergeOptions({
  iconRetinaUrl: require("leaflet/dist/images/marker-icon-2x.png"),
  iconUrl: require("leaflet/dist/images/marker-icon.png"),
  shadowUrl: require("leaflet/dist/images/marker-shadow.png"),
});
// ---------------------------------------

export default {
  name: "App",

  components: {
    Dialog,
    LMap,
    LTileLayer,
    LMarker,
    LIcon,
    ToolBar,
    LTooltip,
  },

  data: () => ({
    dialogDados: { dialog: false, lat: null, lng: null },
    url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    zoom: 15,
    center: [-15.826691, -47.921822],
    locations: null,
    colorCategory: {
      Alimentação: "yellow",
      Tecnologia: "blue",
      Saúde: "red",
      Serviços: "orange",
      Distribuição: "green",
      Outros: "grey",
    },
  }),
  created: function () {
    this.loadingMarkers();
  },
  methods: {
    selectPosition(event) {
      // verifica se o model esta false, se tiver irar enviar o dados de latitude para o modal
      if (!this.dialogDados.dialog)
        this.dialogDados = {
          dialog: false,
          lat: event.latlng.lat,
          lng: event.latlng.lng,
        };

      // ira abrir o modal 
      this.onDialog();
    },
    onDialog() {
      this.dialogDados.dialog = !this.dialogDados.dialog;
    },
    loadingMarkers() {
      // carregar o os markers no mapa 
      this.axios.get("http://localhost:8000/locations").then((response) => {
        this.locations = response.data;
      });

      // se o modal tiver ativo, apos salvar um novo marker o model irá se fechar 
      if (this.dialogDados.dialog) this.onDialog();
    },
  },
};
</script>
<style scoped>
#mapDiv {
  width: 100%;
  height: 100%;
  z-index: 0;
  position: relative;
}
</style>