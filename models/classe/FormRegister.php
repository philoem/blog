<?php
namespace Forteroche;
/**
 * class FormRegister enfante de Form
 * Génère le formulaire de la page register.php pour s'inscrire
 */
class FormRegister extends Form {

	/**
     * @param array $prenom
     * @param array $nom
     * @param array $pseudo
	 * @param array $mail
	 * @param array $mail_confirm
	 * @param array $passwordRegister
	 * @param array $confirmPasswordRegister
     * @return la dénomination du 1er champs input du formulaire
     * @return la dénomination du 2ème champs input du formulaire
     * @return la dénomination du 3ème champs input du formulaire
	 * @return la dénomination du 4ème champs input du formulaire
	 * @return la dénomination du 5ème champs input du formulaire
	 * @return la dénomination du 6ème champs input du formulaire
	 * @return la dénomination du 7ème champs input du formulaire
     */
	public function label($prenom =[], $nom = [], $pseudo = [], $mail = [], $mail_confirm = [], $passwordRegister = [], $confirmPasswordRegister = []) {
		return '<label for="exampleInputPrenom1">'. $prenom .'</label>';
		return '<label for="exampleInputNom">'. $nom .'</label>';
		return '<label for="exampleInputPrenom">'. $pseudo .'</label>';
		return '<label for="exampleInputEmail1">'. $mail .'</label>';
		return '<label for="exampleInputEmail2">'. $mail_confirm .'</label>';
		return '<label for="exampleInputPassword">'. $passwordRegister .'</label>';
		return '<label for="exampleInputPasswordConfirm">'. $confirmPasswordRegister .'</label>';
	}

	/**
     * @param string $prenom
     * @return contenu du 1er champs input qui est le prenom
     */
	public function inputPrenom(string $prenom) {
		
		return '<input type="text" class="form-control" id="exampleInputPrenom1" aria-describedby="prenomHelp" name="'. $prenom .'">';
		
	}

	/**
     * @param string $nom
     * @return contenu du 2ème champs input qui est le nom
     */
	public function inputNom($nom) {
		
		return '<input type="text" class="form-control" name="'. $nom .'" id="exampleInputNom">';
	}

	/**
     * @param string $pseudo
     * @return contenu du 3ème champs input qui est le pseudo
     */
	public function inputPseudo($pseudo) {
		
		return '<input type="text" class="form-control" name="'. $pseudo .'" id="exampleInputPrenom" aria-describedby="prenomHelp">';
	}

	/**
     * @param string $mail
     * @return contenu du 4ème champs input qui est le mail
     */
	public function inputMail($mail) {
	
		return '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="'. $mail .'">';
	}

	/**
     * @param string $mail_confirm
     * @return contenu du 5ème champs input qui est la confirmation du mail pour la vérification
     */
	public function inputConfirmMail($mail_confirm) {
		
		return '<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="'. $mail_confirm .'">';
	}

	/**
     * @param string $passwordRegister
     * @return contenu du 6ème champs input qui est le mot de passe
     */
	public function inputPassword($passwordRegister) {
		
		return '<input type="password" class="form-control" name="'. $passwordRegister .'" id="exampleInputPassword" >';
	}

	/**
     * @param string $confirmPasswordRegister
     * @return contenu du 7ème champs input qui est la vérification du mot de passe
     */
	public function inputConfirmPassword($confirmPasswordRegister) {
		
		return '<input type="password" class="form-control" name="'. $confirmPasswordRegister .'" id="exampleInputPasswordConfirm">';
	}

	/**
     * @return envoie les données du formulaire dans la base de données
     */	
	public function submit(): string {
		return '<button type="submit" class="btn btn-primary" name="submit_register">Validez votre inscription</button>';
	}
	

}	