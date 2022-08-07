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
          v-model="activeTab"
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
      document.getElementById(this.activeTab).scrollIntoView({
        behavior: "smooth",
        block: "start",
        inline: "start"
      });
    }
  },

  data() {
    return {
      activeTab: "home"
    }
  },

  setup () {
    return {
      
    }
  }
}
</script>
