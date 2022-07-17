<template>
  <div class="q-pa-md">
    <div class="row">
      <div class="col" ref="myCol">
        <q-circular-progress
          :value="month"
          :size="cardSize"
          show-value
          :thickness="0.22"
          color="grey-9"
          :square="true"
          track-color="light-blue"
          class="q-ma-md"
          :bordered="false"
          :min="0"
          :max="12"
        />
        <h2 class="text-center">Mois</h2>
      </div>
      <div class="col">
        <q-circular-progress
          :value="days"
          :size="cardSize"
          show-value
          :thickness="0.22"
          color="grey-9"
          :square="true"
          track-color="light-blue"
          class="q-ma-md"
          :bordered="false"
          :min="0"
          :max="500"
        />
        <h2 class="text-center">Jours</h2>
      </div>
      <div class="col">
        <q-circular-progress
          :value="hours"
          :size="cardSize"
          show-value
          :thickness="0.22"
          color="grey-9"
          :square="true"
          track-color="light-blue"
          class="q-ma-md"
          :bordered="false"
          :min="0"
          :max="24"
        />
        <h2 class="text-center">Heures</h2>
      </div>
      <div class="col">
        <q-circular-progress
          :value="minutes"
          :size="cardSize"
          show-value
          :thickness="0.22"
          color="grey-9"
          :square="true"
          track-color="light-blue"
          class="q-ma-md"
          :bordered="false"
          :min="0"
          :max="60"
        />
        <h2 class="text-center">Minutes</h2>
      </div>
      <div class="col">
        <q-circular-progress
          :value="seconds"
          :size="cardSize"
          show-value
          :thickness="0.22"
          color="grey-9"
          :square="true"
          track-color="light-blue"
          class="q-ma-md"
          :bordered="false"
          :min="0"
          :max="60"
        />
        <h2 class="text-center">Secondes</h2>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";

export default {
  name: "Home",
  components: {},
  methods: {
    dateDiff(date_future, date_now) {
      // get total seconds between the times
      var delta = Math.abs(date_future - date_now) / 1000;
      var daysPerMonth = 365 / 12;
      // calculate (and subtract) whole months
      var month = Math.floor(delta / (86400 * daysPerMonth));
      delta -= month * 86400;

      // calculate (and subtract) whole days
      var days = Math.floor((delta / 86400) - (month * daysPerMonth));
      delta -= days * 86400;

      // calculate (and subtract) whole hours
      var hours = Math.floor(delta / 3600) % 24;
      delta -= hours * 3600;

      // calculate (and subtract) whole minutes
      var minutes = Math.floor(delta / 60) % 60;
      delta -= minutes * 60;

      // what's left is seconds
      var seconds = Math.floor(delta % 60); // in theory the modulus is not required
      return {
        sec: seconds,
        min: minutes,
        hour: hours,
        day: days,
        month: month
      }
    },
  },
  mounted() {
    this.cardSize = this.$refs.myCol.offsetWidth - 50 + "px";
    setInterval(() => {
      let endDate = new Date(2023, 6, 15),
        now = new Date(),
        dateDiff = this.dateDiff(endDate, now);

      this.seconds = dateDiff.sec;
      this.minutes = dateDiff.min;
      this.hours = dateDiff.hour;
      this.days = dateDiff.day;
      this.month = dateDiff.month;
    }, 500);
  },
  data() {
    return {
      cardSize: "0",
      month: 0,
      days: 0,
      hours: 0,
      minutes: 0,
      seconds: 0,
    };
  },
};
</script>
