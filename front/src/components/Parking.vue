<template>
  <div class="q-pa-md">
    <h1 class="text-center">O&ugrave; se garer ?</h1>
    <section>
      <h3>Mairie et église</h3>
      <div ref="mapContainer" class="row">
        <div class="col">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=15X2bPnMotmziUOHqkCDrJzeuQNBF7C4&ehbc=2E312F" :width="iframe" height="480"></iframe>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <h6 class="text-center">Parking en surface</h6>
          <q-list>
            <q-item v-for="(item, index) in surface.values">
                <q-item-section avatar>
                    <q-avatar :size="size" :color="surface.color" :text-color="surface.text">{{ index + 1 }}</q-avatar>
                </q-item-section>
                <q-item-section>
                    <q-item-label>{{ item }}</q-item-label>
                </q-item-section>
            </q-item>
          </q-list>
        </div>
        <div class="col">
            <h6 class="text-center">Parking en surface</h6>
            <q-list>
                <q-item v-for="(item, index) in underground.values">
                    <q-item-section avatar>
                        <q-avatar :size="size" :color="underground.color" :text-color="underground.text">{{ index + 1 }}</q-avatar>
                    </q-item-section>
                    <q-item-section>
                        <q-item-label>{{ item }}</q-item-label>
                    </q-item-section>
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
  components: {
    
  },
  mounted() {
    this.iframe = this.$refs.mapContainer.offsetWidth - 50 + "px";
  },
  data() {
    return {
        iframe: 0,
        size: "md",
        surface: {
            color: "red",
            text: "white",
            values: [
                "Mairie",
                "Ecole Edgar Quinet",
                "Place des Bughes",
                "Palais de Justice"
            ]
        },
        underground: {
            color: "yellow",
            text: "white",
            values: [
                "Cathédrale",
                "Blaise Pascal",
                "Vercingetorix",
                "Centre Jaude",
                "Saint-Pierre"
            ]
        }
    }
  },
};
</script>
