<template>
  <div>
    <div class="row" v-if="!isGroupSelected">
      <div class="col-xl-4">
        <div class="card card-custom card-stretch gutter-b" @click="showGroupData(2)">
          <div class="card-body d-flex flex-column p-0">
            <div class="d-flex align-items-center justify-content-between card-spacer">
              <div class="d-flex flex-column mr-2">
                <a href="#" class="text-dark-75 text-hover-success font-weight-bolder font-size-h5">Group name</a>
                <span class="text-muted font-weight-bold mt-2">Description</span>
              </div>
              <span class="symbol symbol-light-success symbol-45">
                <span class="symbol-label font-weight-bolder font-size-h6">19</span>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div v-else>
      <GroupData></GroupData>
    </div>
  </div>
</template>

<script>
import { SET_BREADCRUMB } from "@/core/store/breadcrumbs.module";
import GroupData from "@/view/components/GroupData.vue";

export default {
  name: "groups",
  components: {
    GroupData
  },
  data () {
    return {
      isGroupSelected: false,
      selectedGroup: ''
    }
  },
  mounted() {
    this.$store.dispatch(SET_BREADCRUMB, [{ title: "Groups" }]);
  },
  methods: {
    showGroupData: function(groupId){
      this.selectedGroup = groupId,
      this.isGroupSelected = true
    }
  }
};
</script>