import Vue from "vue";
import axios from "axios";
import bootstrap from "bootstrap";
import ToggleButton from "vue-js-toggle-button";
import VModal from "vue-js-modal";
import BackToTop from "vue-backtotop";
import VueScrollTo from "vue-scrollto";
import Carousel3d from "vue-carousel-3d";
import * as VueGoogleMaps from "vue2-google-maps";
import VueLazyload from "vue-lazyload";

window.Vue = Vue;

Vue.use(VueGoogleMaps, {
  load: {
    key: "AIzaSyC6OHJWJ2alhTu2gsx4wDC-hYV9U5UhSbU",
    libraries: "places",
    region: "PL",
    language: "pl"
  },
  installComponents: true
});

Vue.use(VueLazyload);
Vue.use(Carousel3d);
Vue.use(VueScrollTo);
Vue.use(BackToTop);
Vue.use(ToggleButton);
Vue.use(VModal);

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
  console.error(
    "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
  );
}

/** Event dispacher */
window.Event = new Vue();

window.flash = function(message, level = "success") {
  window.Event.$emit("flash", { message, level });
};
