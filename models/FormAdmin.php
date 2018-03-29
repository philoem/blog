<?php

class FormAdmin {

    private $data;

	public function __construct($data = array()) {
        
        $this->data = $data;
	}

	public function label($title = [], $content = []) {
        
        return '<label for="exampleInputPseudo">'. $title .'</label>';
        return '<label for="exampleFormControlTextarea1">'. $content .'</label>';
        
	}

	public function inputTitle($title) {
        
        return '<input type="text" class="form-control" name="'. $title .'" id="exampleInputPseudo" aria-describedby="prenomHelp">';
            
    }

    public function inputBillet($billet) {
		
        return '<textarea class="form-control" name="'. $billet .'" id="exampleFormControlTextarea1" rows="20"></textarea>';
        
    }

    	
	public function submit() {
        
        return '<button type="submit" class="btn btn-primary" name="submit_login">Créez votre billet</button>';
    }
    
    public function erase() {
        
        return '<button type="reset" class="btn btn-danger">Tout effacer</button>';
    }

}