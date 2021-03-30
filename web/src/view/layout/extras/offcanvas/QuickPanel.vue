<template>
  <div class="topbar-item">
    <div class="btn btn-icon btn-clean btn-lg mr-1 pulse pulse-primary" id="kt_quick_panel_toggle">
      <span class="svg-icon svg-icon-xl svg-icon-primary">
        <inline-svg src="media/svg/icons/Code/Compiling.svg" />
      </span>
      <span class="pulse-ring"></span>
    </div>

    <!-- begin::Quick Panel -->
    <div
      id="kt_quick_panel"
      ref="kt_quick_panel"
      class="offcanvas offcanvas-right pt-5 pb-10"
      style="overflow: hidden;"
    >
      <!--begin::Header-->
      <div
        class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5"
      >
        <ul
          class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10"
          role="tablist"
        >
          <li class="nav-item">
            <a
              class="nav-link active"
              v-on:click="setActiveTab"
              data-tab="0"
              data-toggle="tab"
              href="#"
              role="tab"
              aria-selected="true"
            >
              Notifications
            </a>
          </li>
          <li class="nav-item">
            <a
              class="nav-link"
              v-on:click="setActiveTab"
              data-tab="2"
              data-toggle="tab"
              href="#"
              role="tab"
              aria-selected="false"
            >
              Settings
            </a>
          </li>
        </ul>
        <div class="offcanvas-close mt-n1 pr-5">
          <a
            href="#"
            class="btn btn-xs btn-icon btn-light btn-hover-primary"
            id="kt_quick_panel_close"
          >
            <i class="ki ki-close icon-xs text-muted"></i>
          </a>
        </div>
      </div>
      <!--end::Header-->

      <div class="offcanvas-content px-10">
        <div class="tab-content">
          <b-tabs class="hide-tabs" v-model="tabIndex">
            <b-tab active>
              <div class="scroll pr-7 mr-n7" id="kt_quick_panel_notifications">
                <!--begin::Nav-->
                <div class="navi navi-icon-circle navi-spacer-x-0">
                  <template v-for="(item, i) in list3">
                    <!--begin::Item-->
                    <a href="#" class="navi-item" v-bind:key="i">
                      <div class="navi-link rounded">
                        <div class="symbol symbol-50 mr-3">
                          <div class="symbol-label">
                            <i class="icon-lg" v-bind:class="item.icon" />
                          </div>
                        </div>
                        <div class="navi-text">
                          <div class="font-weight-bold font-size-lg">
                            {{ item.title }}
                          </div>
                          <div class="text-muted">
                            {{ item.desc }}
                          </div>
                        </div>
                      </div>
                    </a>
                    <!--end::Item-->
                  </template>
                </div>
              </div>
            </b-tab>

            <b-tab>
              <div class="scroll pr-7 mr-n7" id="kt_quick_panel_settings">
                <form class="form">
                  <!--begin::Section-->
                  <div>
                    <h5 class="font-weight-bold mb-3">Customer Care</h5>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Enable Notifications:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-success switch-sm">
                          <label>
                            <input type="checkbox" checked="checked" name="" />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Enable Case Tracking:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-success switch-sm">
                          <label>
                            <input
                              type="checkbox"
                              name="quick_panel_notifications_2"
                            />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Support Portal:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-success switch-sm">
                          <label>
                            <input type="checkbox" checked="checked" name="" />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                  </div>
                  <!--end::Section-->

                  <div class="separator separator-dashed my-6"></div>

                  <!--begin::Section-->
                  <div class="pt-2">
                    <h5 class="font-weight-bold mb-3">Reports</h5>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Generate Reports:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-sm switch-danger">
                          <label>
                            <input type="checkbox" checked="checked" name="" />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Enable Report Export:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-sm switch-danger">
                          <label>
                            <input type="checkbox" name="" />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Allow Data Collection:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-sm switch-danger">
                          <label>
                            <input type="checkbox" checked="checked" name="" />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                  </div>
                  <!--end::Section-->

                  <div class="separator separator-dashed my-6"></div>

                  <!--begin::Section-->
                  <div class="pt-2">
                    <h5 class="font-weight-bold mb-3">Memebers</h5>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Enable Member singup:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-sm switch-primary">
                          <label>
                            <input type="checkbox" checked="checked" name="" />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Allow User Feedbacks:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-sm switch-primary">
                          <label>
                            <input type="checkbox" name="" />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                    <div class="form-group mb-0 row">
                      <label class="col-8 col-form-label"
                        >Enable Customer Portal:</label
                      >
                      <div class="col-4 text-right">
                        <span class="switch switch-sm switch-primary">
                          <label>
                            <input type="checkbox" checked="checked" name="" />
                            <span></span>
                          </label>
                        </span>
                      </div>
                    </div>
                  </div>
                  <!--end::Section-->
                </form>
              </div>
            </b-tab>
          </b-tabs>
        </div>
      </div>
    </div>
    <!-- end::Quick Panel -->
  </div>
