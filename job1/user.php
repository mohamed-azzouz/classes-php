<?php
	
	session_start();

	class user 
	{
		private $id =" ";
		public $login =" ";
		public $email =" ";
		public $firstname =" ";
		public $lastname =" ";


		public function register($login,$email,$firstname,$lastname,$password)
		{
			
			$connexion = mysqli_connect("localhost","root","","poo_test");

			$newUser = "INSERT INTO user (login,email,firstname,lastname,password) VALUES ('$login','$email','$firstname','$lastname','$password')";
			$queryNewUser = mysqli_query($connexion, $newUser);

			

			$selectUser = "SELECT * FROM user WHERE login ='$login'";
			$querySelect = mysqli_query($connexion,$selectUser);
			$resultSelect = mysqli_fetch_all($querySelect);


			var_dump($resultSelect) ;
			return $resultSelect ;

		}

		public function connect($login,$password)
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$selectUser = "SELECT * FROM user WHERE login ='$login'";
			$querySelect = mysqli_query($connexion,$selectUser);
			$resultSelect = mysqli_fetch_assoc($querySelect);

			if ($password == $resultSelect['password']) 
			{
				$_SESSION['login'] = $login ;
				$_SESSION['password]'] = $password ;

				$this->login = $resultSelect['login'] ;
				$this->password = $resultSelect['password'] ;
				$this->email = $resultSelect['email'] ;
				$this->firstname = $resultSelect['firstname'] ;
				$this->lastname = $resultSelect['lastname'] ;

				echo "T CO FREROT \o/ ";
			}
			else
			{
				echo "T PAS CO MON POTE" ;
			}
		}

		
	}

	$user = new user();

	#$user->register('Katakuri','mohamed.azzouz@laplateforme.io','Azzouz','Mohamed','Kata') ;

	$user->connect('Katakuri','Kata') ;
	

?>