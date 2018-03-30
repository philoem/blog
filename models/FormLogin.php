<?php
/**
 * class FormLogin
 * Génère le formulaire pour se connecter 
 */
class FormLogin {

    /**
     * @var array données utilisées pour le formulaire
     */
    private $data;

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
        
        return '<input type="text" class="form-control" name="'. $pseudo .'" id="exampleInputPseudo" aria-describedby="prenomHelp">';
    }

    /**
     * @param string $password
     * @return contenu du 2ème champs input qui est le mot de passe
     */
    public function inputPassword($password) {
		
        return '<input type="password" class="form-control" name="'. $password .'" id="exampleInputPassword" >';
    }

    /**
     * @param string $remember
     * @return contenu du 3ème champs input qui est la checkbox "se souvenir de moi"
     */
    public function checkbox($remember) {
       
        return '<input type="checkbox" class="form-check-input" name="'. $remember .'" id="exampleCheck1">';
    }
    
    /**
     * @return si le pseudo et le mot de passe existent dans la base de donnée, l'utilisateur peut se connecter
     */	
	public function submit() {
        
        return '<button type="submit" class="btn btn-primary" name="submit_login">Se connecter</button>';
	}

}