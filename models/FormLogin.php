<?php

class FormLogin {

    private $data;

	public function __construct($data = array()) {
        
        $this->data = $data;
	}

	public function label($pseudo = [], $password = [], $remember = []) {
        
        return '<label for="exampleInputPseudo">'. $pseudo .'</label>';
        return '<label for="exampleInputPassword">'. $password .'</label>';
        return '<label class="form-check-label" name="' . $remember .'" for="exampleCheck1">Se souvenir de moi</label>';
	}

	public function inputText($pseudo) {
        
        return '<input type="text" class="form-control" name="'. $pseudo .'" id="exampleInputPseudo" aria-describedby="prenomHelp">';
            
    }

    public function inputPassword($password) {
		
        return '<input type="password" class="form-control" name="'. $password .'" id="exampleInputPassword" >';
        
    }

    public function checkbox($remember) {
       
        return '<input type="checkbox" class="form-check-input" name="'. $remember .'" id="exampleCheck1">';
    }
	
	public function submit() {
        
        return '<button type="submit" class="btn btn-primary" name="submit_login">Se connecter</button>';
	}

}