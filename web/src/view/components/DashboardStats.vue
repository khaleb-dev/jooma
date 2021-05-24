<template>
  <div class="card card-custom bg-gray-100 card-stretch gutter-b">
    <div class="card-header border-0 bg-danger py-5">
      <h3 class="card-title font-weight-bolder text-white">Blog Stat</h3>
    </div>

    <div class="card-body p-0 position-relative overflow-hidden">
      <apexchart
        class="card-rounded-bottom bg-danger"
        :options="chartOptions"
        :series="series"
        type="area"
      ></apexchart>

      <div class="card-spacer mt-n25">
        <div class="row m-0">
          <div class="col-12 col-sm text-center bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
            <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
              <inline-svg src="media/svg/icons/Shopping/Price1.svg" />
            </span>
            <a href="#" class="text-primary font-weight-bold font-size-h6 mt-2">Total Tags</a>
            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block">59</span>
          </div>
          <div class="col-12 col-sm text-center bg-light-danger px-6 py-8 rounded-xl mr-7 mb-7">
            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
              <inline-svg src="media/svg/icons/Files/Group-folders.svg" />
            </span>
            <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2">Total Groups</a>
            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block">6</span>
          </div>
          <div class="col-12 col-sm text-center bg-light-success px-6 py-8 rounded-xl mr-7 mb-7">
            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
              <inline-svg src="media/svg/icons/Files/Selected-file.svg" />
            </span>
            <a href="#" class="text-success font-weight-bold font-size-h6 mt-2">Total Post</a>
            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block">101</span>
          </div>
          <div class="col-12 col-sm text-center bg-light-warning px-6 py-8 rounded-xl mb-7">
            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
              <inline-svg src="media/svg/icons/Shopping/Chart-bar2.svg" />
            </span>
            <a href="#" class="text-warning font-weight-bold font-size-h6">Total Visits</a>
            <span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-2 d-block">55098</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  name: "DashboardStats",
  data() {
    return {
      strokeColor: "#D13647",
      chartOptions: {},
      series: [
        {
          name: "",
          data: [30, 59, 17, 27, 38, 45, 32, 80, 29, 38, 40, 40],
        },
      ],
    };
  },
  computed: {
    ...mapGetters(["layoutConfig"]),
  },
  mounted() {
    // reference; kt_mixed_widget_1_chart
    this.chartOptions = {
      chart: {
        type: "area",
        height: 300,
        toolbar: {
          show: false,
        },
        zoom: {
          enabled: false,
        },
        sparkline: {
          enabled: true,
        },
        dropShadow: {
          enabled: true,
          enabledOnSeries: undefined,
          top: 5,
          left: 0,
          blur: 3,
          color: this.strokeColor,
          opacity: 0.5,
        },
      },
      plotOptions: {},
      legend: {
        show: false,
      },
      dataLabels: {
        enabled: false,
      },
      fill: {
        type: "solid",
        opacity: 0,
      },
      stroke: {
        curve: "smooth",
        show: true,
        width: 3,
        colors: [this.strokeColor],
      },
      xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"],
        axisBorder: {
          show: false,
        },
        axisTicks: {
          show: false,
        },
        tooltip: {
          enabled: false,
        },
        labels: {
          show: false,
          style: {
            colors: this.layoutConfig("colors.gray.gray-500"),
            fontSize: "12px",
            fontFamily: this.layoutConfig("font-family"),
          },
        },
        crosshairs: {
          show: false,
          position: "front",
          stroke: {
            color: this.layoutConfig("colors.gray.gray-300"),
            width: 1,
            dashArray: 3,
          },
        },
      },
      yaxis: {
        show: false,
        min: 0,
        max: 80,
        labels: {
          show: false,
          style: {
            colors: this.layoutConfig("colors.gray.gray-500"),
            fontSize: "12px",
            fontFamily: this.layoutConfig("font-family"),
          },
        },
      },
      states: {
        normal: {
          filter: {
            type: "none",
            value: 0,
          },
        },
        hover: {
          filter: {
            type: "none",
            value: 0,
          },
        },
        active: {
          allowMultipleDataPointsSelection: false,
          filter: {
            type: "none",
            value: 0,
          },
        },
      },
      tooltip: {
        style: {
          fontSize: "12px",
          fontFamily: this.layoutConfig("font-family"),
        },
        // y: {
        //   formatter: function (val) {
        //     return "$" + val + " thousands";
        //   },
        // },
        marker: {
          show: false,
        },
      },
      colors: ["transparent"],
      markers: {
        colors: [this.layoutConfig("colors.theme.light.danger")],
        strokeColor: [this.strokeColor],
        strokeWidth: 3,
      },
      grid: {
        show: false,
        padding: {
          left: 0,
          right: 0,
        },
      },
    };
  },
};
</script>
