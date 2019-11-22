<template>
  <div class="single-image">
    <div @click="onDelete" class="delete-image" title="usuń zdjęcie">
      <i class="fas fa-trash-alt"></i>
    </div>
    <img class="image" :src="imagePath" />
  </div>
</template>

<script>
export default {
  props: ["imagePath", "image", "folder"],
  data() {
    return {};
  },
  methods: {
    onDelete() {
      axios
        .delete(`/img/${this.folder}/${this.image}`)
        .then(response => {
          this.$emit("deleted");
          flash("Zdjęcie usunięte poprawnie.");
        })
        .catch(errors => console.log(errors));
    }
  }
};
</script>