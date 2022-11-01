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
                var_dump('test');
            }
        }
        else {

        }
    }

    /**
     * Fonction de création de la base de données
     */
    public function buildDB() {

        $model = model(ForgeModel::class);
        $result = $model->ForgeDB();
        return view('db_ok', [ 'db' => $result]);
    }
}
