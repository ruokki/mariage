<template>
  <div class="q-pa-md">
    <!-- Desktop -->
    <div class="md">
      <h1 class="text-center">15 JUILLET 2023</h1>
      <div class="row">
        <div class="col" ref="myCol">
          <q-circular-progress
            :value="month"
            :size="cardSize"
            show-value
            :thickness="thick"
            :color="color"
            :center-color="center"
            :track-color="track"
            :square="true"
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
            :thickness="thick"
            :square="true"
            :color="color"
            :center-color="center"
            :track-color="track"
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
            :thickness="thick"
            :color="color"
            :center-color="center"
            :track-color="track"
            :square="true"
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
            :thickness="thick"
            :color="color"
            :center-color="center"
            :track-color="track"
            :square="true"
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
            :thickness="thick"
            :color="color"
            :center-color="center"
            :track-color="track"
            :square="true"
            class="q-ma-md"
            :bordered="false"
            :min="0"
            :max="60"
          />
          <h2 class="text-center">Secondes</h2>
        </div>
      </div>
    </div>

    <!-- Mobile -->
    <h2 class="text-center text-bold">15 JUILLET 2023</h2>

    <div class="row lt-md">
      <div class="col" ref="myCol">
        <q-circular-progress
          :value="month"
          :size="cardSize"
          show-value
          :thickness="thick"
          :color="color"
          :center-color="center"
          :track-color="track"
          :square="true"
          class="q-ma-md"
          :bordered="false"
          :min="0"
          :max="12"
        />
        <h6 class="text-center">Mois</h6>
      </div>
      <div class="col">
        <q-circular-progress
          :value="days"
          :size="cardSize"
          show-value
          :thickness="thick"
          :square="true"
          :color="color"
          :center-color="center"
          :track-color="track"
          class="q-ma-md"
          :bordered="false"
          :min="0"
          :max="500"
        />
        <h6 class="text-center">Jours</h6>
      </div>
    </div>
    <div class="row">
      <div class="col" ref="hourCol">
          <q-circular-progress
            :value="hours"
            :size="cardSizeMobile"
            show-value
            :thickness="thick"
            :color="color"
            :center-color="center"
            :track-color="track"
            :square="true"
            class="q-ma-md"
            :bordered="false"
            :min="0"
            :max="24"
          />
          <h6 class="text-center">Heures</h6>
        </div>
        <div class="col">
          <q-circular-progress
            :value="minutes"
            :size="cardSizeMobile"
            show-value
            :thickness="thick"
            :color="color"
            :center-color="center"
            :track-color="track"
            :square="true"
            class="q-ma-md"
            :bordered="false"
            :min="0"
            :max="60"
          />
          <h6 class="text-center">Minutes</h6>
        </div>
        <div class="col">
          <q-circular-progress
            :value="seconds"
            :size="cardSizeMobile"
            show-value
            :thickness="thick"
            :color="color"
            :center-color="center"
            :track-color="track"
            :square="true"
            class="q-ma-md"
            :bordered="false"
            :min="0"
            :max="60"
          />
          <h6 class="text-center">Secondes</h6>
        </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";

export default {
  name: "Timer",
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
    this.cardSizeMobile = this.$refs.hourCol.offsetWidth - 50 + "px";
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

    let thos = this;
    window.addEventListener("resize", () => {
      thos.cardSize = thos.$refs.myCol.offsetWidth - 50 + "px";
      thos.cardSizeMobile = thos.$refs.hourCol.offsetWidth - 50 + "px";
    });
  },
  data() {
    return {
      // Taille des cercles pour desktop (et Mois, Jours en mobile)
      cardSize: "0",
      // Taille des cercles pour mobile (Heure, Minutes, Secondes)
      cardSizeMobile: "0",
      month: 0,
      days: 0,
      hours: 0,
      minutes: 0,
      seconds: 0,
      color: "blue-10",
      track: "grey-3",
      thick: 0.3,
      center: "grey-3"
    };
  },
};
</script>
