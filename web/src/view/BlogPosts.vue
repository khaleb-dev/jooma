<template>
  <div>
    <div class="row">
      <div class="col-12">
        This will list all posts.
      </div>
    </div>
  </div>
</template>

<script>
import { SET_BREADCRUMB } from "@/core/store/breadcrumbs.module";

export default {
  name: "BlogPosts",
  mounted() {
    this.$store.dispatch(SET_BREADCRUMB, [{ title: "Manage Posts" }]);
  },
};
</script>