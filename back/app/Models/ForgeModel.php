<?php

namespace App\Models;

use CodeIgniter\Model;

class ForgeModel extends Model
{
    protected $table = 'tarace';

    public function ForgeDB() {
        $forge = \Config\Database::forge();

        $result = [];
        if($forge->createDatabase('mariage', TRUE)) {
            array_push($result, 'Base créée');
        }
        else {
            array_push($result, 'Base déjà existante');
        }

        $fields = [
            'invite_id' => [
                'type' => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'invite_nom' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'invite_prenom' => [
                'type' => 'VARCHAR',
                'constraint' => '200'
            ],
            'invite_regime' => [
                'type' => 'VARCHAR',
                'constraint' => '5'
            ],
            'invite_allergie' => [
                'type' => 'TEXT'
            ],
            'invite_pmr' => [
                'type' => 'BIT',
                'constraint' => '1'
            ],
        ];

        // Table déjà existante, on va vérifier qu'il y a tout les champs
        if($this->tableExists($this->table)) {
            array_push($result, 'Table déjà existante, vérification des champs');
            foreach($fields as $name => $data) {
                if($this->fieldExists($name, $this->table)) {
                    array_push($result, "Champ $name déjà existant");
                }
                else {
                    array_push($result, "Ajout du champ $name");
                    $forge->addColumn($this->table, [$name => $data]);
                }
            }
        }
        else {
            $forge->addPrimaryKey('invite_id');
            $forge->addField($fields);
            if($forge->createTable($this->table)) {
                array_push($result, 'Table créée');
            }
            else {
                array_push($result, 'Table déjà existante');
            }
        }

        return $result;
    }
}