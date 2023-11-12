<template>
  <div class="container">
    <div class="card">
      <div class="card-heard">
        <h4>Devises</h4>
        <RouterLink to="/devise/create" class="btn btn-primary float-end">
          Add Devise
        </RouterLink>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>ID</th>
              <th>CODE</th>
              <th>CURRENCY_NAME</th>
              <th>CREATED_AT</th>
              <th>UPDATED_AT</th>
            </tr>
          </thead>
          <tbody v-if="this.devises.length > 0">
            <tr v-for="(devise, index) in this.devises" :key="index">
              <td>{{ devise.id }}</td>
              <td>{{ devise.code }}</td>
              <td>{{ devise.currency_name }}</td>
              <td>{{ devise.created_at }}</td>
              <td>{{ devise.updated_at }}</td>

              <td>
                <RouterLink
                  :to="{ path: '/devise/' + devise.id + '/edit' }"
                  class="btn btn-primary"
                >
                  Edit
                </RouterLink>
                <button
                  type="button"
                  @click="deleteDevise(devise.id)"
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
  name: "devise",
  data() {
    return {
      devises: [],
    };
  },
  mounted() {
    this.getDevises();
    //console.log('i am here')
  },
  methods: {
    getDevises() {
      axios.get("http://localhost:8000/api/devise").then((res) => {
        this.devises = res.data.devises;
        console.log(this.devises);
      });
    },
    deleteDevise(deviseid) {
      console.log(deviseid);

      if (confirm("Are you super, you want to delete this data? ")) {
        // console.log(deviseid);
        axios
          .delete(`http://localhost:8000/api/devise/${deviseid}/delete`)
          .then((res) => {
            alert(res.data.message);

            this.getDevises();
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
