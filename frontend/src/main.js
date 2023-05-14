import Vue from "vue";
import VeeValidate from 'vee-validate';
import axios from 'axios';
import App from "./App.vue";
import router from "./router";
import store from "./store";
import "./registerServiceWorker";
// import VueAwesomeSwiper from "vue-awesome-swiper";
import NProgress from "nprogress";

import "../node_modules/nprogress/nprogress.css";

let token = "";
const data = localStorage.getItem("_auth");
if (data) {
  const strObj = new Buffer(data || "", "base64").toString("utf8");
  const value = JSON.parse(strObj);
  if (value.accessToken) {
    token = value.accessToken;
  }
}
axios.defaults.headers.common = {
  'Authorization': 'Bearer ' + token
};

axios.defaults.baseURL = `${process.env.VUE_APP_BASE_URL}`; //TODO: append the trailing slash

// Add modified axios instance to Vue prototype so that to be available globally via Vue instance
Vue.prototype.$http = axios;

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
