<template>
  <div class="q-pa-md">
    <!-- Desktop -->
    <div class="gt-sm">
      <h1 class="text-center">15 JUILLET 2023</h1>
      <div class="row">
        <div class="col" ref="desktopCol">
          <q-circular-progress
            :value="month"
            :size="cardSizeDesktop"
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
            :size="cardSizeDesktop"
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
            :size="cardSizeDesktop"
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
            :size="cardSizeDesktop"
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
            :size="cardSizeDesktop"
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
    <div class="lt-md">
      <h2 class="text-center">15 JUILLET 2023</h2>

      <div class="row">
        <div class="col" ref="dayCol">
          <q-circular-progress
            :value="month"
            :size="cardSizeMobileHigher"
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
            :size="cardSizeMobileHigher"
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
              :size="cardSizeMobileLower"
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
              :size="cardSizeMobileLower"
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
              :size="cardSizeMobileLower"
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
  </div>
</template>

<script>
import { ref } from "vue";
import { DateTime, Interval } from "luxon";

export default {
  name: "Timer",
  components: {},
  methods: {
  },
  mounted() {
    this.cardSizeDesktop = this.$refs.desktopCol.offsetWidth - this.padding + "px";
    this.cardSizeMobileHigher = this.$refs.dayCol.offsetWidth - this.padding + "px";
    this.cardSizeMobileLower = this.$refs.hourCol.offsetWidth - ( this.padding / 2 ) + "px";

    setInterval(() => {
      let dateMariage = DateTime.local(2023, 7, 15, 14),
          now = DateTime.now(),
          diff = dateMariage.diff(now, ["months", "days", "hours", "minutes", "seconds"])

      this.seconds = Math.floor(diff.seconds);
      this.minutes = Math.floor(diff.minutes);
      this.hours = Math.floor(diff.hours);
      this.days = Math.floor(diff.days);
      this.month = Math.floor(diff.months);
    }, 500);

    let thos = this;
    window.addEventListener("resize", () => {
      thos.cardSize = thos.$refs.desktopCol.offsetWidth - thos.padding + "px";
      thos.cardSizeMobileHigher = thos.$refs.dayCol.offsetWidth - thos.padding + "px";
      thos.cardSizeMobileLower = thos.$refs.hourCol.offsetWidth - (thos.padding / 2) + "px";
    });
  },
  data() {
    return {
      // Taille des cercles pour desktop
      cardSizeDesktop: "0",
      // Taille des cercles pour mobile (Mois, Jour)
      cardSizeMobileHigher: "0",
      // Taille des cercles pour mobile (Heure, Minutes, Secondes)
      cardSizeMobileLower: "0",
      // Padding pour les compteurs
      padding: 50,
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
