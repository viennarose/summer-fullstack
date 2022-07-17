<template>
  <h1>Shouts Page</h1>

  <p>
    <!-- User: {{ user.fname }} -->
    <br />
    Token: {{ token }}
  </p>
  <div class="row">
    <div class="col-md-3">
      <h4>Shouts</h4>
    </div>
    <div class="col-md-9">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Shoutout</th>
            <th>Tags</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="list in shouts" :key="list.id">
            <td>{{ list.id }}</td>
            <td>{{ list.user_id }}</td>
            <td>{{ list.shoutout }}</td>
            <td>
              {{ list.tags }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from "../stores/auth";
import { useRouter } from "vue-router";
import { storeToRefs } from "pinia";
import { ref } from "vue";
export default {
  data() {
    return {
      shouts: [],
      token: "",
    };
  },
  methods: {
    getData() {
      const authStore = useAuthStore();
      const router = useRouter();

      const { token } = storeToRefs(useAuthStore());
      this.token = token;

      fetch("http://localhost:8000/api/shouts/", {
        method: "get",
        headers: {
          Accept: "application/json",
          Authorization: "Bearer " + authStore.token,
        },
      })
        .then((data) => data.json())
        .then((data) => (this.shouts = data))
        .catch((err) => console.log(err));
    },
  },

  mounted() {
    this.getData();
    const router = useRouter();

    console.log("mounted");
    if (this.token == "") {
      router.replace("/login");
    }
  },
};
</script>

<style></style>
