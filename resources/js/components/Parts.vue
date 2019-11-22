<template>
  <div class="device-results">
    <filter-bar placeholder="Podaj model telefonu"></filter-bar>
    <div v-if="results.length > 0 && !is_loading" class="results-wrapper">
      <div class="single-result" v-for="(part, index) in results" :key="index">
        <div class="result-description">
          <p>
            <span class="title">producent:</span>
            <span class="value" v-text="part.producent.nazwa_producenta"></span>
          </p>
          <p>
            <span class="title">model:</span>
            <span class="value">
              {{ part.model.nazwa_modelu }}
              {{
              part.model.kod_modelu.length > 0
              ? "(" + part.model.kod_modelu + ")"
              : ""
              }}
            </span>
          </p>
          <p>
            <span class="title">usługa:</span>
            <span class="value" v-text="part.service.nazwa_czesci"></span>
          </p>
          <p>
            <span class="title">cena:</span>
            <span class="value" v-text="part.cena_uslugi + ' zł'"></span>
          </p>
        </div>
        <div class="result-icon">
          <img :src="'/icons/' + part.service.icon_path" :alt="part.service.nazwa_czesci" />
        </div>
      </div>
      <div class="service-contact">
        <a href="tel:533-399-818">
          <button title="zadzwoń do serwisu" type="button" class="btn btn-secondary btn-to-top">
            <i class="fas fa-phone"></i>
          </button>
        </a>
      </div>
    </div>
    <img v-else-if="is_loading" src="/images/loading.svg" />
    <div v-else class="results-empty">tutaj powią się wyniki wyszukiwania</div>
  </div>
</template>

<script>
import FilterBar from "./FilterBar";

export default {
  components: { FilterBar },
  data() {
    return {
      results: [],
      is_loading: false
    };
  },

  created() {
    Event.$on("filter-set", filter => {
      if (filter.length > 1) {
        this.is_loading = true;
        axios
          .get(`/api/parts/all?filter=${filter}`)
          .then(({ data }) => {
            this.is_loading = false;
            this.results = data;
          })
          .catch(errors => console.log(errors));
      } else {
        this.results = [];
      }
    });

    Event.$on("filter-reset", filter => {
      this.results = [];
    });
  }
};
</script>
