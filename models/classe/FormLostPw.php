<?php

namespace Forteroche;
/**
 * class FormAdmin enfante de Form
 * Génère le formulaire de la page admin.php pour la création de nouveaux billets
 */
class FormLostPW extends Form {
       
    /**
     * @param array $mailRecup
     * @return la dénomination du 1er champs input du formulaire
    */
	public function labelTitle($mailRecup) {
        
        return '<label for="exampleInputEmail1">'. $mailRecup .'</label>';
       
    }

    /**
     * @param string $mailRecup
     * @return contenu du 1er champs input qui est le mail
     */
	public function inputMail($mailRecup) {
        
        return '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="'. $mailRecup .'" autofocus required>';
    }

    
    /**
     * @return envoie les données du formulaires dans la base de données
     */	
	public function submit() {
        
        return '<button type="submit" class="btn btn-primary" name="submit_lost_pw">Envoyer votre mail</button>';
    }
    
    /**
     * @return efface le contenu dans les champs du formulaire
     */	
    public function erase() {
        
        return '<button type="reset" class="btn btn-danger">Effacer</button>';
    }

}
