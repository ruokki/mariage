<template>
  <q-layout view="hHh lpR fFf">
    <q-header class="bg-blue-10">
      <q-toolbar>
        <!-- Mobile -->
        <q-btn flat round dense icon="menu" class="lt-md" @click="leftDrawerOpen = true" />
        <q-toolbar-title class="lt-md text-center">
          Pauline et Thibaut
        </q-toolbar-title>
        
        <!-- Desktop -->
        <q-toolbar-title class="gt-sm">
          Pauline et Thibaut
        </q-toolbar-title>
        <q-tabs
          shrink
          indicator-color="yellow-14"
          active-color="white"
          class="gt-sm text-grey-5"
          v-model="activeTab"
          @click="goTo()"
        >
          <q-tab v-for="item in menu" :name="item.name" :label="item.label" @click="tab = item.name" />
        </q-tabs>
      </q-toolbar>
    </q-header>

    <q-drawer v-model="leftDrawerOpen" side="left" behavior="mobile" bordered @hide="goTo()">
      <q-tabs
          shrink
          active-bg-color="blue-10"
          indicator-color="yellow-14"
          active-color="white"
          switch-indicator
          vertical
          class="text-black"
          v-model="activeTab"
          @click="goTo()"
        >
          <q-tab v-for="item in menu" :name="item.name" :label="item.label" @click="tab = item.name" />
        </q-tabs>
    </q-drawer>

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
      this.leftDrawerOpen = false;

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
      leftDrawerOpen: false,
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
          name: "sleep",
          label: "Se loger"
        },
        {
          name: "parking",
          label: "Se garer"
        },
        {
          name: "contact",
          label: "Nous Contacter"
        },
        {
          name: "invite",
          label: "Je viens !"
        },
      ],
      tab: "home"
    }
  },

  setup () { }
}
</script>
