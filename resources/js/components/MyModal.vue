<template>
  <modal name="delete-item" classes="card">
    <div class="card-header">Usuń pozycję</div>
    <div class="card-body">
      <h2 class="card-title">{{text}}</h2>
    </div>
    <div class="card-footer">
      <button type="button" class="btn btn-primary" @click="onAccept">Ok</button>
      <button type="button" class="btn btn-secondary" @click="hideModal">Anuluj</button>
    </div>
  </modal>
</template>

<script>
export default {
  props: ["text"],
  data() {
    return {
      rowId: null
    };
  },

  created() {
    Event.$on("modal-open", id => {
      this.rowId = id;
      this.$modal.show("delete-item");
    });
  },

  methods: {
    onAccept() {
      Event.$emit("accepted", this.rowId);
      this.hideModal();
    },

    hideModal() {
      this.rowId = null;
      this.$modal.hide("delete-item");
    }
  }
};
</script>