<?php
/**
 * class FormAdmin
 * Génère le formulaire pour la création de nouveaux billets
 */
class FormAdmin {
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
     * @param array $title
     * @param array $content
     * @return la dénomination du 1er champs input du formulaire
     * @return la dénomination du 2ème champs input du formulaire
     */
	public function label($title = [], $content = []) {
        
        return '<label for="exampleInputPseudo">'. $title .'</label>';
        return '<label for="exampleFormControlTextarea1">'. $content .'</label>';
    }

    /**
     * @param string $title
     * @return contenu du 1er champs input qui est le titre
     */
	public function inputTitle($title) {
        
        return '<input type="text" class="form-control" name="'. $title .'" id="exampleInputPseudo" aria-describedby="prenomHelp">';
    }

    /**
     * @param string $billet
     * @return contenu du 2ème champs input qui est le titre
     */
    public function inputBillet($billet) {
		
        return '<textarea class="form-control" name="'. $billet .'" id="exampleFormControlTextarea1" rows="20"></textarea>';
    }

    /**
     * @return envoie les données du formulaires dans la base de données
     */	
	public function submit() {
        
        return '<button type="submit" class="btn btn-primary" name="submit_login">Créez votre billet</button>';
    }
    
    /**
     * @return efface le contenu dans les champs du formulaire
     */	
    public function erase() {
        
        return '<button type="reset" class="btn btn-danger">Tout effacer</button>';
    }

}
