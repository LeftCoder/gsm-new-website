<template>
  <div class="filter-bar">
    <form class="form-inline">
      <div class="input-group">
        <input
          type="text"
          v-model="filterText"
          class="form-control"
          @keyup="doFilter(filterText)"
          :placeholder="placeholder"
        />
        <div v-show="filterText.length > 0" class="input-group-append">
          <button type="button" class="btn btn-default" @click="resetFilter">
            <i class="fas fa-backspace"></i>
          </button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import { debounce } from "lodash";

export default {
  props: ["placeholder"],
  data() {
    return {
      filterText: ""
    };
  },

  methods: {
    doFilter: debounce(function(text) {
      Event.$emit("filter-set", text);
    }, 500),

    resetFilter() {
      this.filterText = "";
      Event.$emit("filter-reset");
    }
  }
};
</script>
