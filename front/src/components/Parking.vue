<template>
  <div class="q-pa-md">
    <h1 class="text-center">O&ugrave; se garer ?</h1>
    <section>
        <h3>Parkings relais + Tram</h3>
        <p>
            Le réseau de transports en commun de Clermont-Ferrand est gratuit le week-end et les jours fériés. Les parkings relais et de proximité sont donc tous gratuit.
            Le station de tram desservant la mairie de Clermont-Ferrand est l'arrêt "Hôtel de ville".
        </p>
        <p>Nous vous encourageons fortement à privilégier cette solution.</p>
        <div class="row">
            <div class="col">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1TPprSYwCjRVckl-SxvMMEgsa0fogx3o&ehbc=2E312F" :width="iframe" height="480"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-h6 text-center">Direction La Pardieu - Gare</p>
                <q-list>
                    <q-item v-for="(item, index) in pardieu.values">
                        <q-item-section avatar>
                            <q-avatar :size="size" :color="pardieu.color" :text-color="pardieu.text">{{ index + 1 }}</q-avatar>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>{{ item.nom }}</q-item-label>
                            <q-item-label caption>Arrêt : {{ item.arret }} - Temps de trajet : {{ item.duration }}min - Places : {{ item.place }}</q-item-label>
                        </q-item-section>
                    </q-item>
                </q-list>
            </div>
            <div class="col">
                <p class="text-h6 text-center">Direction Les Vergnes</p>
                <q-list>
                    <q-item v-for="(item, index) in vergnes.values">
                        <q-item-section avatar>
                            <q-avatar :size="size" :color="vergnes.color" :text-color="vergnes.text">{{ index + 1 }}</q-avatar>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label>{{ item.nom }}</q-item-label>
                            <q-item-label caption>Arrêt : {{ item.arret }} - Temps de trajet : {{ item.duration }}min - Places : {{ item.place }}</q-item-label>
                        </q-item-section>
                    </q-item>
                </q-list>
            </div>
        </div>
    </section>
    <section>
      <h3>Parkings autour de la Mairie et de l'église</h3>
      <div ref="mapContainer" class="row">
        <div class="col">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=15X2bPnMotmziUOHqkCDrJzeuQNBF7C4&ehbc=2E312F" :width="iframe" height="480"></iframe>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <p class="text-h6 text-center">Parking en surface</p>
          <q-list>
            <q-item v-for="(item, index) in surface.values">
                <q-item-section avatar>
                    <q-avatar :size="size" :color="surface.color" :text-color="surface.text">{{ index + 1 }}</q-avatar>
                </q-item-section>
                <q-item-section>
                    <q-item-label>{{ item.text }}</q-item-label>
                    <q-item-label caption>{{ item.caption }}</q-item-label>
                </q-item-section>
            </q-item>
          </q-list>
          <p class="text-caption">Il est possible de payer le stationnement de surface via l'application PrestoPark</p>
        </div>
        <div class="col">
            <p class="text-h6 text-center">Parking en surface</p>
            <q-list>
                <q-item v-for="(item, index) in underground.values">
                    <q-item-section avatar>
                        <q-avatar :size="size" :color="underground.color" :text-color="underground.text">{{ index + 1 }}</q-avatar>
                    </q-item-section>
                    <q-item-section>
                        <q-item-label>{{ item.text }}</q-item-label>
                    <q-item-label caption>{{ item.caption }}</q-item-label>
                    </q-item-section>
                </q-item>
            </q-list>
        </div>
      </div>
      <h3>Réception</h3>
    </section>
  </div>
</template>
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
        pardieu: {
            color: "blue-10",
            text: "white",
            values: [
                { nom: "Henri Dunant", arret: "CHU G. Montpied", place: "550", duration: "11"},
                { nom: "Margeride", arret: "Margeride", place: "110", duration: "21"},
                { nom: "La Pardieu", arret: "La Pardieu Gare", place: "120", duration: "25"},
            ],
        },
        vergnes: {
            color: "light-green-5",
            text: "white",
            values: [
                { nom: "Les Pistes", arret: "Les Pistes", place: "400", duration: "14"}
            ],
        },
        surface: {
            color: "red",
            text: "white",
            values: [
                { text: "Mairie", caption: "1.50€ la 1ère heure. 3.00€ les 2 heures" },
                { text: "Ecole Edgar Quinet", caption: "0.90€ la 1ère heure. 1.80€ les 2 heures" },
                { text: "Place des Bughes", caption: "0.50€ la 1ère heure. 0.60€ les 2 heures" },
                { text: "Palais de Justice", caption: "1.50€ la 1ère heure. 3.00€ les 2 heures" },
                { text: "Place d'Espagne", caption: "0.90€ la 1ère heure. 1.80€ les 2 heures" },
            ]
        },
        underground: {
            color: "yellow",
            text: "white",
            values: [
                { text: "Cathédrale", caption: "1.40€ la 1ère heure. 3.10€ les 2 heures" },
                { text: "Blaise Pascal", caption: "1.50€ la 1ère heure. 3.10€ les 2 heures" },
                { text: "Vercingetorix", caption: "1.50€ la 1ère heure. 3.10€ les 2 heures" },
                { text: "Centre Jaude", caption: "1.50€ la 1ère heure. 3.10€ les 2 heures" },
                { text: "Saint-Pierre", caption: "1.50€ la 1ère heure. 3.10€ les 2 heures" }
            ]
        }
    }
  },
};
</script>
