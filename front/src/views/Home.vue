<template>
  <div class="q-pa-md">
    <Timer />
  </div>
</template>

<script>
import { ref } from "vue";
import Timer from "../components/Timer.vue"

export default {
  name: "Home",
  components: {
    Timer
  },
};
</script>
