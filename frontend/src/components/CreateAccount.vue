<template>
  <div class="create-account">
    <form class="form-signup" @submit.prevent="createAccount">
      <img
        class="mb-4"
        src="../assets/create-account.svg"
        alt
        width="72"
        height="72"
      />
      <h1 class="h3 mb-3 font-weight-normal">Create an account</h1>
      <div
        class="alert alert-danger"
        role="alert"
        v-for="(error, index) in errorMessage"
        :key="index"
      >
        {{ error }}
      </div>

      <div class="row">
        <div class="col-md mb-3">
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            placeholder="Name"
            v-model="user.name"
            v-validate="'required|min:5'"
          />
          <span class="error-from">{{ errors.first('name') }}</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md mb-3">
          <input
            type="text"
            class="form-control"
            v-model="user.email"
            id="emailId"
            name="email"
            placeholder="Email address"
            v-validate="'required|email'"
          />
          <span class="error-from">{{ errors.first('email') }}</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md mb-3">
          <input
            type="password"
            class="form-control"
            id="act-password"
            placeholder="New password"
            name="password"
            v-model="user.password"
            v-validate="'required|min:8'"
          />
          <span class="error-from">{{ errors.first('password') }}</span>

        </div>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">
        <i class="fa fa-spinner fa-spin mr-1" v-if="showLoader"></i>Sign Up
      </button>
    </form>
  </div>
</template>
<script>
import axios from "axios";
import { successToaster, errorToaster } from "./shared/service/ErrorHandler.js";
export default {
  name: "CreateAccount",
  data() {
    return {
      showLoader: false,
      user: {
        name: "",
        email: "",
        password: "",
      },
      errorMessage: [],
    };
  },
  methods: {
    createAccount() {
      this.showLoader = true;
      this.errorMessage = [];
      this.$validator.validateAll().then((result) => {
        if (result) {
          axios.post(`${process.env.VUE_APP_BASE_URL}/register`, this.user)
            .then((response) => {
              if (response.data.success) {
                this.showLoader = false;
                successToaster("User Registered Successfully");
                this.$router.push("/login");
              } else {
                console.log(data.response.success);
              }
            }).catch((response) => {
              console.log(response);
              errorToaster(
                      "Registeration Failed",
              );
            });
        }
      });
    }
  },
};
</script>

<style>
.form-signup {
  width: 100%;
  max-width: 500px;
  padding: 15px;
  margin: auto;
}
</style>
