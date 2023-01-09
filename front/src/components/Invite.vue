<template>
    <div id="invite" class="q-pa-md">
        <h1 class="text-center gt-sm">Je viens !</h1>
        <h2 class="text-center lt-md">Je viens !</h2>

        <p class="text-body1">Saisis ici toutes les personnes qui viendront au mariage (n'oublie pas de t'inclure aussi)</p>
        <q-form>
            <div class="row">
                <div class="col q-pa-xs">
                    <q-input v-model="invite.nom" label="Nom" />
                </div>
                <div class="col q-pa-xs">
                    <q-input v-model="invite.prenom" label="Prénom" />
                </div>
            </div>
            <div class="row">
                <div class="col q-pa-xs">
                    <q-btn-toggle v-model="invite.size" spread no-caps :toggle-color="colorUI" color="white"
                    text-color="black" :options="sizeValues" />
                </div>
            </div>
            <p :class="fullClass">Quel est son régime alimentaire ?</p>
            <div class="row">
                <div class="col q-pa-xs">
                    <q-btn-toggle v-model="invite.regime" spread no-caps :toggle-color="colorUI" color="white"
                        text-color="black" :options="regimeValues" />
                </div>
            </div>
            <p :class="fullClass + ' ' + direction">
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
            <p :class="fullClass + ' ' + direction">
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
                <q-btn-group spread v-if="modifying !== null">
                    <q-btn :color="colorUI" label="Modifier" @click="addOne" icon="edit" />
                </q-btn-group>
                <q-btn-group spread v-else>
                    <q-btn :color="colorUI" label="Ajouter un invité à la liste" @click="addOne" icon="add" />
                </q-btn-group>
            </div>

            <!-- Desktop -->
            <q-table title="On vient :" dense :class="fullClass" :rows="listeInvite" :columns="columnInvite"
                row-key="name" hide-bottom :pagination="pagination" v-if="$q.screen.gt.sm">
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

            <!-- Mobile -->
            <q-list bordered separator class="bg-white q-mt-sm" v-else>
                <q-toolbar :class="'bg-' + colorUI + ' text-white text-center'">
                    <q-toolbar-title>Liste des invités</q-toolbar-title>
                </q-toolbar>
                <q-item v-if="listeInvite.length > 0" v-for="(item, index) in listeInvite">
                    <q-item-section>
                        <q-item-label class="text-bold">{{ item.nom }} {{ item.prenom }}</q-item-label>
                        <q-item-label caption lines="1">{{ formatSize(item.size) }} - {{ formatRegime(item.regime) }}</q-item-label>
                        <q-item-label caption lines="1">Allergies/intolérances : <span class="text-bold">{{ item.allergie == "" ? "Oui" : "Non" }}</span></q-item-label>
                        <q-item-label caption lines="1">PMR : <span class="text-bold">{{ formatPMR(item.pmr) }}</span></q-item-label>
                        <q-item-label class="row q-mt-sm">
                            <div class="col text-center">
                                <q-icon round size="sm" name="edit" :color="colorUI" @click="editInvite(index)" />
                            </div>
                            <div class="col text-center">
                                <q-icon round size="sm" name="delete" :color="colorUI" @click="deleteInvite(index)" />
                            </div>
                        </q-item-label>
                    </q-item-section>
                </q-item>
                <q-item v-else>
                    <q-item-label>&nbsp;</q-item-label>
                </q-item>
            </q-list>

            <q-btn-group :class="fullClass + ' ' + direction" spread>
                <q-btn :color="colorUI" label="Terminer et envoyer" @click="send" icon="email" />
            </q-btn-group>
        </q-form>

        <q-dialog v-model="confirm" persistent>
            <q-card>
                <q-card-section class="row items-center">
                <q-avatar icon="question_mark" :color="colorUI" text-color="white" />
                <span class="q-ml-sm">Est ce qu'on ajoute {{invite.prenom}} {{invite.nom}} à la liste des invités ?</span>
                </q-card-section>

                <q-card-actions align="right">
                <q-btn flat label="Non" :color="colorUI" @click="send(true)" v-close-popup />
                <q-btn flat label="Oui" :color="colorUI" @click="addAndSend" v-close-popup />
                </q-card-actions>
            </q-card>
        </q-dialog>
        <q-dialog v-model="alertPositive" persistent @hide="clearInvite()">
            <q-card>
                <q-card-section>
                <div class="text-h6">Participation enregistrée !</div>
                </q-card-section>
                <q-card-section class="q-pt-none">
                    <p>Votre présence a bien été enregistrée !</p>
                    <p>En cas d'annulation, n'hésite pas à nous prévenir au 06.29.57.46.72 (Pauline) ou au 06.30.40.49.09 (Thibaut). </p>
                    <p>On ne t'en voudra pas ! (enfin pas trop)</p>
                </q-card-section>
                <q-card-actions align="right">
                <q-btn flat label="OK" :color="colorUI" v-close-popup />
                </q-card-actions>
            </q-card>
        </q-dialog>
        <q-dialog v-model="emptyInvite" persistent>
            <q-card>
                <q-card-section>
                <div class="text-h6">Il n'y a personne !</div>
                </q-card-section>
                <q-card-section class="q-pt-none">
                    <p>Aucun invité n'a été saisi !</p>
                </q-card-section>
                <q-card-actions align="right">
                <q-btn flat label="OK" :color="colorUI" v-close-popup />
                </q-card-actions>
            </q-card>
        </q-dialog>
    </div>
