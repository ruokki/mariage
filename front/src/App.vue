<template>
  <q-layout view="lHh Lpr lFf">
    <q-header>
      <q-toolbar>
        <q-toolbar-title>
          Pauline et Thibaut
        </q-toolbar-title>
        <q-tabs
          shrink
          indicator-color="transparent"
          active-color="white"
          class="text-grey-5"
          v-model="tab"
          @click="goTo()"
        >
          <q-tab name="home" label="Accueil" />
          <q-tab name="schedule" label="Déroulé" />
          <q-tab name="parking" label="Se garer" />
        </q-tabs>
      </q-toolbar>
    </q-header>

    <q-page-container>
      <router-view></router-view>
    </q-page-container>
  </q-layout>
</template>

<script>
import { ref } from 'vue'

export default {
  name: 'LayoutDefault',

  components: {
    
  },

  methods: {
    goTo() {
      if(this.$route.name === "invite") {
         this.$router.push('/');
         return;
      }

      document.getElementById(this.activeTab).scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
      });
    }
  },
  computed: {
    activeTab() {
      return this.$route.name == "invite" ? "" : this.tab;
    }
  },
  data() {
    return {
      menu: [
        {
          name: "home",
          label: "Accueil"
        },
        {
          name: "schedule",
          label: "Déroulé"
        },
        {
          name: "parking",
          label: "Se garer"
        },
      ],
      tab: "home"
    }
  },

  setup () {
    return {
      
    }
  }
}
</script>
