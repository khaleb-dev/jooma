<template>
  <div>
    <div class="row">
      <div class="col-12">
        <Tags></Tags>
      </div>
    </div>
  </div>
</template>

<script>
import { SET_BREADCRUMB } from "@/core/services/store/breadcrumbs.module";
import Tags from "@/view/components/Tags.vue";

export default {
  name: "tags",
  components: {
    Tags
  },
  mounted() {
    this.$store.dispatch(SET_BREADCRUMB, [{ title: "Tags" }]);
  },
};
</script>