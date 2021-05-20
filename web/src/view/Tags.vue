<template>
  <div>
    <div class="row" v-if="!isTagSelected">
      <div class="col-xl-4">
        <div class="card card-custom card-stretch gutter-b" @click="showTagData(1)">
          <div class="card-body d-flex flex-column p-0">
            <div class="d-flex align-items-center justify-content-between card-spacer">
              <div class="d-flex flex-column mr-2">
                <a href="#" class="text-dark-75 text-hover-warning font-weight-bolder font-size-h5">Tag name</a>
                <span class="text-muted font-weight-bold mt-2">Description</span>
              </div>
              <span class="symbol symbol-light-warning symbol-45">
                <span class="symbol-label font-weight-bolder font-size-h6">18</span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <TagData></TagData>
    </div>
  </div>
</template>

<script>
import { SET_BREADCRUMB } from "@/core/services/store/breadcrumbs.module";
import TagData from "@/view/components/TagData.vue";

export default {
  name: "tags",
  components: {
    TagData
  },
  data () {
    return {
      isTagSelected: false,
      selectedType: ''
    }
  },
  mounted() {
    this.$store.dispatch(SET_BREADCRUMB, [{ title: "Tags" }]);
  },
  methods: {
    showTagData: function(tagId){
      this.selectedType = tagId,
      this.isTagSelected = true
    }
  }
};
</script>