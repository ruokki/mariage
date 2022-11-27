<?php

if(count($_POST) > 0) {
    $separator = '|';
    $file = './invites.csv';
    helper('filesystem');
    
    // Fichier inexistant, création de l'en-tête
    if(!file_exists($file)) {
        file_put_contents($file, implode($separator, [
            'Nom',
            'Prénom',
            'Adulte/Enfant',
            'Personne à mobilité réduite',
            'Régime alimentaire',
            'Allergies/Intolérances'
        ]) . PHP_EOL, FILE_APPEND);
    }
    
    $invites = $_POST['invites'];
    foreach($invites as $one) {
        $text = [
            $one['nom'],
            $one['prenom'],
            $one['size'],
            $one['pmr'] ? 'OUI' : 'NON',
            $one['regime'],
            $one['allergie']
        ];
        file_put_contents($file, implode($separator, $text) . PHP_EOL, FILE_APPEND);
    }
}