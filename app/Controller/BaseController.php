<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Controller;
use  \W\Controller\Controller;
use  Model\SalonsModel;

/**
 * Description of BaseController
 *
 * @author Etudiant
 */
class BaseController extends Controller {
    //put your code here
    
    
    /*
     * Ce champ va contenir l'engine de Plates qui va servir à afficher mes vues
     */
    protected $engine;
    
    public function __construct() {
        // Je fais appel à ma méthode__construct de la classe parente (Contoller)
        // Ce qui me permet de surcharger cette méthode et non de la rededinir entièrement.
  
        
        // je stocke dans la variable de class engine une intance de League\Plates\Engine alors que 
        // cette instance était créeer directement dans la méthode show() de controller.
        
        $this->engine = new \League\Plates\Engine (self::PATH_VIEWS);
        
        //charge nos extensions (nos fonctions personnalisées)
        $this->engine->loadExtension(new \W\View\Plates\PlatesExtensions());

	$app = getApp();
        $salonsModel = new SalonsModel();

	// Rend certaines données disponibles à tous les vues
	// accessible avec $w_user & $w_current_route dans les fichiers de vue
	$this->engine->addData(
			[
				'w_user' 		  => $this->getUser(),
				'w_current_route' => $app->getCurrentRoute(),
				'w_site_name'	  => $app->getConfig('site_name'),
                                'salons' => $salonsModel->findAll()
			]
		);
     
    }
    
    public function show($file, array $data = array()){
           // Retire l'éventuelle extension .php
        $file = str_replace('.php', '', $file);

        // Affiche le template
        echo $this->engine->render($file, $data);
        die();

    }
    /**
     *  Cette fonction sert à ajouter des données qui seront disponibles dans
     * toutes les vues fabriquées par $this->engine (donc par la base controlleur)
     * $this->addGlobalData (array('users' => $users));
     * @param array $datas
     */
    public function addGobalData(array $datas){
        $this->engine->addData($datas);
    }
}
