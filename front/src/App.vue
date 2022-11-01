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
          <q-tab v-for="item in menu" :name="item.name" :label="item.label" @click="tab = item.name" />
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
          name: "sleep",
          label: "Se loger"
        },
        {
          name: "parking",
          label: "Se garer"
        },
        {
          name: "invite",
          label: "Je viens !"
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
