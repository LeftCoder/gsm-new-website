import "./bootstrap";

Vue.component("my-google-map", require("./components/MyGoogleMap.vue").default);
Vue.component("parts", require("./components/Parts.vue").default);
Vue.component("news", require("./components/News.vue").default);
Vue.component("cms-table", require("./components/CmsTable.vue").default);
Vue.component("flash", require("./components/Flash.vue").default);
Vue.component("wysiwyg", require("./components/Wysiwyg.vue").default);
Vue.component("count", require("./components/Count.vue").default);
Vue.component("gallery", require("./components/Gallery.vue").default);
Vue.component(
  "gallery-preview",
  require("./components/GalleryPreview.vue").default
);
Vue.component(
  "contact-button",
  require("./components/ContactButton.vue").default
);
Vue.component(
  "theme-switcher",
  require("./components/ThemeSwitcher.vue").default
);
Vue.component(
  "image-uploader",
  require("./components/ImageUploader.vue").default
);

Vue.config.ignoredElements = ["trix-editor"];

import CookieLaw from "vue-cookie-law";
import AOS from "aos";
import "aos/dist/aos.css";

const app = new Vue({
  el: "#app",
  components: { CookieLaw },
  created() {
    AOS.init({
      disable: "mobile",
      offset: 0,
      duration: 500,
      once: true
    });
  }
});
