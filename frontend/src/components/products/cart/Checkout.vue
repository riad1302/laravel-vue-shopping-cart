<template>
  <div class="cart-products">
    <div class="row mt-5">
      <div class="col-sm-8">
        <form id="productCU">
          <!-- <p v-if="errors.length">
                  <b>Please correct the following error(s):</b>
                  <ul>
                    <li v-for="error in errors" :key="error">{{ error }}</li>
                  </ul>
          </p>-->
          <div class="form-group">
            <label for="productName">Address 1</label>
            <input
              type="text"
              class="form-control"
              id="productName"
              name="productName"
              aria-describedby="emailHelp"
              placeholder="Enter Address"
            />
          </div>
          <div class="form-group">
            <label for="productCategory">Address 2</label>
            <input
              type="password"
              class="form-control"
              id="productCategroyDummy"
              placeholder="Password"
              name="productCategroyDummy"
            />
          </div>
          <div class="form-group">
            <label for="productSeller">Country</label>
            <input
              type="password"
              class="form-control"
              id="productSellerDummy"
              placeholder="Password"
              name="productSellerDummy"
            />
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="productRating">Zip code</label>
                <input
                  type="password"
                  class="form-control"
                  id="productRating"
                  placeholder="Password"
                />
              </div>
            </div>
          </div>
          <small id="emailHelp" class="form-text text-muted"
            >We'll never share your data with anyone else.</small
          >
          <br />
        </form>
      </div>
      <div class="col-sm-4">
        <cart-calculator ref="cartCalculator"></cart-calculator>
        <ul class="list-group mb-3">
          <router-link to="/products" class="btn btn-primary mt-2 text-white"
            >Continue Shipping</router-link
          >
          <a
            href="javascript:;;"
            class="btn btn-success mt-2 text-white"
            @click="createShippingDetail"
            >Save & Pay</a
          >
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { mapMutations } from "vuex";
import CartCalculator from "./CartCalculator";
export default {
  name: "Checkout",
  components: { CartCalculator },
  data() {
    return {
      shippingDetail: {
        address1: "",
        address2: "",
        country: "",
        zipCode: "",
        shippingDate: "",
        products: [],
        userId: "",
        totalPrice: "",
      },
    };
  },
  methods: {
    ...mapMutations(["REMOVE_CART_CHECKOUT_DATA"]),
    createShippingDetail() {
      this.REMOVE_CART_CHECKOUT_DATA();
      this.$router.push("/");
    },
  },
};
</script>

<style lang="css">
.cart-products > div {
  text-align: start;
}

.cart-products #productCU > div {
  text-align: start;
}

.cart-products #productCU > button {
  text-align: center;
}
</style>
