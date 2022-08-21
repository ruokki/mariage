<template>
    <div id="invite" class="q-pa-md">
        <q-form>
            <p :class="textClass + ' row'">
            <div class="col">
                Qui sera là ?
            </div>
            <div class="col">
                <q-btn-toggle v-model="invite.size" spread no-caps :toggle-color="colorUI" color="white"
                    text-color="black" :options="sizeValues" />
            </div>
            </p>
            <div class="row">
                <div class="col q-pa-xs">
                    <q-input v-model="invite.nom" label="Nom" />
                </div>
                <div class="col q-pa-xs">
                    <q-input v-model="invite.prenom" label="Prénom" />
                </div>
            </div>
            <p :class="fullClass">Quel est son régime alimentaire ?</p>
            <div class="row">
                <div class="col q-pa-xs">
                    <q-btn-toggle v-model="invite.regime" spread no-caps :toggle-color="colorUI" color="white"
                        text-color="black" :options="regimeValues" />
                </div>
            </div>
            <p :class="fullClass + ' row'">
            <div class="col">
                Des allergies/intolérances alimentaires ?
            </div>
            <div class="col">
                <q-btn-toggle v-model="showAllergie" spread no-caps :toggle-color="colorUI" color="white"
                    text-color="black" :options="[
                        { label: 'OUI', value: true },
                        { label: 'NON', value: false }
                    ]" />
            </div>
            </p>
            <div class="row" v-if="showAllergie">
                <div class="col q-pa-xs">
                    <q-input v-model="invite.allergie" type="textarea" />
                </div>
            </div>
            <p :class="fullClass + ' row'">
            <div class="col">
                Personne à mobilité réduite ?
            </div>
            <div class="col">
                <q-btn-toggle v-model="invite.pmr" spread no-caps :toggle-color="colorUI" color="white"
                    text-color="black" :options="[
                        { label: 'OUI', value: true },
                        { label: 'NON', value: false }
                    ]" />
            </div>
            </p>
            <div :class="classSpace">
                <q-btn-group spread v-if="edited != -1">
                    <q-btn :color="colorUI" label="Modifier" @click="addOne" icon="edit" />
                </q-btn-group>
                <q-btn-group spread v-else>
                    <q-btn :color="colorUI" label="Ajouter un invité" @click="addOne" icon="add" />
                    <q-btn :color="colorUI" label="Terminer et envoyer" icon="email" />
                </q-btn-group>
            </div>
            <q-table title="Invités déjà saisis" dense :class="fullClass" :rows="listeInvite" :columns="columnInvite"
                row-key="name" hide-bottom>
                <template v-slot:body="props">
                    <q-tr :props="props">
                        <q-td key="size" :props="props">{{ formatSize(props.row.size) }}</q-td>
                        <q-td key="nom" :props="props">{{ props.row.nom }}</q-td>
                        <q-td key="prenom" :props="props">{{ props.row.prenom }}</q-td>
                        <q-td key="regime" :props="props">{{ formatRegime(props.row.regime) }}</q-td>
                        <q-td key="allergie" :props="props">{{ props.row.allergie }}</q-td>
                        <q-td key="pmr" :props="props">{{ formatPMR(props.row.pmr) }}</q-td>
                        <q-td key="action" :props="props">
                            <q-btn round class="q-mr-sm" size="sm" :color="colorUI" icon="edit" @click="editInvite(props.rowIndex)">
                                <q-tooltip anchor="center left" self="center right" >Modifier</q-tooltip>
                            </q-btn>
                            <q-btn round size="sm" :color="colorUI" icon="delete" @click="deleteInvite(props.rowIndex)" >
                                <q-tooltip anchor="center left" self="center right" >Supprimer</q-tooltip>
                            </q-btn>
                        </q-td>
                    </q-tr>
                </template>
            </q-table>
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
            if(this.edited == -1) {
                this.listeInvite.push(this.invite);
            }
            else {
                this.listeInvite[this.edited] = this.invite;
                this.edited = -1;
            }
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
        },
        formatSize(val) {
            return this.sizeValues.find(elem => elem.value == val).label
        },
        formatRegime(val) {
            return this.regimeValues.find(elem => elem.value == val).label
        },
        formatPMR(val) {
            return val ? "Oui" : "Non";
        },
        editInvite(idx) {
            this.edited = idx;
            this.invite = this.listeInvite[idx];
        },
        deleteInvite(idx) {
            this.listeInvite.splice(idx, 1);
        },
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
                    align: "left"
                },
                {
                    name: "nom",
                    label: "Nom",
                    field: "nom",
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
                    align: "left"
                },
                {
                    name: "allergie",
                    label: "Allergie/Intolérance",
                    field: "allergie",
                    align: "left"
                },
                {
                    name: "pmr",
                    label: "PMR",
                    field: "pmr",
                    align: "left"
                },
                {
                    name: "action",
                    label: "",
                    field: "",
                },
            ],
            regimeValues: [
                { label: 'Omnivore', value: 'omni' },
                { label: 'Végétarien', value: 'vege' },
                { label: 'Vegan', value: 'vegan' },
            ],
            sizeValues: [
                { label: "Adulte", value: "adulte" },
                { label: "Enfant", value: "child" },
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
            ],
            edited: -1
        }
    },
    mounted() {
        this.initInvite();
    }
};
</script>
