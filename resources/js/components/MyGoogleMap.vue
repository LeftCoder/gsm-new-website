<template>
  <div class="google-map">
    <shop-list :shops="markers"></shop-list>
    <gmap-map
      :options="isDark ? darkmode : standardmode"
      ref="mapRef"
      :center="center"
      :zoom="zoom"
      style="width: 100%; height: 700px"
    >
      <gmap-info-window
        :position="infoWindowPos"
        :opened="infoWindowOpen"
        :options="infoOptions"
        @closeclick="closeInfoWindow"
      >
        <div class="info-content" v-html="infoContent"></div>
      </gmap-info-window>
      <gmap-marker
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        :clickable="true"
        @click="toggleInfoWindow(m, index)"
      ></gmap-marker>
    </gmap-map>
  </div>
</template>

<script>
import ShopList from "./ShopList";
import { darkmode, standardmode } from "./mapStyle/themes";

export default {
  components: { ShopList },
  data() {
    return {
      center: { lat: 52.0651, lng: 19.2525 },
      zoom: 6,
      infoWindowPos: {},
      infoWindowOpen: false,
      infoOptions: {
        pixelOffset: {
          width: 0,
          height: -35
        }
      },
      infoContent: "",
      markers: [],
      selectedTheme: "",
      darkmode: darkmode,
      standardmode: standardmode
    };
  },

  created() {
    this.makeAllMarkers();
    this.selectedTheme = localStorage.getItem("theme") || "theme-light";

    Event.$on("theme-changed", theme => {
      this.selectedTheme = theme;
    });

    Event.$on("reset-place", e => {
      this.makeAllMarkers();
      this.centerMap(this.center, this.zoom);
      this.closeInfoWindow();
    });

    Event.$on("set-place", place => {
      this.makeMarkersForCity(place.name);
      this.centerMap(place.geometry.location);
    });

    Event.$on("card-clicked", id => {
      this.toggleInfoWindow(this.markers[id]);
    });
  },

  computed: {
    isDark() {
      return this.selectedTheme === "theme-dark" ? true : false;
    }
  },

  methods: {
    makeAllMarkers() {
      axios.get("/api/shops/all").then(({ data }) => {
        this.markers = data.map(data => {
          return { position: { lat: data.lat, lng: data.lng }, ...data };
        });
      });
    },

    makeMarkersForCity(city) {
      axios.get(`/api/shops/all?filter=${city}`).then(({ data }) => {
        this.markers = data.map(data => {
          return { position: { lat: data.lat, lng: data.lng }, ...data };
        });
      });
    },

    toggleInfoWindow(marker, idx) {
      this.centerMap(marker.position);

      this.infoContent = this.getInfoWindowContent(marker);
      this.infoWindowPos = marker.position;
      this.infoWindowOpen = true;
    },

    getInfoWindowContent(marker) {
      return `
        <span style="font-weight: 700; font-size: 1.6rem;">${marker.shop_name}</span><br><br>
        <span>ul. ${marker.street}</span><br>
        <span>${marker.postal_code} ${marker.city_name}</span><br><br>
        <span><i class="fas fa-phone"></i> <a href="tel:${marker.telephone}">${marker.telephone}</a><span><br>
        <span>e-mail: <a href="mailto:${marker.email}">${marker.email}</a><span>`;
    },

    closeInfoWindow() {
      this.infoWindowOpen = false;
      this.infoContent = "";
      this.infoWindowPos = {};

      Event.$emit("info-closed");
    },

    centerMap(position, zoom = 10) {
      this.$refs.mapRef.$mapPromise.then(map => {
        map.setZoom(zoom);
        map.panTo(position);
      });
    }
  }
};
</script>