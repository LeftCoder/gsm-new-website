<template>
  <div v-if="myImages.length>0" class="gallery-preview">
    <single-image
      @deleted="onDelete"
      v-for="(image, index) in myImages"
      :key="index"
      :imagePath="myPath + '/' + image"
      :image="image"
      :folder="myFolder"
    ></single-image>
  </div>
  <div v-else class="gallery-empty">Nie ma zdjęć do wyświetlenia.</div>
</template>
<script>
import singleImage from "./SingleImage.vue";

export default {
  components: { singleImage },
  props: ["path", "images", "folder"],
  data() {
    return {
      myPath: this.path,
      myImages: this.images,
      myFolder: this.folder
    };
  },

  created() {
    Event.$on("uploaded", () => this.fetch());
  },

  methods: {
    onDelete() {
      this.fetch();
    },

    fetch() {
      axios
        .get(`/gallery/${this.myFolder}`)
        .then(response => (this.myImages = response.data.images))
        .catch(errors => console.log(errors));
    }
  }
};
</script>

<style lang="scss" scoped>
.gallery-empty {
  font-family: "Roboto", sans-serif;
  border: 3px solid #f2f2f2;
  border-radius: 20px;
  padding: 20px;
  width: 100%;
  text-transform: uppercase;
  letter-spacing: 2px;
  text-align: center;
  font-weight: 500;
  color: #707070;
}
</style>