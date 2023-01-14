<?php
    $responses = file('./result/invites.csv');
    $datas = [];

    foreach($responses as $idx => $line) {
        $line = trim($line);
        if($idx > 0) {
            $tmp = explode('|', $line);
            array_push($datas, [
                'nom' => $tmp[0],
                'prenom' => $tmp[1],
                'size' => $tmp[2],
                'pmr' => $tmp[3],
                'regime' => $tmp[4],
                'allergie' => $tmp[5],
                'sunday' => $tmp[6]
            ]);
        }
    }

    usort($datas, 'sorting');

    function sorting($a, $b) {
        $valA = strtolower($a['nom']);
        $valB = strtolower($b['nom']);

        if($valA == $valB) return 0;
        return ($valA < $valB) ? -1 : 1;
    }

?>
<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Réponses des invités</title>
        <link rel="icon" type="image/x-icon" href="./favicon.ico">

        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/quasar@2.11.4/dist/quasar.prod.css" rel="stylesheet" type="text/css">
        <!--<link rel="stylesheet" href="style.css">-->
        <!--<script src="script.js"></script>-->
    </head>
    <body>
        <div id="q-app">
            <q-table title="Réponses des invités" dense :rows="listeInvite" :columns="columnInvite"
                    row-key="name" hide-bottom :pagination="pagination">
                    <template v-slot:body="props">
                        <q-tr :props="props">
                            <q-td key="size" :props="props">{{ formatSize(props.row.size) }}</q-td>
                            <q-td key="nom" :props="props">{{ props.row.nom }}</q-td>
                            <q-td key="prenom" :props="props">{{ props.row.prenom }}</q-td>
                            <q-td key="regime" :props="props">{{ formatRegime(props.row.regime) }}</q-td>
                            <q-td key="allergie" :props="props">{{ props.row.allergie }}</q-td>
                            <q-td key="pmr" :props="props">{{ formatPMR(props.row.pmr) }}</q-td>
                            <q-td key="sunday" :props="props">{{ formatPMR(props.row.sunday) }}</q-td>
                        </q-tr>
                    </template>
                </q-table>

                <q-dialog v-model="askPass" persistent>
                    <q-card>
                        <q-card-section>
                            <q-input v-model="password" 
                                outlined 
                                type="password" 
                                label="Mot de passe" 
                                error-message="Mot de passe incorrect"
                                :error="pwdError"
                            />
                        </q-card-section>

                        <q-card-actions>
                            <q-btn label="Valider" color="blue" class="full-width" @click="checkPwd" />
                        </q-card-actions>
                    </q-card>
                </q-dialog>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quasar@2.11.4/dist/quasar.umd.prod.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/quasar@2.11.4/dist/lang/fr.umd.prod.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/core.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/md5.js"></script>

        <script>
            /*
            Example kicking off the UI. Obviously, adapt this to your specific needs.
            Assumes you have a <div id="q-app"></div> in your <body> above
        */
        const app = Vue.createApp({
            data() {
                return {
                    // Affichage de la modal pour saisir le mot de passe
                    askPass: true,
                    // Mot de passe saisie
                    password: "",
                    // Mot de passe en erreur
                    pwdError: false,
                    originalData: <?= json_encode($datas); ?>,
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
                            align: "left",
                            sortable: true
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
                            align: "left",
                            sortable: true
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
                            align: "left",
                            sortable: true
                        },
                        {
                            name: "sunday",
                            label: "Présent le dimanche",
                            field: "sunday",
                            sortable: true
                        },
                    ],
                }
            },
            computed: {
                listeInvite() {
                    if(this.askPass) return [];
                    return this.originalData;
                }
            },
            methods: {
                formatSize(val) {
                    return this.sizeValues.find(elem => elem.value == val).label
                },
                formatRegime(val) {
                    return this.regimeValues.find(elem => elem.value == val).label
                },
                formatPMR(val) {
                    return val ? "Oui" : "Non";
                },
                checkPwd() {
                    if(CryptoJS.MD5(this.password) == "90921a02cb1bfb381e9665c8e22a9d06") this.askPass = false;
                    else {
                        this.pwdError = true;
                        let thos = this;
                        setTimeout(() => thos.pwdError = false, 3000);
                    }
                }
            },
            setup () {
                return {};
            }
        });

        app.use(Quasar);
        Quasar.lang.set(Quasar.lang.fr);
        app.mount('#q-app');
        </script>
    </body>
</html>