<?php


class FormRegister {

	private $data;

	public function __construct($data = array()) {
		$this->data = $data;
	}

	public function label($prenom = [], $nom = [], $pseudo = [], $mail = [], $mail_confirm = [], $passwordRegister = [], $confirmPasswordRegister = []) {
		return '<label for="exampleInputPrenom1">'. $prenom .'</label>';
		return '<label for="exampleInputNom">'. $nom .'</label>';
		return '<label for="exampleInputPrenom">'. $pseudo .'</label>';
		return '<label for="exampleInputEmail1">'. $mail .'</label>';
		return '<label for="exampleInputEmail2">'. $mail_confirm .'</label>';
		return '<label for="exampleInputPassword">'. $passwordRegister .'</label>';
		return '<label for="exampleInputPasswordConfirm">'. $confirmPasswordRegister .'</label>';

	}

	public function inputPrenom($prenom) {
		
		return '<input type="text" class="form-control" id="exampleInputPrenom1" aria-describedby="prenomHelp" name="'. $prenom .'">';
	}

	public function inputNom($nom) {
		
		return '<input type="text" class="form-control" name="'. $nom .'" id="exampleInputNom">';
	}

	public function inputPseudo($pseudo) {
		
		return '<input type="text" class="form-control" name="'. $pseudo .'" id="exampleInputPrenom" aria-describedby="prenomHelp">';
	}

	public function inputMail($mail) {
	
		return '<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="'. $mail .'">';
	}

	public function inputConfirmMail($mail_confirm) {
		
		return '<input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="'. $mail_confirm .'">';
	}

	public function inputPassword($passwordRegister) {
		
		return '<input type="password" class="form-control" name="'. $passwordRegister .'" id="exampleInputPassword" >';
	}

	public function inputConfirmPassword($confirmPasswordRegister) {
		
		return '<input type="password" class="form-control" name="'. $confirmPasswordRegister .'" id="exampleInputPasswordConfirm"><br>';
	}

	
	public function submit() {
		return '<button type="submit" class="btn btn-primary" name="submit_register">Validez votre inscription</button>';
	}
	

}	