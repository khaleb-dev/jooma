<template>
  <div>
    <div class="row">
      <div class="col-12">
        <CreateBlog></CreateBlog>
      </div>
    </div>
  </div>
</template>

<script>
import { SET_BREADCRUMB } from "@/core/services/store/breadcrumbs.module";
import CreateBlog from "@/view/components/CreateBlog.vue";

export default {
  name: "blog",
  components: {
    CreateBlog,
  },
  mounted() {
    this.$store.dispatch(SET_BREADCRUMB, [{ title: "Blog" }]);
  },
};
</script>