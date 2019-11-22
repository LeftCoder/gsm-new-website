<template>
  <div class="preview-wrapper">
    <div v-if="images.length > 0" class="gallery-preview">
      <vue-gallery :id="city || 'main'" :images="images" :index="index" @close="index = null"></vue-gallery>
      <div
        v-lazy-container="{ selector: 'img' }"
        v-for="(image, imageIndex) in images"
        :key="imageIndex"
        class="image-wrapper"
      >
        <img class="image" :data-src="image.href" :alt="image.title" @click="index = imageIndex" />
        <div class="overlay">{{ image.title }}</div>
      </div>
    </div>
    <div v-else class="gallery-empty">Ta galeria jest pusta</div>
  </div>
</template>

<script>
import VueGallery from "vue-gallery";

export default {
  components: { VueGallery },
  props: {
    city: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      images: [],
      index: null
    };
  },

  mounted() {
    this.fetchImages();
  },

  computed: {
    ApiLink() {
      return this.city.length > 0
        ? `/api/gallery/?city=${this.city}`
        : "/api/gallery/main";
    }
  },

  methods: {
    fetchImages() {
      axios
        .get(this.ApiLink)
        .then(({ data }) => {
          this.images = data.images.map((image, idx) => {
            return { title: data.overlays[idx], href: image };
          });
        })
        .catch(errors => console.log(errors));
    }
  }
};
</script>
