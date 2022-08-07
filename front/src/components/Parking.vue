<template>
  <div class="q-pa-md">
    <h1 class="text-center">O&ugrave; se garer ?</h1>
    <section>
      <h3>Mairie et église</h3>
      <div class="row">
        <div class="col">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=15X2bPnMotmziUOHqkCDrJzeuQNBF7C4&ehbc=2E312F" width="640" height="480"></iframe>
        </div>
        <div class="col">
          <q-list bordered>
            <q-item clickable v-ripple>
              <q-item-section avatar>
                <q-icon color="primary" name="bluetooth" />
              </q-item-section>

              <q-item-section>Icon as avatar</q-item-section>
            </q-item>
          </q-list>
        </div>
      </div>
      <h3>Réception</h3>
    </section>
  </div>
</template>
<style scoped>
#map {
  width: 400px;
  height: 400px;
  border: 1px solid red;
}
</style>
<script>
import { ref } from "vue";

export default {
  name: "Parking",
  components: {},
  mounted() {},
  data() {},
};
</script>
