<template>
  <div id="home" class="q-pa-md">
    <Timer />
    <Schedule />
    <Sleep />
    <Parking />
    <Invite />
  </div>
</template>

<script>
import { ref } from "vue";
import Timer from "../components/Timer.vue"
import Schedule from "../components/Schedule.vue"
import Parking from "../components/Parking.vue"
import Sleep from "../components/Sleep.vue"
import Invite from "../components/Invite.vue"

export default {
  name: "Home",
  components: {
    Timer,
    Schedule,
    Parking,
    Sleep,
    Invite
  },
};
</script>
