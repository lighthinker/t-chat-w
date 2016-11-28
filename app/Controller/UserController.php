<?php

namespace Controller;

use \W\Controller\Controller;
use Model\UtilisateursModel;

class UserController extends BaseController
{
// On crée une nouvelle action qui va servir a afficher la liste des utilisateurs
    public function listUsers(){
//        $usersList = array(
//            'Googleman', 'Pausewoman', 'Pauseman', 'Roland'
//        );
            $usersModel = new UtilisateursModel();
            
            $usersList = $usersModel->findAll();
            
            // La ligne  suivante affiche la vue présente dans app/Views/list.php
            // et y injecte le tableau $usersList sous un nouveau nom qui correspond à une clé : $listUsers
        
            $this->show('users/list', array('listUsers'=> $usersList));
    }

}