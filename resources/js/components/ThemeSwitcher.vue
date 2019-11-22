<template>
  <div class="theme-switcher" title="ciemny motyw">
    <toggle-button :value="switchToggle" @change="onToggle" color="#31afd5" :sync="true"></toggle-button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      switchToggle: false,
      selectedTheme: "theme-light"
    };
  },

  created() {
    this.selectedTheme = localStorage.getItem("theme") || "theme-light";
    this.switchToggle = this.selectedTheme == "theme-light" ? false : true;
  },

  watch: {
    selectedTheme() {
      document.body.className = document.body.className.replace(
        /theme-\w+/,
        this.selectedTheme
      );
      //Event.$emit('theme-changed', this.selectedTheme);
      localStorage.setItem("theme", this.selectedTheme);
    }
  },

  methods: {
    onToggle() {
      this.switchToggle = !this.switchToggle;
      this.selectedTheme = this.switchToggle ? "theme-dark" : "theme-light";

      Event.$emit("theme-changed", this.selectedTheme);
    }
  }
};
</script>