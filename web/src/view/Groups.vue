<template>
  <div>
    <div class="row">
      <div class="col-12">
        <Groups></Groups>
      </div>
    </div>
  </div>
</template>

<script>
import { SET_BREADCRUMB } from "@/core/services/store/breadcrumbs.module";
import Groups from "@/view/components/Groups.vue";

export default {
  name: "groups",
  components: {
    Groups
  },
  mounted() {
    this.$store.dispatch(SET_BREADCRUMB, [{ title: "Groups" }]);
  },
};
</script>