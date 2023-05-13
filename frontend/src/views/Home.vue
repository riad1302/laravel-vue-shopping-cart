<template>
  <div class="home-component">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <img alt="Vue logo" src="../assets/logo.png" width="100px" />
        <h3 class="display-5 ">
          <span style="color:#42b983">VueShop</span>
        </h3>
        <p class="lead">A ShoppingCart (Ecommerce) Application using Vue.js.</p>
      </div>
    </div>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          Our Latest Products
        </li>
        <li class="ml-auto" aria-current="page">
          <router-link to="/products">Show All</router-link>
        </li>
      </ol>
    </nav>
    <LatestProducts></LatestProducts>
  </div>
</template>

<script>
// @ is an alias to /src

import LatestProducts from "@/components/products/LatestProducts.vue";
export default {
  name: "home",
  components: {
    LatestProducts,
  },
};
</script>
<style>
.jumbotron {
  padding: 1rem 0rem;
}
</style>
