<template>
  <div id="sleep" class="q-pa-md">
    <h1 class="text-center gt-sm">Se loger</h1>
    <h2 class="text-center lt-md">Se loger</h2>

    <section>
        <div ref="mapContainer" class="row">
            <div class="col">
                <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1qNPyRP338nC95sAvpfHpX8lGgwxqpbI&ehbc=2E312F" :width="iframe" :height="heightIframe"></iframe>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-h6 text-center">Gîtes et Maisons d'hôte</p>
                <q-list>
                    <q-item v-for="(item, index) in gites.values" :class="itemClass">
                        <q-item-section avatar :class="sectionClass">
                            <q-avatar :size="size" :color="gites.color" :text-color="gites.text">{{ index + 1 }}</q-avatar>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label><a :href="item.url">{{ item.nom }}</a></q-item-label>
                            <q-item-label caption>Prix : {{ item.prix }}€/nuit - Maximum : {{ item.personne }} personnes</q-item-label>
                        </q-item-section>
                    </q-item>
                </q-list>
            </div>
            <div class="col">
                <p class="text-h6 text-center">Hôtels</p>
                <q-list>
                    <q-item v-for="(item, index) in hotel.values" :class="itemClass">
                        <q-item-section avatar :class="sectionClass">
                            <q-avatar :size="size" :color="hotel.color" :text-color="hotel.text">{{ index + 1 }}</q-avatar>
                        </q-item-section>
                        <q-item-section>
                            <q-item-label><a :href="item.url">{{ item.nom }}</a></q-item-label>
                            <q-item-label caption>Prix : {{ item.prix }}€/nuit</q-item-label>
                        </q-item-section>
                    </q-item>
                </q-list>
            </div>
        </div>
    </section>
  </div>
</template>
<script>
import { ref } from "vue";
import { useQuasar } from "quasar";

export default {
  name: "Sleep",
  components: {
    
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
  mounted() {
    this.iframe = this.$refs.mapContainer.offsetWidth + "px";

    let thos = this;
    window.addEventListener("resize", () => {
      thos.iframe = thos.$refs.mapContainer.offsetWidth + "px";
    });
  },
  data() {
    return {
        iframe: 0,
        heightIframe: 480,
        size: "md",
        gites: {
            color: "red",
            text: "white",
            values: [
                { nom: "La Belle Époque", prix: "90", personne: "5", url: "https://www.gites-de-france.com/fr/auvergne-rhone-alpes/puy-de-dome/la-belle-epoque-63g300707"},
                { nom: "Altamica", prix: "90", personne: "6", url: "https://www.gites-de-france.com/fr/auvergne-rhone-alpes/puy-de-dome/altamica-63g300605"},
                { nom: "Clos Beaumont", prix: "110", personne: "10", url: "https://www.gites-de-france.com/fr/auvergne-rhone-alpes/puy-de-dome/clos-beaumont-63g300667"},
                { nom: "Le Clos Fleuri", prix: "65", personne: "4", url: "https://www.gites-de-france.com/fr/auvergne-rhone-alpes/puy-de-dome/le-clos-fleuri-63g300053"},
                { nom: "Tour Richelieu", prix: "70", personne: "14", url: "https://www.gites-de-france.com/fr/auvergne-rhone-alpes/puy-de-dome/tour-richelieu-63g300227"},
                { nom: "L'enclos de Ribains", prix: "132", personne: "6", url: "https://lenclosderibains.com/", prec: "Maison d'hôte qui dispose aussi d'un gîte pour 6 personnes"},
            ]
        },
        hotel: {
            color: "blue-10",
            text: "white",
            values: [
                { nom: "Hôtel du Midi", prix: "65", url: "https://cournonhoteldumidi.fr/"},
                { nom: "Le Gergovie", prix: "89", url: "https://www.hotel-legergovie.com/fr/"},
                { nom: "The Originals Hotel City", prix: "53", url: "https://www.theoriginalshotels-clermont.com/"},
                { nom: "B&B Hotel", prix: "54", url: "https://www.hotel-bb.com/fr/hotel/clermont-ferrand-sud-aubiere"},
                { nom: "Residhome", prix: "54", url: "https://www.myresidhome.com/clermont-ferrand/residhome-gergovia/apparthotel-residence-hoteliere.html"},
                { nom: "ComfortHotel", prix: "56", url: "https://www.choicehotels.com/fr-fr/france/clermont-ferrand/comfort-inn-hotels/fr494?checkInDate=2022-09-12&checkOutDate=2022-09-13"},
                { nom: "Le Lion", prix: "86", url: "https://www.hotel-le-lion-clermont.fr/fr/suites--chambres.html"},
            ]
        },
    }
  },
};
</script>
