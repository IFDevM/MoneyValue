<template>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>Add devises</h4>
      </div>
      <div class="card-body">
        <ul
          class="alert alert-warning"
          v-if="Object.keys(this.errorList).length > 0"
        >
          <li
            class="mb-0 ms-3"
            v-for="(error, index) in this.errorList"
            :key="index"
          >
            {{ error[0] }}
          </li>
        </ul>

        <div class="mb-3">
          <label for="">CODE</label>
          <input type="text" v-model="model.devise.code" class="form-control" />
        </div>

        <div class="mb-3">
          <label for="">CURRENCY_NAME</label>
          <input
            type="text"
            v-model="model.devise.currency_name"
            class="form-control"
          />
        </div>

        <div class="mb-3">
          <button type="button" @click="saveDevise" class="btn btn-primary">
            Save
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import { object } from "prop-types";

export default {
  name: "deviseCreate",
  data() {
    return {
      
      errorList: "",
      model: {
        devise: {
          code: "",
          currency_name: "",
        },
      },
    };
  },
  methods: {
    saveDevise() {

      var mythis = this;

      axios
        .post("http://localhost:8000/api/devise", this.model.devise)
        .then((res) => {
          console.log(res);
          alert(res.data.message);

          this.model.devise = {
            code: "",
            currency_name: "",
          };

          this.errorList = "";
        })

        .catch(function (error) {

          if (error.response) {

            if (error.response.status == 422) {

            mythis.errorList = error.response.data.errors;

            }

            if(error.response.status == 404){

              alert(error.response.data.message);

            }
            // console.log(error.response.data);
            // console.log(error.response.status);
            // console.log(error.response.headers);
          } else if (error.request) {

            console.log(error.request);


          } else {
            console.log("Error", error.message);
          }
        });
    },
  },
};
</script>
