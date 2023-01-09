<template>
  <div id="parking" class="q-pa-md">
    <h1 class="text-center gt-sm">Se garer</h1>
    <h2 class="text-center lt-md">Se garer</h2>
    <section>
        <h3 class="text-center gt-sm">Parkings relais + Tram</h3>
        <h4 class="text-center lt-md">Parkings relais + Tram</h4>

        <p class="text-body1">
            Le réseau de transports en commun de Clermont-Ferrand est gratuit le week-end et les jours fériés. Les parkings relais et de proximité sont donc tous gratuit.
            La station de tram desservant la mairie de Clermont-Ferrand est l'arrêt "Hôtel de ville".
        </p>
        <p class="text-body1">Nous vous encourageons à privilégier cette solution. Elle est à la fois plus économique et plus écologique !</p>
        <div class="row">
            <div class="col">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1TPprSYwCjRVckl-SxvMMEgsa0fogx3o&ehbc=2E312F" :width="iframe" :height="heightIframe"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-h6 text-center">Direction Les Vergnes</p>
                <q-list>
                    <q-item v-for="(item, index) in pardieu.values" :class="itemClass">
                        <q-item-section avatar :class="sectionClass">
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
                <p class="text-h6 text-center">Direction La Pardieu - Gare</p>
                <q-list>
                    <q-item v-for="(item, index) in vergnes.values" :class="itemClass">
                        <q-item-section avatar :class="sectionClass">
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
        <h3 class="text-center gt-sm">Parkings autour de la Mairie et de l'église</h3>
        <h4 class="text-center lt-md">Parkings autour de la Mairie et de l'église</h4>
      <div ref="mapContainer" class="row">
        <div class="col">
          <iframe src="https://www.google.com/maps/d/u/0/embed?mid=15X2bPnMotmziUOHqkCDrJzeuQNBF7C4&ehbc=2E312F" :width="iframe" :height="heightIframe"></iframe>
        </div>
      </div>
      <div class="row">
        <div class="col">
            <p class="text-h6 text-center">Parkings en surface</p>
          <q-list>
            <q-item v-for="(item, index) in surface.values" :class="itemClass">
                <q-item-section avatar :class="sectionClass">
                    <q-avatar :size="size" :color="surface.color" :text-color="surface.text">{{ index + 1 }}</q-avatar>
                </q-item-section>
                <q-item-section>
                    <q-item-label>{{ item.text }}</q-item-label>
                    <q-item-label caption>{{ item.caption }}</q-item-label>
                </q-item-section>
            </q-item>
          </q-list>
        </div>
        <div class="col">
            <p class="text-h6 text-center">Parkings souterrains</p>
            <q-list>
                <q-item v-for="(item, index) in underground.values" :class="itemClass">
                    <q-item-section avatar :class="sectionClass">
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
      <div class="row">
        <div class="col">
            <p class="text-center text-body2 text-italic q-pa-none q-mb-none q-mt-md">Il est possible de payer le stationnement de surface via l'application PrestoPark</p>
        </div>
      </div>
    </section>
    <section>
      <h3>Réception</h3>
      <p class="text-body1">La salle "L'Astragale" dispose de son parking de plus de 200 places. Il n'y aura pas à chercher de place !</p>
      <div class="row">
        <div class="col">
            <iframe src="https://www.google.com/maps/d/u/0/embed?mid=14tAGZbzTaicC_R-rRapgf5DXS2gF0VA&ehbc=2E312F" :width="iframe" :height="heightIframe"></iframe>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import { ref } from "vue";
import { useQuasar } from "quasar";

export default {
  name: "Parking",
  components: {
    
  },
  mounted() {
    this.iframe = this.$refs.mapContainer.offsetWidth + "px";
  },
  computed: {
    itemClass() {
        if(this.$q.screen.lt.md) {
            return "column";
        }

        return "";
    },
    sectionClass() {
        if(this.$q.screen.lt.md) {
            return "items-center q-pb-sm";
        }

        return "";
    }
  },
  data() {
    return {
        iframe: 0,
        heightIframe: 480,
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
