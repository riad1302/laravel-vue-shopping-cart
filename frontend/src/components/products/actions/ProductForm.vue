<template>
    <div class="productForm">
        <form id="productCU" @submit="actionProduct" v-if="!loading">
                <p v-if="errors.length">
                  <b>Please correct the following error(s):</b>
                  <ul>
                    <li v-for="error in errors" :key="error">{{ error }}</li>
                  </ul>
                </p>

              <div class="form-group">
                <label for="productName">Product Name</label>
                <input type="text" class="form-control" id="productName" v-model="product.productName" name="productName" aria-describedby="emailHelp" placeholder="Enter Product Name">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="productCategory">Product Category</label>
                <select class="form-control" id="productCategory" name="productCategory" v-model="product.productCategoryId">
                    <option
                      v-for="(category, index) in categories" :key="index"
                      v-bind:value="category.productCategoryId"
                      >{{category.productCategory}}
                    </option>
                </select>
              </div>
              <div class="form-group">
                <label for="productName">Product Description</label>
                <input type="text" class="form-control" id="productName" v-model="product.productDescription" name="productDescription" aria-describedby="emailHelp" placeholder="Enter Product Description">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="productName">Product Price</label>
                <input type="text" class="form-control" id="productName" v-model="product.productPrice" name="productDescription" aria-describedby="emailHelp" placeholder="Enter Product Price">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="productImage">Product Image</label>
                <input type="text" class="form-control" id="productImage" v-model="product.productImage" placeholder="Product Image URL">
              </div>
              <br>
              <button type="submit" class="btn buttonGreen">Save changes</button>
        </form>

        <div class="lds-dual-ring" v-if="loading"></div>
    </div>
</template>
<script>
import axios from "axios";
import { errorToaster } from "../../shared/service/ErrorHandler.js";
import _ from "lodash";
export default {
  name: "productForm",
  props: ["product"],
  data() {
    return {
      errors: [],
      productCategroyDummy: "",
      categories: [],
      loading: false,
    };
  },
  methods: {
    actionProduct(event) {
      event.preventDefault();
      this.$emit("submit-form", this.product);
    },
  },
  created() {
    this.loading = true;
    axios
      .get(`${process.env.VUE_APP_BASE_URL}/products`)
      .then((response) => {
        // getting all products and getting the uniq value for
        // productCategory and returning the productCategory property only
        this.categories = _.uniqBy(
          _.map(response.data.data, function (object) {
            return _.pick(object, ["productCategory", "productCategoryId"]);
          }),
          "productCategory"
        );
        //this.categories.push({ productCategory: "Create New" });

        // getting all products and getting the uniq value for
        // productSeller and returning the productSeller property only
        this.loading = false;
      })
      .catch((error) => {
        console.log(error);
        errorToaster("Error while fetching products", "");
      });
  },
};
</script>
<style lang="css">
.productForm > div {
  text-align: start;
}
.productForm #productCU div {
  text-align: start;
}

.productForm #productCU button {
  text-align: center;
}

.lds-dual-ring {
  display: inline-block;
  width: 64px;
  height: 64px;
}
.lds-dual-ring:after {
  content: " ";
  display: block;
  width: 46px;
  height: 46px;
  margin: 1px;
  border-radius: 50%;
  border: 5px solid #fff;
  border-color: #41b883 transparent #41b883 transparent;
  animation: lds-dual-ring 1.2s linear infinite;
}
@keyframes lds-dual-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>
