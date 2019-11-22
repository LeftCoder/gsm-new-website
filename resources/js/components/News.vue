<template>
  <div class="articles-wrapper">
    <div v-if="articles.length > 0" class="articles">
      <div class="single-article" v-for="(article, index) in articles" :key="index">
        <span class="latest">{{ created_at(article.created_at) }}</span>
        <h3>{{ article.title }}</h3>
        <div v-html="article.body"></div>
      </div>
      <load-more container=".articles" @ready="getMoreResults">
        <img v-show="is_loading" src="/images/loading.svg" />
      </load-more>
    </div>
    <div v-else class="articles-empty">Nie ma postów do wyświetlenia.</div>
  </div>
</template>

<script>
import moment from "moment";
import LoadMore from "./LoadMore";

export default {
  components: { LoadMore },
  data() {
    return {
      next_page: 2,
      last_page: null,
      is_loading: false,
      articles: []
    };
  },

  mounted() {
    this.getResults();
  },

  methods: {
    created_at(date) {
      return moment(date).format("DD.MM.YYYY");
    },

    getResults() {
      this.is_loading = true;
      axios.get("/api/posts/all").then(response => {
        this.last_page = response.data.last_page;
        this.articles = response.data.data.map(article => article);
        this.is_loading = false;
      });
    },

    getMoreResults() {
      if (this.next_page < this.last_page) {
        this.is_loading = true;
        axios.get(`/api/posts/all?page=${this.next_page}`).then(response => {
          response.data.data.map(article => this.articles.push(article));
          this.next_page++;
          this.is_loading = false;
        });
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.articles-wrapper {
  width: 100%;
  .articles-empty {
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
}
</style>