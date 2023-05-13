<template>
  <div class="product-details">
    <div class="container">
      <div class="row mb-3">
        <div class="col-sm-4">
          <div class="product-image">
            <div class="view hm-zoom z-depth-2" style="cursor: pointer">
              <img
                v-bind:src="product.productImage"
                v-bind:alt="product.productName"
                class="img-fluid rounded"
                style="max-height: 700px; max-width: 127.135px; margin: auto"
              />
            </div>
            <div class style="margin-top: 15px">
              <ul class="list-group mb-3">
                <li
                  class="list-group-item d-flex justify-content-between lh-condensed"
                >
                  <div>
                    <h6 class="my-0">Product Price</h6>
                  </div>
                  <span class="text-muted" style="color: crimson !important"
                    >₹ {{ product.productPrice }}</span
                  >
                </li>
              </ul>
              <button class="btn btn-primary" v-on:click="addToCart(product)">
                Add to Cart
              </button>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="product-detail">
            <h5 class="product-head">Product Details</h5>
            <table class="table" cellspacing="0" style="max-height: 28px">
              <tbody>
                <tr>
                  <th scope="row">Product Name</th>
                  <td>{{ product.productName }}</td>
                </tr>
                <tr>
                  <th scope="row">Product Description</th>
                  <td>{{ product.productDescription }}</td>
                </tr>
                <tr>
                  <th scope="row">Product Category</th>
                  <td>{{ product.productCategory }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { mapMutations } from "vuex";
import CardTemplate from "../shared/CardTemplate";
import { errorToaster } from "../../components/shared/service/ErrorHandler.js";

export default {
  name: "productDetail",
  components: { CardTemplate },
  data() {
    return {
      product: new Object(),
    };
  },
  methods: {
    ...mapMutations(["ADD_CART_LOCAL"]),
    addToCart(product) {
      this.ADD_CART_LOCAL(product);
    },
  },
  created() {
    axios
      .get(`${process.env.VUE_APP_BASE_URL}/products/${this.$route.params.id}`)
      .then((response) => {
        this.product = response.data.data;

        // Getting Similar Product
      })
      .catch((error) => {
        console.log(error);
        errorToaster("Error while fetching similar products", "");
      });
  },
};
</script>

<style>
.product-detail {
  text-align: start;
}

.product-detail .product-head {
  padding: 10px;
  font-weight: 500;
}

.product-detail .table th {
  width: 152px;
}

.product-ship {
  height: 15rem;
}

.stars-outer {
  display: inline-block;
  position: relative;
  font-family: FontAwesome;
}

.stars-outer::before {
  content: "\f006 \f006 \f006 \f006 \f006";
}

.stars-inner {
  position: absolute;
  top: 0;
  left: 0;
  white-space: nowrap;
  overflow: hidden;
  width: 0;
}

.stars-inner::before {
  content: "\f005 \f005 \f005 \f005 \f005";
  color: #f8ce0b;
}
</style>
