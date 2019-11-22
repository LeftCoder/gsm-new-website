<template>
  <div class="contact-button">
    <button
      @click="$modal.show(modalName)"
      type="button"
      class="btn btn-outline-light contact-btn"
    >Kontakt</button>
    <modal height="auto" width="100%" :name="modalName" :pivotY="1">
      <div class="content">
        <h2>W możemy pomóc?</h2>

        <form autocomplete="off" @submit.prevent="contactUs" @keydown="submitted = false">
          <div class="first-part">
            <div class="form-group">
              <input
                ref="name"
                v-model="message.name"
                :class="`form-control ${isInvalid(errors.name)}`"
                @keydown="delete errors.name"
                type="text"
                name="name"
                placeholder="twoję imię: *"
              />
              <span v-if="errors.name" class="invalid-feedback" role="alert">
                <strong>{{ errors.name[0] }}</strong>
              </span>
            </div>
            <div class="form-group">
              <input
                v-model="message.email"
                :class="`form-control ${isInvalid(errors.email)}`"
                @keydown="delete errors.email"
                type="text"
                name="email"
                placeholder="e-mail: *"
              />
              <span v-if="errors.email" class="invalid-feedback" role="alert">
                <strong>{{ errors.email[0] }}</strong>
              </span>
            </div>
          </div>
          <div class="input-group">
            <textarea
              v-model="message.body"
              data-autosize
              :class="`form-control ${isInvalid(errors.body)}`"
              @keydown="delete errors.body"
              name="body"
              cols="30"
              rows="10"
              placeholder="treść wiadomości: *"
            ></textarea>
            <span v-if="errors.body" class="invalid-feedback" role="alert">
              <strong>{{ errors.body[0] }}</strong>
            </span>
          </div>
          <div class="buttons">
            <button :disabled="submitted" type="submit" class="btn">wyślij</button>
            <button @click="resetForm" type="button" class="btn">anuluj</button>
          </div>
        </form>
      </div>
    </modal>
  </div>
</template>

<script>
import swal from "sweetalert";

export default {
  props: ["modal-name"],
  data() {
    return {
      message: {},
      errors: {},
      submitted: false
    };
  },

  methods: {
    isInvalid(input) {
      return input ? "is-invalid" : "";
    },

    contactUs() {
      this.submitted = true;

      axios
        .post("/contact", this.message)
        .then(response => {
          this.resetForm();

          swal({
            text: "Wiadomość została wysłana.",
            icon: "success"
          });
        })
        .catch(errors => {
          this.errors = errors.response.data.errors;
        });
    },

    resetForm() {
      this.$modal.hide(this.modalName);
      this.message = {};
      this.errors = {};
      this.submitted = false;
    }
  }
};
</script>