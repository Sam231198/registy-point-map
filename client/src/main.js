import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import VueAxios from './plugins/axions'
import 'leaflet/dist/leaflet.css';

Vue.config.productionTip = false

new Vue({
  vuetify,
  VueAxios,
  render: h => h(App)
}).$mount('#app')
