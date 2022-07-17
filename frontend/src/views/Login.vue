<template>
  <div class="container mt-5 w-25 border p-3">
    <label class="text-center">
      <h1>Login</h1>
    </label>

    <form @submit.prevent="login">
      <div class="form-group mt-3">
        <input
          type="email"
          class="form-control"
          id="exampleInputEmail1"
          aria-describedby="emailHelp"
          placeholder="Enter email"
          v-model="user.email"
        />
      </div>
      <div class="form-group mt-3">
        <input
          type="password"
          class="form-control"
          id="exampleInputPassword1"
          placeholder="Password"
          v-model="user.password"
        />
      </div>

      <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
  </div>
</template>

<script>
import { useAuthStore } from "../stores/auth";
import { ref } from "vue";
import { useRouter } from "vue-router";

export default {
  setup() {
    const user = ref({ email: "", pasword: "" });
    const authStore = useAuthStore();
    const router = useRouter();

    async function login() {
      await fetch("http://127.0.0.1:8000/api/login", {
        method: "post",
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json",
        },
        body: JSON.stringify(user.value),
      })
        .then((response) => response.json())
        .then((data) => {
          if (data.status === "success") {
            authStore.saveAuth(data.user, data.token);
            router.push("/");
          } else {
            alert(data.message);
          }
        });
    }
    return {
      user,
      login,
    };
  },
};
</script>

<style></style>
