<template>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h4>Add paires</h4>
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
          <input
            type="text"
            v-model="model.paire.SourceCurrency_id"
            class="form-control"
          />
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
          <input type="text" v-model="model.paire.rate" class="form-control" />
        </div>
        <div class="mb-3">
          <button type="button" @click="savePaire" class="btn btn-primary">
            Save
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "CreatePaire",
  data() {
    return {
      errorList: "",
      model: {
        paire: {
          SourceCurrency_id: "",
          TargetCurrency_id: "",
          rate: "",
        },
      },
    };
  },
  methods: {
    savePaire() {
      var mythis = this;

      axios
        .post("http://localhost:8000/api/paire", this.model.paire)
        .then((res) => {
          console.log(res);
          alert(res.data.message);

          this.model.paire = {
            SourceCurrency_id: "",
            TargetCurrency_id: "",
            rate: "",
          };

          this.errorList = "";
        })

        .catch(function (error) {
          if (error.response) {
            if (error.response.status == 422) {
              mythis.errorList = error.response.data.errors;
            }

            if (error.response.status == 404) {
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
