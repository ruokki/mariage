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
        >
          <q-route-tab name="home" label="Accueil" to="/" />
          <q-route-tab name="infos" label="Informations" to="Infos" />
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

  setup () {
    return {
      
    }
  }
}
</script>
