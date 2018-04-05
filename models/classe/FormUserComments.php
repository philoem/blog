<?php
namespace Forteroche;
/**
 * class FormUserComments enfante de Form
 * Génère le formulaire de la page userComments.php pour editer des commentaires
 */
class FormUserComments extends Form {

    /**
     * @param array $name_user
     * @param array $commentary
     * @return la dénomination du 1er champs input du formulaire
     * @return la dénomination du 2ème champs input du formulaire
     */
	public function labelUser($name_user = [], $commentary = []) {
        
        return '<label for="exampleInputPseudo">'. $name_user .'</label>';
        return '<label for="exampleFormControlTextarea1">'. $commentary .'</label>';
    }

    /**
     * @param string $name_user
     * @return contenu du 1er champs input qui est le nom du commentateur
     */
	public function inputName($name_user) {
        
        return '<input type="text" class="form-control" name="'. $name_user .'" id="exampleInputPseudo" aria-describedby="prenomHelp" required>';
    }

    /**
     * @param string $commentary
     * @return contenu du 2ème champs input qui est le commentaire
     */
    public function inputCommentary($commentary) {
		
        return '<textarea class="form-control" name="'. $commentary .'" id="exampleFormControlTextarea1" rows="20" required></textarea>';
    }

    /**
     * @param string $book_id
     * @return contenu caché qui va récupérer l'id du billet pour "accrocher" les commentaires dessus
     */
	public function inputHidden($book_id) {

        return '<input type="hidden" class="form-control" name="'. $book_id .'" id="exampleInputPseudo" aria-describedby="prenomHelp">';

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