<template>
  <div class="createProduct">
    <modal
      :header="'Create Product'"
      :isShow="showModal"
      v-if="showModal"
      @close="showModal = false"
    >
      <product-form :product="product" v-on:submit-form="productAction" />
    </modal>
  </div>
</template>
<script>
import axios from "axios";
import Modal from "../../shared/Modal.vue";
import ProductForm from "./ProductForm";
import {errorToaster, successToaster} from "../../shared/service/ErrorHandler";
export default {
  name: "createProduct",
  components: { Modal, ProductForm },
  data() {
    return {
      product: new Object(),
      showModal: false,
    };
  },
  methods: {
    showModalForm: function() {
      this.showModal = true;
    },

    productAction: function(product) {
      //console.log("Creating new Product", product);
      this.$http.post('/create/products', product).then((response) => {
        if (response.data.success) {
          this.showModal = false;
          successToaster(response.data.message, "", );
        }
      }).catch((error) => {
        //console.log(error);
        errorToaster("Product Create Failed", "");
      });
      //
    },
  },
};
</script>
<style lang="css"></style>
