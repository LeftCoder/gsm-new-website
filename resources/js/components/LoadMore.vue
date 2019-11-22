<template>
  <div class="load-more">
    <slot></slot>
  </div>
</template>

<script>
import { throttle } from "lodash";

export default {
  props: ["container"],
  mounted() {
    window.addEventListener("scroll", this.loadMore);
  },
  methods: {
    loadMore: throttle(function(e) {
      if (this.shouldLoadMore()) {
        this.$emit("ready");
      }
    }, 300),

    shouldLoadMore() {
      const container = document.querySelector(this.container);

      return (
        window.pageYOffset >=
        (container.offsetTop + container.offsetHeight) * 0.6
      );
    }
  }
};
</script>

<style lang="scss" scoped>
.load-more {
  display: flex;
  justify-content: center;
}
</style>