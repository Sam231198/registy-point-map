<template>
  <v-app>
    <v-main>
      <div id="mapDiv">
        <Dialog :dialog="dialog" v-on:Close="onDialog" />
        <LMap :zoom="zoom" :center="center" @click="addMarker">
          <LTileLayer :url="url" />
          <l-marker
            v-for="(item, index) in markers"
            :key="index"
            :lat-lng="item"
          >
            <l-icon
              iconUrl="https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png"
              shadowUrl="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png"
            />
          </l-marker>

          <ToolBar />
        </LMap>
      </div>
    </v-main>
  </v-app>
</template>

<script>
import Dialog from "./components/Dialog";
import L from "leaflet";
import { LMap, LTileLayer, LMarker, LIcon } from "vue2-leaflet";
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
  },

  data: () => ({
    dialog: false,
    url: "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
    zoom: 16,
    center: [13.1367826, 77.5711133],
    markers: [
      [13.1333682, 77.5651881],
      [13.1340669, 77.56707],
      [13.1348904, 77.5643231],
      [13.1367826, 77.5711133],
    ],
  }),
  methods: {
    removeMarker(index) {
      this.markers.splice(index, 1);
    },
    addMarker(event) {
      this.markers.push(event.latlng);
      this.onDialog()
    },
    onDialog(){
      this.dialog = !this.dialog;
    }
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