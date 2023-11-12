<template>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>Edit devises</h4>
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
          <button type="button" @click="updateDevise" class="btn btn-primary">
            Update
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "deviseEdit",
  data() {
    return {

      deviseid: "",

      errorList: "",
      model: {
        devise: {
          code: "",
          currency_name: "",
        },
      },
    };
  },

  mounted() {
    // console.log(this.$route.params.id);
    this.deviseid = this.$route.params.id;
    this.getDeviseData(this.$route.params.id);
  },

  methods: {
    getDeviseData(deviseid) {

      axios
        .get(`http://localhost:8000/api/devise/${this.deviseid}/edit`)
        .then((res) => {
          console.log(res.data.devise);

          this.model.devise = res.data.devise;
        })
        .catch(function (error) {

          if (error.response) {

            if (error.response.status == 404) {

              alert(error.response.data.message);

            }
          }
        });
    },

    updateDevise() {
      
      var mythis = this;

      axios
        .put(`http://localhost:8000/api/devise/${this.deviseid}/edit`, this.model.devise)
        .then((res) => {

            console.log(res.data);
            alert(res.data.message);

          this.errorList = "";
        })

        .catch(function (error) {
          if (error.response) {

            if (error.response.status == 422) {

              mythis.errorList = error.response.data.errors;

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
