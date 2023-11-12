<template>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>Edit Paires</h4>
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
          <label for="">SourceCurrency_id</label>
          <input type="text" v-model="model.paire.SourceCurrency_id" class="form-control" />
        </div>

        <div class="mb-3">
          <label for="">TargetCurrency_id</label>
          <input
            type="text"
            v-model="model.paire.TargetCurrency_id"
            class="form-control"
          />
        </div>
        <div class="mb-3">
          <label for="">Rate</label>
          <input
            type="text"
            v-model="model.paire.rate"
            class="form-control"
          />
        </div>

        <div class="mb-3">
          <button type="button" @click="updatePaire" class="btn btn-primary">
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
  name: "editPaire",
  data() {
    return {

      paireid: "",

      errorList: "",
      model: {
        paire: {
          SourceCurrency_id: "",
          TargetCurrency_id :"",
          rate :""
        },
      },
    };
  },

  mounted() {
    // console.log(this.$route.params.id);
    this.paireid = this.$route.params.id;
    this.getPaireData(this.$route.params.id);
  },

  methods: {
    getPaireData(paireid) {

      axios
        .get(`http://localhost:8000/api/paire/${this.paireid}/edit`)
        .then((res) => {
          console.log(res.data.paire);

          this.model.paire = res.data.paire;
        })
        .catch(function (error) {

          if (error.response) {

            if (error.response.status == 404) {

              alert(error.response.data.message);

            }
          }
        });
    },

    updatePaire() {
      
      var mythis = this;

      axios
        .put(`http://localhost:8000/api/paire/${this.paireid}/edit`, this.model.paire)
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
