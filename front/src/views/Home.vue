<template>
  <div id="home" class="q-pa-md">
    <Timer />
    <Schedule />
    <Parking />
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
