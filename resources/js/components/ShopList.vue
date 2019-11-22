<template>
  <div class="shop-list">
    <div class="finder">
      <label>Lokalizoator sklepów</label>
      <div class="input-wrapper">
        <gmap-autocomplete
          class="form-control input-field"
          placeholder="Wybierz miasto"
          @place_changed="setPlace"
        ></gmap-autocomplete>
        <i v-show="reset" class="fas fa-backspace" @click="resetPlace"></i>
      </div>
    </div>
    <div
      class="card"
      :class="{ active: isActive===index }"
      v-for="(shop, index) in shops"
      :key="index"
      @click="cardClicked(index)"
    >
      <div class="card-body">
        <div v-if="!moreInfo || (moreInfo && isActive!==index)" class="standard-info">
          <h4>{{shop.shop_name}}</h4>
          <p>ul. {{shop.street}}</p>
          <p>{{shop.postal_code}} {{shop.city_name}}</p>
          <div @click="moreInfo=true" class="button">
            <i class="fas fa-chevron-right"></i>
          </div>
        </div>

        <div v-else-if="moreInfo && isActive===index" class="more-info">
          <p>
            <i class="fas fa-phone"></i>
            <a :href="'tel:' + shop.telephone">{{shop.telephone}}</a>
          </p>
          <p>
            e-mail:
            <a :href="'mailto:' + shop.email">{{shop.email}}</a>
          </p>
          <div @click="moreInfo=false" class="button">
            <i class="fas fa-times"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="empty-results" v-show="shops.length === 0">
      <p>brak wyników</p>
    </div>
  </div>
</template>

<script>
import FilterBar from "./FilterBar";

export default {
  props: ["shops"],
  components: { FilterBar },
  data() {
    return {
      reset: false,
      isActive: null,
      moreInfo: false
    };
  },

  created() {
    Event.$on("info-closed", () => {
      this.isActive = null;
      this.moreInfo = false;
    });
  },

  methods: {
    setPlace(place) {
      Event.$emit("set-place", place);
      this.reset = true;
      this.isActive = null;
      this.moreInfo = false;
    },

    resetPlace() {
      Event.$emit("reset-place");
      this.$refs.input.$el.value = "";
      this.reset = false;
    },

    cardClicked(shop_id) {
      this.isActive = shop_id;
      Event.$emit("card-clicked", shop_id);
    }
  }
};
</script>