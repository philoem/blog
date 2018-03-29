<?php

class FormUserComments {

    private $data;

	public function __construct($data = array()) {
        
        $this->data = $data;
	}

	public function label($name = [], $commentary = []) {
        
        return '<label for="exampleInputPseudo">'. $name .'</label>';
        return '<label for="exampleFormControlTextarea1">'. $commentary .'</label>';
        
	}

	public function inputName($name) {
        
        return '<input type="text" class="form-control" name="'. $name .'" id="exampleInputPseudo" aria-describedby="prenomHelp">';
            
    }

    public function inputCommentary($commentary) {
		
        return '<textarea class="form-control" name="'. $commentary .'" id="exampleFormControlTextarea1" rows="20"></textarea>';
        
    }

    	
	public function submit() {
        
        return '<button type="submit" class="btn btn-primary" name="submit_commentary">Envoyez votre commentaire</button>';
    }
    
    public function erase() {
        
        return '<button type="reset" class="btn btn-danger">Tout effacer</button>';
    }

}