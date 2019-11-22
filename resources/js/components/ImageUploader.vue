<template>
  <div
    class="uploader"
    @dragenter="onDragEnter"
    @dragleave="onDragLeave"
    @dragover.prevent
    @drop="onDrop"
    :class="{ dragging: isDragging }"
  >
    <div v-show="!images.length">
      <i class="fas fa-cloud-upload-alt cloud"></i>
      <p>Przeciągnij tutaj</p>
      <div>LUB</div>
      <div class="file-input">
        <label for="file">Wybierz pliki</label>
        <input type="file" id="file" @change="onInputChange" multiple />
      </div>
    </div>

    <div v-show="images.length>0" class="images-preview">
      <div class="img-wrapper" v-for="(image, index) in images" :key="index">
        <div @click="onDelete(index)">
          <i class="fas fa-trash-alt trash"></i>
        </div>
        <img :src="image" :alt="`Załadowane zdjęcie numer ${index}`" />
        <div class="details">
          <span class="name" v-text="files[index].name"></span>
          <span class="size" v-text="getFileSize(files[index].size)"></span>
        </div>
      </div>
    </div>

    <div v-show="images.length>0" class="upload-control">
      <label for="file">Wybierz pliki</label>
      <button @click="upload">Wgraj</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ["folder"],
  data() {
    return {
      isDragging: false,
      dragCount: 0,
      files: [],
      images: []
    };
  },

  methods: {
    onDragEnter(e) {
      e.preventDefault();
      this.dragCount++;
      this.isDragging = true;

      return false;
    },

    onDragLeave(e) {
      e.preventDefault();
      this.dragCount--;

      if (this.dragCount <= 0) this.isDragging = false;
    },

    onInputChange(e) {
      const files = e.target.files;
      Array.from(files).forEach(file => this.addImage(file));
    },

    onDrop(e) {
      e.preventDefault();
      e.stopPropagation();
      this.isDragging = false;
      const files = e.dataTransfer.files;
      Array.from(files).forEach(file => this.addImage(file));
    },

    onDelete(index) {
      this.images.splice(index, 1);
      this.files.splice(index, 1);
      this.isDragging = false;
      this.dragCount = 0;
    },

    addImage(file) {
      if (!file.type.match("image.*")) {
        flash("Błędne rozszerzenie pliku/ów.", "danger");
        return;
      }

      this.files.push(file);

      const img = new Image(),
        reader = new FileReader();

      reader.onload = e => this.images.push(e.target.result);

      reader.readAsDataURL(file);
    },

    getFileSize(size) {
      const fsExt = ["Bytes", "KB", "MB", "GB"];
      let i = 0;

      while (size > 900) {
        size /= 1024;
        i++;
      }
      return `${Math.round(size * 100) / 100} ${fsExt[i]}`;
    },

    upload() {
      const formData = new FormData();

      this.files.forEach(file => {
        formData.append("images[]", file, file.name);
      });

      formData.append("folder", this.folder);

      axios.post("/img", formData).then(response => {
        flash("Wszystkie zdjecia dodane prawidłowo.");
        this.broadcast();

        this.images = [];
        this.files = [];
      });
    },

    broadcast() {
      Event.$emit("uploaded");
    }
  }
};
</script>