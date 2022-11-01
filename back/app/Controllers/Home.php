<?php

namespace App\Controllers;

use App\Models\ForgeModel;

class Home extends BaseController
{

    /**
     * Fonction pour gérer les appels à l'API 
     */
    public function index()
    {
        if($this->request->isAJAX()) {
            $cmd = $this->request->getPost('cmd');
            if($cmd == 'add') {
                $separator = '|';
                $file = './invites.csv';
                helper('filesystem');

                // Fichier inexistant, création de l'en-tête
                if(!file_exists($file)) {
                    write_file($file, implode($separator, [
                        'Nom',
                        'Prénom',
                        'Adulte/Enfant',
                        'Personne à mobilité réduite',
                        'Régime alimentaire',
                        'Allergies/Intolérances'
                    ]) . PHP_EOL);
                }

                $invites = $this->request->getPost('invites');
                foreach($invites as $one) {
                    $text = [
                        $one['nom'],
                        $one['prenom'],
                        $one['size'],
                        $one['pmr'] ? 'OUI' : 'NON',
                        $one['regime'],
                        $one['allergie']
                    ];
                    write_file($file, implode($separator, $text) . PHP_EOL, 'a');
                }
            }
        }
    }
}
