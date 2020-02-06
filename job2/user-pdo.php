<?php
	
	

	class userpdo 
	{
		private $id =" ";
		public $login =" ";
		public $email =" ";
		public $firstname =" ";
		public $lastname =" ";


		public function register($login,$email,$firstname,$lastname,$password)
		{

        	$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
            $requete = "INSERT INTO userpdo  (login, email, firstname, lastname, password) VALUES ('$login','$email','$firstname','$lastname','$password')";

            $prepare = $pdo->prepare($requete) ;
            $prepare->execute();

            

			$selectUser = $pdo->query("SELECT * FROM userpdo WHERE login ='$login'");
			$resultat = $selectUser->fetch();
			
			
			return $resultat ;

		}

		public function connect($login,$password)
		{
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$selectUser = $pdo->query("SELECT * FROM userpdo WHERE login ='$login'");
			$result = $selectUser->fetch();
			

			if ($password == $result['password']) 
			{

				
				$this->login = $result['login'] ;
				$this->password = $result['password'] ;
				$this->email = $result['email'] ;
				$this->firstname = $result['firstname'] ;
				$this->lastname = $result['lastname'] ;
				$_SESSION['momo'] = $this;

				
				return $_SESSION['momo'];
				
			}
			else
			{
				
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

			
		}

		public function delete()
		{
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$requeteDelete = $pdo->query("DELETE FROM userpdo WHERE login = '$this->login'");
			

			$this->disconnect();
			
			
		}

		public function update($login,$email,$firstname,$lastname,$password)
		{
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$update =$pdo->query("UPDATE userpdo SET login = '$login', password = '$password', email = '$email', firstname = '$firstname', lastname = '$lastname' WHERE login ='$this->login'") ;

			var_dump($update);
		
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
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$selectUser =$pdo->query("SELECT * FROM userpdo WHERE login ='$this->login'");
			$resultUser = $selectUser->fetch();
			var_dump($resultUser);
			

			
		}

		public function getLogin()
		{
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$selectLogin = $pdo->query("SELECT login FROM userpdo WHERE login ='$this->login'");
			$resultLogin = $selectLogin->fetch();
			var_dump($resultLogin);
			

			
		}

		public function getEmail()
		{
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$selectEmail = $pdo->query("SELECT email FROM userpdo WHERE login ='$this->login'");
			$resultEmail = $selectEmail->fetch();
			var_dump($resultEmail);

			
		}

		public function getFirstname()
		{
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$selectFirstname = $pdo->query("SELECT firstname FROM userpdo WHERE login ='$this->login'");
			$resultFirstname = $selectFirstname->fetch();
			var_dump($resultFirstname);

			
		}

		public function getLastname()
		{
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$selectLastname = $pdo->query("SELECT lastname FROM userpdo WHERE login ='$this->login'")	;
			$resultLastname = $selectLastname->fetch();
			var_dump($resultLastname);

			
		}

		public function refresh()
		{
			$pdo = new PDO('mysql:host=localhost;dbname=poo_test', 'root', '');
			$selectUser =$pdo->query("SELECT * FROM userpdo WHERE login ='$this->login'");
			$resultUser = $selectUser->fetch();
			var_dump($resultUser);
			

			$this->login = $resultUser['login'] ;
			$this->password = $resultUser['password'] ;
			$this->email = $resultUser['email'] ;
			$this->firstname = $resultUser['firstname'] ;
			$this->lastname = $resultUser['lastname'] ;

		}

		
	}

	session_start();

	$userpdo = new userpdo();

	$userpdo->register('momo','mohamed.azzouz@laplateforme.io','momo','momo','momo') ;

	$userpdo->connect('lolo','lolo') ;

	#$userpdpo->disconnect();

	#$userpdo->delete() ;

	#$userpdo->update('lolo','lolo@laplateforme.io','lolo','lolo','lolo') ;

	#$test = $userpdo->isConnected();
		

	$userpdo->getAllInfos();

	$userpdo->getLogin() ;
	$userpdo->getEmail() ;
	$userpdo->getFirstname() ;
	$userpdo->getLastName() ;

	$userpdo->refresh();
?>