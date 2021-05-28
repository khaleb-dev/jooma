<template>
  <div>
    <div class="row">
      <div class="col-12">
        <EditorForm></EditorForm>
      </div>
    </div>
  </div>
</template>

<script>
import { SET_BREADCRUMB } from "@/core/store/breadcrumbs.module";
import EditorForm from "@/view/components/EditorForm.vue";

export default {
  name: "BlogEditor",
  components: {
    EditorForm,
  },
  mounted() {
    this.$store.dispatch(SET_BREADCRUMB, [{ title: "Create Post" }]);
  },
};
</script>