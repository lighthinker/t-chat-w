<?php

namespace Controller;

use \W\Controller\Controller;

use Model\SalonsModel;
use Model\MessagesModel;

class SalonController extends BaseController
{

	/**
	 * Cette action permet de voir la liste des messages d'un salon
         * @praram int $id l'id du salon dont je cherche à voir les messages
	 */
	public function seeSalon($id)
                   /*
             * On instancie le modele des salons de facon à recuperer les informations du
             * du salon dont l'id est $id (passé dans l'url)
             */
            
	{   
            $salonsModel = new SalonsModel();
            $salon = $salonsModel->find($id);
            
            
            /*
             * On instancie le modele des messages pour recuperer les messages du salon dont l'id est $îd
             */
            
            $messagesModel = new MessagesModel();

            /*
             * j'utilise une méthode propre au modele message qui permet de récuperer les messages avec les infos utilisateurs associés.
             */
            $messages= $messagesModel->searchAllWithUserInfos($id);
            $this->show('salons/see', array('salon'=> $salon, 'messages'=> $messages));
        }

}