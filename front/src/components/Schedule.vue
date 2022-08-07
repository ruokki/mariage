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
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </div>
      </q-timeline-entry>
      <q-timeline-entry
        subtitle="16h00"
      >
        <template v-slot:title>
            Cérémonie à l'église
            <p class="location"><q-icon name="place" size="15px" /> Église Saint Eutrope, 1 Place Saint-Eutrope, 63000 Clermont-Ferrand</p>
        </template>
        <div>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
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