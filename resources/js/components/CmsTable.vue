<template>
  <div class="vuetable">
    <div class="activity-bar">
      <a :href="`/${tableName}/create`">
        <button type="button" class="btn btn-primary mb-3">Dodaj</button>
      </a>
      <filter-bar :placeholder="searchPlaceholder"></filter-bar>
    </div>

    <vuetable
      ref="vuetable"
      :api-url="`/api/${tableName}`"
      :fields="fields"
      pagination-path
      :css="css.table"
      :sort-order="sortOrder"
      :per-page="perPage"
      :append-params="moreParams"
      @vuetable:pagination-data="onPaginationData"
      no-data-template="Brak pozycji"
    >
      <template slot="actions" slot-scope="props">
        <div class="custom-actions">
          <a :href="`/${tableName}/${props.rowData.id}/edit`">
            <button class="btn btn-sm btn-primary">
              <i class="fas fa-edit"></i>
            </button>
          </a>
          <button class="btn btn-sm btn-danger" type="button" @click="showModal(props.rowData.id)">
            <i class="fas fa-trash-alt"></i>
          </button>
        </div>
      </template>

      <template slot="published" slot-scope="props">
        <div class="published">
          <toggle-button
            :value="Boolean(props.rowData.published)"
            @change="onToggle(props.rowData.id)"
            color="#007bff"
            :sync="true"
            :labels="{checked: 'tak', unchecked: 'nie'}"
          ></toggle-button>
        </div>
      </template>
    </vuetable>

    <div class="vuetable-pagination">
      <vuetable-pagination-info
        ref="paginationInfo"
        info-class="pagination-info"
        info-template="Pozycje od {from} do {to} z {total} łącznie"
        no-data-template="0 pozycji"
      ></vuetable-pagination-info>
      <vuetable-pagination
        ref="pagination"
        :css="css.pagination"
        @vuetable-pagination:change-page="onChangePage"
      ></vuetable-pagination>
    </div>

    <my-modal :text="modalText"></my-modal>
  </div>
</template>

<script>
import moment from "moment";

import Vuetable from "vuetable-2/src/components/Vuetable";
import VuetablePagination from "vuetable-2/src/components/VuetablePagination";
import VuetablePaginationInfo from "vuetable-2/src/components/VuetablePaginationInfo";
import FilterBar from "./FilterBar";
import MyModal from "./MyModal";

import Css from "./tableDefs/CssDefs.js";
import { PostsFields, PostsSortOrder } from "./tableDefs/PostsDefs.js";
import { ShopsFields, ShopsSortOrder } from "./tableDefs/ShopsDefs.js";

export default {
  props: ["tableName", "searchPlaceholder", "modalText"],
  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo,
    FilterBar,
    MyModal
  },
  data() {
    return {
      fields: [],
      perPage: 10,
      css: Css,
      sortOrder: [],
      moreParams: {}
    };
  },

  created() {
    Event.$on("filter-set", eventData => this.onFilterSet(eventData));
    Event.$on("filter-reset", e => this.onFilterReset());

    Event.$on("accepted", id => {
      axios
        .delete(`/${this.tableName}/${id}`)
        .then(response => {
          Vue.nextTick(() => this.$refs.vuetable.reload());
          flash("Pozycja usunięta proprawnie.");
        })
        .catch(errors => console.log(errors));
    });

    switch (this.tableName) {
      case "posts":
        this.fields = PostsFields;
        this.sortOrder = PostsSortOrder;
        break;
      case "shops":
        this.fields = ShopsFields;
        this.sortOrder = ShopsSortOrder;
        break;
    }
  },

  methods: {
    formatDate(value, fmt = "D.M.YYYY") {
      return value == null ? "" : moment(value).format(fmt);
    },

    onPaginationData(paginationData) {
      this.$refs.pagination.setPaginationData(paginationData);
      this.$refs.paginationInfo.setPaginationData(paginationData);
    },

    onChangePage(page) {
      this.$refs.vuetable.changePage(page);
    },

    onFilterSet(filterText) {
      this.moreParams = {
        filter: filterText
      };
      Vue.nextTick(() => this.$refs.vuetable.refresh());
    },

    onFilterReset() {
      this.moreParams = {};
      Vue.nextTick(() => this.$refs.vuetable.refresh());
    },

    showModal(id) {
      Event.$emit("modal-open", id);
    },

    onToggle(id) {
      axios
        .patch(`/${this.tableName}/${id}`)
        .then(response => {
          flash("Status został zmieniony.");
        })
        .catch(errors => console.log(errors));
    }
  }
};
</script>