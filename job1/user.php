<?php
	
	

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

				
				$this->login = $resultSelect['login'] ;
				$this->password = $resultSelect['password'] ;
				$this->email = $resultSelect['email'] ;
				$this->firstname = $resultSelect['firstname'] ;
				$this->lastname = $resultSelect['lastname'] ;
				$_SESSION['momo'] = $this;

				echo "Vous etes co<br />";
			}
			else
			{
				echo "Mauvais log <br />" ;
			}
		}

		public function disconnect()
		{
			session_unset();
			session_destroy();

			$this->login = null;
			$this->password = null;
			$this->email = null;
			$this->firstname = null;
			$this->lastname = null;

			echo "Vous etes deco <br />";
		}

		public function delete()
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$requeteDelete = "DELETE FROM user WHERE login = '$this->login'";
			$queryDelete = mysqli_query($connexion,$requeteDelete) ;

			$this->disconnect();
			echo "ON TA SUPPRIME <br />";
		}

		public function update($login,$email,$firstname,$lastname,$password)
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$update = "UPDATE user SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login =".$_SESSION['login']." " ;
			$queryUpdate = mysqli_query($connexion,$update) ;

			echo "MODIF FAITE";
		}

		public function isConnected()
		{
			if (isset($_SESSION['momo'])) 
			{
				return true ;

			}
			else
			{
				return false;

			}
		}

		
	}

	session_start();

	$user = new user();

	$user->register('PAUL','mohamed.azzouz@laplateforme.io','SERGE','POMMM','TITI') ;

	$user->connect('PAUL','TITI') ;

	$user->disconnect();

	#$user->delete() ;

	#$user->update('Luffy','luffy.Katakuri@laplateforme.io','MonkeyD','Omaewa','LOP') ;

	$test = $user->isConnected();
	var_dump($test);	

?>