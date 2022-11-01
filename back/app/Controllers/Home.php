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
                helper('filesystem');
                $invites = $this->request->getPost('invites');
                foreach($invites as $one) {
                    write_file('./invites.csv', implode('|', $one));
                }
            }
        }
        else {
            return view('test');
        }
    }
}
