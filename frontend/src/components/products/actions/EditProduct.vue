<template>
    <div class="edit-product">
       <modal :header="'Edit Product'" :isShow="showModal" v-if="showModal" @close="showModal = false">
            <product-form :product="product" v-on:submit-form="productAction"/>
       </modal>
    </div>
</template>

<script>
import Modal from "../../shared/Modal";
import ProductForm from "./ProductForm";
import {errorToaster, successToaster} from "../../shared/service/ErrorHandler";

export default {
  name: "editProduct",
  components: { Modal, ProductForm },
  data() {
    return {
      product: new Object(),
      showModal: false
    };
  },
  methods: {
    setProduct(product) {
      this.showModal = true;
      this.product = product;
    },

    productAction: function(product) {
        this.$http.post(`/update/products/${product.id}`, product).then((response) => {
            if (response.data.success) {
                this.showModal = false;
                successToaster(response.data.message, "", );
            }
        }).catch((error) => {
            //console.log(error);
            errorToaster("Product Create Failed", "");
        });
    }
  }
};
</script>

<style>
</style>