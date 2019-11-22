<template>
  <div class="trix-editor">
    <input id="trix" type="hidden" :name="name" :value="value" />

    <trix-editor
      class="trix-content"
      ref="trix"
      input="trix"
      @trix-change="change"
      @trix-file-accept.prevent
    ></trix-editor>
  </div>
</template>

<script>
import TrixEditor from "trix";

export default {
  props: ["name", "value"],

  methods: {
    change({ target }) {
      this.$emit("input", target.value);
    }
  },

  mounted() {
    const elem = document.querySelector(
      '[data-trix-button-group="file-tools"]'
    );

    elem.parentNode.removeChild(elem);
  },

  watch: {
    value(val) {
      if (val === "") {
        this.$refs.trix.value = "";
      }
    }
  }
};
</script>

<style lang="scss" scoped>
@import "~trix/dist/trix.css";
</style>