</template>

<script>
import KTLayoutQuickPanel from "@/assets/js/layout/extended/quick-panel.js";

export default {
  name: "KTQuickPanel",
  data() {
    return {
      tabIndex: 0,
      list3: [
        {
          title: "5 new user generated report",
          desc: "Reports based on sales",
          icon: "flaticon-bell text-success"
        },
        {
          title: "2 new items submited",
          desc: "by Grog John",
          icon: "flaticon2-box text-danger"
        },
        {
          title: "79 PSD files generated",
          desc: "Reports based on sales",
          icon: "flaticon-psd text-primary"
        },
        {
          title: "$2900 worth producucts sold",
          desc: "Total 234 items",
          icon: "flaticon2-supermarket text-warning"
        },
        {
          title: "4.5h-avarage response time",
          desc: "Fostest is Barry",
          icon: "flaticon-paper-plane-1 text-success"
        },
        {
          title: "3 Defence alerts",
          desc: "40% less alerts thar last week",
          icon: "flaticon-safe-shield-protection text-danger"
        },
        {
          title: "Avarage 4 blog posts per author",
          desc: "Most posted 12 time",
          icon: "flaticon-notepad text-primary"
        },
        {
          title: "16 authors joined last week",
          desc: "9 photodrapehrs, 7 designer",
          icon: "flaticon-users-1 text-warning"
        },
        {
          title: "2 new items have been submited",
          desc: "by Grog John",
          icon: "flaticon2-box text-info"
        },
        {
          title: "2.8 GB-total downloads size",
          desc: "Mostly PSD end  AL concepts",
          icon: "flaticon2-download text-success"
        },
        {
          title: "$2900 worth producucts sold",
          desc: "Total 234 items",
          icon: "flaticon2-supermarket text-danger"
        },
        {
          title: "7 new user generated report",
          desc: "Reports based on sales",
          icon: "flaticon-bell text-primary"
        },
        {
          title: "4.5h-avarage response time",
          desc: "Fostest is Barry",
          icon: "flaticon-paper-plane-1 text-success"
        }
      ]
    };
  },
  mounted() {
    // Init Quick Offcanvas Panel
    KTLayoutQuickPanel.init(this.$refs["kt_quick_panel"]);
  },
  methods: {
    /**
     * Set current active on click
     * @param event
     */
    setActiveTab(event) {
      const tab = event.target.closest('[role="tablist"]');
      const links = tab.querySelectorAll(".nav-link");
      // remove active tab links
      for (let i = 0; i < links.length; i++) {
        links[i].classList.remove("active");
      }

      // set clicked tab index to bootstrap tab
      this.tabIndex = parseInt(event.target.getAttribute("data-tab"));

      // set current active tab
      event.target.classList.add("active");
    }
  }
};
</script>
