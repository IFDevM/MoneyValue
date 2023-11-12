<template>
  <div class="container">
    <div class="card">
      <div class="card-heard">
        <h4>Paires</h4>
        <RouterLink to="/paire/create" class="btn btn-primary float-end">
          Add Paires
        </RouterLink>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>SourceCurrency_id</th>
              <th>TargetCurrency_id</th>
              <th>rate</th>
              <th>NumberofRequests</th>
            </tr>
          </thead>
          <tbody v-if="this.paires.length > 0">
            <tr v-for="(paire, index) in this.paires" :key="index">
              <td>{{ paire.id }}</td>
              <td>{{ paire.SourceCurrency_id }}</td>
              <td>{{ paire.TargetCurrency_id }}</td>
              <td>{{ paire.Rate }}</td>
              <td>{{ paire.NumberofRequests }}</td>

              <td>
                <RouterLink
                  :to="{ path: '/paire/' + paire.id + '/edit' }"
                  class="btn btn-primary"
                >
                  Edit
                </RouterLink>
                <button
                  type="button"
                  @click="deletepaire(paire.id)"
                  class="btn btn-danger"
                >
                  Delete
                </button>
              </td>
            </tr>
          </tbody>
          <tbody v-else>
            <td colspan="6">Loading...</td>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "paire",
  data() {
    return {
      paires: [],
    };
  },
  mounted() {
    this.getpaires();
    //console.log('i am here')
  },
  methods: {
    getpaires() {
      axios.get("http://localhost:8000/api/paire").then((res) => {
        this.paires = res.data.paires;
        console.log(this.paires);
      });
    },
    deletepaire(paireid) {
      console.log(paireid);

      if (confirm("Are you super, you want to delete this data? ")) {
        // console.log(paireid);
        axios
          .delete(`http://localhost:8000/api/paire/${paireid}/delete`)
          .then((res) => {
            alert(res.data.message);

            this.getpaires();
          })
          .catch(function (error) {
            if (error.response) {
              if (error.response.status == 404) {
                alert(error.response.data.message);
              }
            }
          });
      }
    },
  },
};
</script>