</template>
<script>
import { ref } from "vue";
import axios from 'axios';
import { useQuasar } from 'quasar';

export default {
    name: "Invite",
    components: {
    },
    methods: {
        addOne() {
            if(this.modifying == null) {
                this.listeInvite.push(this.invite);
            }
            else {
                this.modifying = null;
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
            this.showAllergie = false;
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
            this.invite = this.listeInvite[idx];
            this.modifying = this.listeInvite[idx];
            
            if(this.invite.allergie !== "") {
                this.showAllergie = true;
            }
            else {
                this.showAllergie = false;
            }
        },
        deleteInvite(idx) {
            this.listeInvite.splice(idx, 1);
            this.modifying = null;
        },
        addAndSend() {
            this.addOne();
            this.send();
        },
        send(reinit = false) {
            if(this.invite.nom !== "" || this.invite.prenom !== "") {
                this.confirm = true;
                return;
            }

            if(reinit == true) {
                this.initInvite();
            }

            if(this.modifying != null) {
                this.addOne();
            }

            if(this.listeInvite.length == 0) {
                this.emptyInvite = true;
            }
            else {
                var thos = this;
                axios.post("./ajax.php", {
                    cmd: "new",
                    invites: this.listeInvite
                })
                .then(data => {
                    thos.alertPositive = true;
                })
                .catch(() => {});
            }
        },
        clearInvite() {
            this.listeInvite = [];
            this.initInvite();
        }
    },
    computed: {
        fullClass() {
            return this.textClass + " " + this.classSpace;
        },
        direction() {
            return this.$q.screen.gt.sm ? "row" : "column";
        }
    },
    data() {
        return {
            alertPositive: false,
            emptyInvite: false,
            colorUI: "blue-10",
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
            pagination: {
                rowsPerPage: 40
            },
            regimeValues: [
                { label: 'Omnivore', value: 'omni' },
                { label: 'Végétarien', value: 'vege' },
                { label: 'Vegan', value: 'vegan' },
            ],
            sizeValues: [
                { label: "Adulte", value: "adulte" },
                { label: "Enfant", value: "child" },
            ],
            listeInvite: [],
            modifying: null,
            confirm: false
        }
    },
    mounted() {
        this.initInvite();
    }
};
</script>
