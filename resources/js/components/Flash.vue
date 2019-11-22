<template>
  <div class="alert-flash alert" :class="classes" v-show="show" v-text="body" role="alert"></div>
</template>

<script>
export default {
  props: ["message"],
  data() {
    return {
      body: this.message,
      level: "success",
      show: false
    };
  },

  computed: {
    classes() {
      return `alert-${this.level}`;
    }
  },

  created() {
    if (this.message) {
      this.flash();
    }

    window.Event.$on("flash", data => {
      this.flash(data);
    });
  },

  methods: {
    flash(data) {
      if (data) {
        this.body = data.message;
        this.level = data.level;
      }

      this.show = true;

      this.hide();
    },

    hide() {
      setTimeout(() => {
        this.show = false;
      }, 3000);
    }
  }
};
</script>

<style lang="scss" scoped>
.alert-flash {
  position: fixed;
  bottom: 25px;
  right: 25px;
}
</style>