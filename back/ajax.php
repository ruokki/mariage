<?php
$post = file_get_contents("php://input");
$post = json_decode($post, TRUE);

if(count($post) > 0) {
    $separator = '|';
    $file = './result/invites.csv';

    $emailBody = [
        "De nouvelles personnes se sont inscrites pour le mariage !"
    ];

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
    
    $invites = $post['invites'];
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

        array_push($emailBody, '         ' . $one['nom'] . ' ' . $one['prenom']);
    }

    mail(
        'fubautsu@gmail.com',
        'Nouveaux invites',
        implode(PHP_EOL, $emailBody)
    );
}