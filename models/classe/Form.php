<?php

namespace Forteroche;
/**
 * class FormLogin parente
 * Génère le formulaire de la page login.php pour se connecter 
 */
class Form {

    /**
     * @var array données utilisées pour le formulaire
     */
    protected $data;

    /**
     * @param array $data
     */
	public function __construct($data = array()) {
        
        $this->data = $data;
	}

    /**
     * @param array $pseudo
     * @param array $password
     * @param array $remember
     * @return la dénomination du 1er champs input du formulaire
     * @return la dénomination du 2ème champs input du formulaire
     * @return la dénomination du 3ème champs input du formulaire
     */
	public function label($pseudo = [], $password = [], $remember = []) {
        
        return '<label for="exampleInputPseudo">'. $pseudo .'</label>';
        return '<label for="exampleInputPassword">'. $password .'</label>';
        return '<label class="form-check-label" name="' . $remember .'" for="exampleCheck1">Se souvenir de moi</label>';
	}

    /**
     * @param string $pseudo
     * @return contenu du 1er champs input qui est le pseudo
     */
	public function inputText($pseudo) {
        
        return '<input type="text" class="form-control" name="'. $pseudo .'" id="exampleInputPseudo" aria-describedby="prenomHelp" required>';
    }

    /**
     * @param string $password
     * @return contenu du 2ème champs input qui est le mot de passe
     */
    public function inputPassword($password) {
		
        return '<input type="password" class="form-control" name="'. $password .'" id="exampleInputPassword" required>';
    }

    /**
     * @param string $remember
     * @return contenu du 3ème champs input qui est la checkbox "se souvenir de moi"
     */
    public function checkbox($remember) {
       
        return '<input type="checkbox" class="form-check-input" name="'. $remember .'" id="exampleCheck1">';
    }
    
    /**
     * @return si l'utilisateur n'est pas encore inscrit, il est redirigé vers la page register.php
     */	
    public function redirect() {
        
        return '<a href="register.php" class="btn btn-info" name="redirect_login" role="button">Cliquez ici pour vous inscrire</a>';
	}

    /**
     * @return si le pseudo et le mot de passe existent dans la base de donnée, l'utilisateur peut se connecter
     */	
	public function submit() {
        
        return '<button type="submit" class="btn btn-primary" name="submit_login">Se connecter</button>';
    }
    
    

}