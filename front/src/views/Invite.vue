<template>
  <div id="invite" class="q-pa-md">
      <q-form>
        <p :class="textClass + ' row'">
            <div class="col">
                Qui sera là ?
            </div>
            <div class="col">
                <q-btn-toggle
                    v-model="invite.size"
                    spread
                    no-caps
                    :toggle-color="colorUI"
                    color="white"
                    text-color="black"
                    :options="sizeValues"
                />
            </div>
        </p>
        <div class="row">
            <div class="col q-pa-xs">
                <q-input
                    v-model="invite.nom"
                    label="Nom"
                />
            </div>
            <div class="col q-pa-xs">
                <q-input
                    v-model="invite.prenom"
                    label="Prénom"
                />
            </div>
        </div>
        <p :class="fullClass" >Quel est son régime alimentaire ?</p>
        <div class="row">
            <div class="col q-pa-xs">
                <q-btn-toggle
                    v-model="invite.regime"
                    spread
                    no-caps
                    :toggle-color="colorUI"
                    color="white"
                    text-color="black"
                    :options="regimeValues"
                />
            </div>
        </div>
        <p :class="fullClass + ' row'">
            <div class="col">
                Des allergies/intolérances alimentaires ?
            </div>
            <div class="col">
                <q-btn-toggle
                    v-model="showAllergie"
                    spread
                    no-caps
                    :toggle-color="colorUI"
                    color="white"
                    text-color="black"
                    :options="[
                        {label: 'OUI', value: true},
                        {label: 'NON', value: false}
                    ]"
                />
            </div>
        </p>
        <div class="row" v-if="showAllergie">
            <div class="col q-pa-xs">
                <q-input
                    v-model="invite.allergie"
                    type="textarea"
                />
            </div>
        </div>
        <p :class="fullClass + ' row'">
            <div class="col">
                Personne à mobilité réduite ?
            </div>
            <div class="col">
                <q-btn-toggle
                    v-model="invite.pmr"
                    spread
                    no-caps
                    :toggle-color="colorUI"
                    color="white"
                    text-color="black"
                    :options="[
                        {label: 'OUI', value: true},
                        {label: 'NON', value: false}
                    ]"
                />
            </div>
        </p>
        <div :class="classSpace">
            <q-btn-group spread>
                <q-btn :color="colorUI" label="Ajouter un invité" @click="addOne" icon="add" />
                <q-btn :color="colorUI" label="Terminer et envoyer" icon="email" />
            </q-btn-group>
        </div>
        <q-table
            title="Invités déjà saisis"
            dense
            :class="fullClass"
            :rows="listeInvite"
            :columns="columnInvite"
            row-key="name"
            hide-bottom
        />
    </q-form>
  </div>
</template>

<script>
import { ref } from "vue";

export default {
  name: "Invite",
  components: {
  },
  methods: {
    addOne() {
        this.listeInvite.push(this.invite);
        this.initInvite();
    },
    initInvite() {
        this.invite = {
            nom: "",
            prenom: "",
            size: "adulte",
            regime: "omni",
            allergie: "",
            pmr: false
        };
    }
  },
  computed: {
    fullClass() {
        return this.textClass + " " + this.classSpace;
    }
  },
  data() {
    return {
        colorUI: "primary",
        textClass: "text-h5",
        classSpace: "q-mt-md",
        showAllergie: false,
        invite: {},
        columnInvite: [
            { 
                name: "size", 
                label: "", 
                field: "size",
                format: val => {
                    return this.sizeValues.find(elem => elem.value == val).label
                },
                width: "20%",
                align: "left"
            },
            { 
                name: "nom", 
                label: "Nom", 
                field: "nom",
                width: "20%",
                align: "left"
            },
            { 
                name: "prenom", 
                label: "Prénom", 
                field: "prenom",
                width: "20%",
                align: "left"
            },
            { 
                name: "regime", 
                label: "Régime alimentaire", 
                field: "regime",
                format: val => {
                    return this.regimeValues.find(elem => elem.value == val).label
                },
                width: "20%",
                align: "left"
            },
            { 
                name: "allergie", 
                label: "Allergie/Intolérance", 
                field: "allergie",
                width: "20%",
                align: "left"
            },
            { 
                name: "pmr", 
                label: "PMR", 
                field: "pmr",
                format: val => val ? "Oui" : "Non",
                width: "20%",
                align: "left"
            },
        ],
        regimeValues: [
            {label: 'Omnivore', value: 'omni'},
            {label: 'Végétarien', value: 'vege'},
            {label: 'Vegan', value: 'vegan'},
        ],
        sizeValues: [
            {label: "Adulte", value: "adulte"},
            {label: "Enfant", value: "child"},
        ],
        listeInvite: [
            {
                nom: "Derodit",
                prenom: "Thibaut",
                size: "adulte",
                regime: "omni",
                allergie: "les bananes",
                pmr: false
            },
            {
                nom: "Bellanger",
                prenom: "Pauline",
                size: "adulte",
                regime: "vege",
                allergie: "les oignons, les poivrons",
                pmr: true
            },
        ]
    }
  },
  mounted() {
    this.initInvite();
  }
};
</script>
