import Vue from "vue";
import VeeValidate from 'vee-validate';
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./registerServiceWorker";
// import VueAwesomeSwiper from "vue-awesome-swiper";
import NProgress from "nprogress";

import "../node_modules/nprogress/nprogress.css";

Vue.use(VeeValidate);
Vue.config.productionTip = false;

router.beforeResolve((to, from, next) => {
  if (to.name) {
    NProgress.start();
  }
  next();
});

router.afterEach(() => {
  NProgress.done();
});

new Vue({
  router,
  store,
  render: h => h(App),
}).$mount('#app')
