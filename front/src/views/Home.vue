<template>
  <div id="home" class="q-pa-md bg-grey-3">
    <Timer />
    <Schedule />
    <Sleep />
    <Parking />
    <Contact />
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
import Contact from "../components/Contact.vue"

export default {
  name: "Home",
  components: {
    Timer,
    Schedule,
    Parking,
    Sleep,
    Invite,
    Contact
  },
};
</script>
