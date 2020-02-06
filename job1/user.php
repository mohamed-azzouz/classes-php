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
				return $_SESSION['momo'];
				var_dump($_SESSION['momo']);
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
			$update = "UPDATE user SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login ='$this->login'" ;
			$queryUpdate = mysqli_query($connexion,$update) ;
			echo $update;

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

		public function getAllInfos()
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$selectUser = "SELECT * FROM user WHERE login ='$this->login'";
			$querySelect = mysqli_query($connexion,$selectUser);
			$resultSelect = mysqli_fetch_assoc($querySelect);

			var_dump($resultSelect) ;
		}

		public function getLogin()
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$selectLogin = "SELECT login FROM user WHERE login ='$this->login'";
			$queryLogin = mysqli_query($connexion,$selectLogin);
			$resultLogin = mysqli_fetch_assoc($queryLogin);

			var_dump($resultLogin) ;
		}

		public function getEmail()
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$selectEmail = "SELECT email FROM user WHERE login ='$this->login'";
			$queryEmail = mysqli_query($connexion,$selectEmail);
			$resultEmail = mysqli_fetch_assoc($queryEmail);

			var_dump($resultEmail) ;
		}

		public function getFirstname()
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$selectFirstname = "SELECT firstname FROM user WHERE login ='$this->login'";
			$queryFirstname = mysqli_query($connexion,$selectFirstname);
			$resultFirstname = mysqli_fetch_assoc($queryFirstname);

			var_dump($resultFirstname) ;
		}

		public function getLastname()
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$selectLastname = "SELECT lastname FROM user WHERE login ='$this->login'";
			$queryLastname = mysqli_query($connexion,$selectLastname);
			$resultLastname = mysqli_fetch_assoc($queryLastname);

			var_dump($resultLastname) ;
		}

		public function refresh()
		{
			$connexion = mysqli_connect("localhost","root","","poo_test");
			$selectUser = "SELECT * FROM user WHERE login ='$this->login'";
			$querySelect = mysqli_query($connexion,$selectUser);
			$resultSelect = mysqli_fetch_assoc($querySelect);

			$this->login = $resultSelect['login'] ;
			$this->password = $resultSelect['password'] ;
			$this->email = $resultSelect['email'] ;
			$this->firstname = $resultSelect['firstname'] ;
			$this->lastname = $resultSelect['lastname'] ;

		}

		
	}

	session_start();

	$user = new user();

	#$user->register('PAUL','mohamed.azzouz@laplateforme.io','SERGE','POMMM','TITI') ;

	$user->connect('Serge','serge') ;

	$user->disconnect();

	$user->delete() ;

	$user->update('Serge','serge@laplateforme.io','serge','serge','serge') ;

	$test = $user->isConnected();
		

	$user->getAllInfos();

	$user->getLogin() ;
	$user->getEmail() ;
	$user->getFirstname() ;
	$user->getLastName() ;

	$user->refresh();

?>