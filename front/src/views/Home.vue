<template>
  <div class="q-pa-md">
    <Parking />
    <Timer />
    <Schedule />
  </div>
</template>

<script>
import { ref } from "vue";
import Timer from "../components/Timer.vue"
import Schedule from "../components/Schedule.vue"
import Parking from "../components/Parking.vue"

export default {
  name: "Home",
  components: {
    Timer,
    Schedule,
    Parking
  },
};
</script>
