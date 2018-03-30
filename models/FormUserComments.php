<?php

/**
 * class FormUserComments
 * Génère le formulaire pour editer des commentaires
 */
class FormUserComments {

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
     * @param array $name
     * @param array $commentary
     * @return la dénomination du 1er champs input du formulaire
     * @return la dénomination du 2ème champs input du formulaire
     */
	public function label($name = [], $commentary = []) {
        
        return '<label for="exampleInputPseudo">'. $name .'</label>';
        return '<label for="exampleFormControlTextarea1">'. $commentary .'</label>';
    }

    /**
     * @param string $name
     * @return contenu du 1er champs input qui est le nom du commentateur
     */
	public function inputName($name) {
        
        return '<input type="text" class="form-control" name="'. $name .'" id="exampleInputPseudo" aria-describedby="prenomHelp">';
    }

    /**
     * @param string $commentary
     * @return contenu du 2ème champs input qui est le commentaire
     */
    public function inputCommentary($commentary) {
		
        return '<textarea class="form-control" name="'. $commentary .'" id="exampleFormControlTextarea1" rows="20"></textarea>';
    }

    /**
     * @return envoie les données du formulaire dans la base de données
     */		
	public function submit() {
        
        return '<button type="submit" class="btn btn-primary" name="submit_commentary">Envoyez votre commentaire</button>';
    }
    
    /**
     * @return efface le contenu dans les champs du formulaire
     */
    public function erase() {
        
        return '<button type="reset" class="btn btn-danger">Tout effacer</button>';
    }

}