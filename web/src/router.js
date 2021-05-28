import Vue from "vue";
import Router from "vue-router";

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: "/",
      redirect: "/dashboard",
      component: () => import("@/view/layout/Layout"),
      children: [
        {
          path: "/dashboard",
          name: "dashboard",
          component: () => import("@/view/Dashboard")
        },
        {
          path: "/create-post",
          name: "create-post",
          component: () => import("@/view/BlogEditor")
        },
        {
          path: "/manage/posts",
          name: "manage-post",
          component: () => import("@/view/BlogPosts")
        },
        {
          path: "/manage/groups",
          name: "manage-groups",
          component: () => import("@/view/Groups")
        },
        {
          path: "/manage/tags",
          name: "manage-tags",
          component: () => import("@/view/Tags")
        }
      ]
    },
    {
      path: "/",
      component: () => import("@/view/pages/auth/login_pages/Login-1"),
      children: [
        {
          name: "login",
          path: "/login",
          component: () => import("@/view/pages/auth/login_pages/Login-1")
        }
      ]
    },
    {
      path: "*",
      redirect: "/404"
    },
    {
      // the 404 route, when none of the above matches
      path: "/404",
      name: "404",
      component: () => import("@/view/pages/error/Error-1.vue")
    }
  ]
});
