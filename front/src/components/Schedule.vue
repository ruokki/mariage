<template>
  <div id="schedule" class="q-pa-md">
    <h1 class="text-center">Déroulé de la journée</h1>
    <q-timeline color="secondary">
      <q-timeline-entry
        subtitle="14h00"
      >
        <template v-slot:title>
            Cérémonie à la mairie
            <p class="location"><q-icon name="place" size="15px" /> Mairie de Clermont-Ferrand, 10 Rue Philippe Marcombes, 63000 Clermont Ferrand</p>
        </template>
        <div>
          On vous attend à la mairie de Clermont-Ferrand pour débuter la journée la plus importante de notre vie ! La cérémonie débute à 14h00, nous vous attendons donc à partir de 13h00 afin de permettre à ceux qui veulent
          y assister d'entrer dans la salle des cérémonies. Nous vous recommandons de venir en tram. La mairie étant située en plein centre ville, le stationnement peut s'avérer compliqué.
          <br />
          Mais dieu merci, il y a un arrêt de tram au pied de la mairie. C'est l'arrêt "Hôtel de ville".
        </div>
      </q-timeline-entry>
      <q-timeline-entry
        subtitle="15h00"
      >
        <template v-slot:title>
            Cérémonie à l'église
            <p class="location"><q-icon name="place" size="15px" /> Église Saint Eutrope, 1 Place Saint-Eutrope, 63000 Clermont-Ferrand</p>
        </template>
        <div>
          La bénédiction aura lieu à l'église Saint-Eutrope. Elle est située à 10min à pied de la mairie, il n'y aura donc pas besoin d'utiliser la voiture pour y aller. 
          Elle sera officiée par le père Noël (le vrai).
          <p>
            Pour les personnes à mobilité réduite, nous prévoyons une navette afin de vous amener de la mairie à l'église (Clermont-Ferrand étant un peu valloné).
          </p>
        </div>
      </q-timeline-entry>
      <q-timeline-entry
        subtitle="18h00"
      >
        <template v-slot:title>
            Vin d'honneur et soirée
            <p class="location"><q-icon name="place" size="15px" /> Salle "L'Astragale", 63800 Cournon-d'Auvergne</p>
        </template>
        <div>
          Une fois toutes les cérémonies passées, nous nous retrouverons tous à Cournon-d'Auvergne afin de fêter comme il se doit cette grande étape de notre vie !
        </div>
      </q-timeline-entry>
    </q-timeline>
  </div>
</template>

<script>
export default {
  name: "Schedule",
  components: {},
};
</script>
<style lang="scss" scoped>
.location {
    font-size: 12px;
    margin-bottom: 8px;
    opacity: 0.6;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-weight: 700;
}
</style>