<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Model;

use \W\Model\Model;
use \PDO;

/**
 * Description of MessagesModel
 *
 * @author Etudiant
 */
class MessagesModel extends Model {
    //put your code here
    
    /*
     * Cette fonction sélectionne tous les messages d'un salon en les associant
     * avec les infos de leur utilisateur respectif
     * @param int $id_salon l'id du salon dont on souhaite réupérer les messages
     * @return array la liste des messges avec les infos utilisateurs
     * 
     */
    public function searchAllwithUserInfos($idSalon){
        $query = "SELECT * FROM $this->table JOIN utilisateurs on $this->table.id_utilisateur = utilisateurs.id WHERE id_salon = :id_salon";
        
        $stmt = $this->dbh->prepare($query);
        $stmt->bindValue('id_salon',  $idSalon, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
