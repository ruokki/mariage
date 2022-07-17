<template>
  <div class="q-pa-md">
    <Timer />
    <Schedule />
  </div>
</template>

<script>
import { ref } from "vue";
import Timer from "../components/Timer.vue"
import Schedule from "../components/Schedule.vue"

export default {
  name: "Home",
  components: {
    Timer,
    Schedule
  },
};
</script>
