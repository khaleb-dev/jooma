<template>
  <!-- begin:: Footer -->
  <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
    <div
      class="d-flex align-items-center justify-content-between"
      v-bind:class="{ 'container-fluid': widthFluid, container: !widthFluid }"
    >
      <div class="text-dark">
        <span class="text-muted font-weight-bold mr-2">
          2021 &nbsp;&copy;&nbsp;
        </span>
        <a
          href="http://joomedia.com"
          target="_blank"
          class="text-dark-75 text-hover-primary"
        >
          JooMedia Inc. 
        </a>
      </div>
      <div class="nav nav-dark">
        <a class="nav-link px-3">
          Developed with 
          <span class="svg-icon svg-icon-danger pr-1 pl-1">
              <inline-svg src="media/svg/icons/General/Half-heart.svg" />
          </span>
            by
        </a>
        <a
          href="https://khaleb.dev"
          target="_blank"
          class="nav-link pl-0 pr-0"
        >
          Khaleb.dev
        </a>
      </div>
    </div>
  </div>
  <!-- end:: Footer -->
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "KTFooter",
  computed: {
    ...mapGetters(["layoutConfig"]),

    /**
     * Check if footer container is fluid
     */
    widthFluid() {
      return this.layoutConfig("footer.width") === "fluid";
    }
  }
};
</script>
