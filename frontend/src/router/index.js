import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import Contact from "../views/Contact.vue";
import Logout from "../views/Logout.vue";
import Register from "../views/Register.vue";
import Login from "../views/Login.vue";
import Shouts from "../views/Shouts.vue";
import Profile from "../views/Profile.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },

    {
      path: "/contact",
      name: "contact",
      component: Contact,
    },
    {
      path: "/logout",
      name: "logout",
      component: Logout,
    },
    {
      path: "/register",
      name: "register",
      component: Register,
    },
    {
      path: "/login",
      name: "login",
      component: Login,
    },
    {
      path: "/shouts",
      name: "shouts",
      component: Shouts,
    },
    {
      path: "/profile",
      name: "profile",
      component: Profile,
    },
  ],
});

export default router;
