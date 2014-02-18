<?php
	require_once('accessDB.php');
	//	Modelo del elemento Usuario
	class Usuario {
/*	    protected $user;
	    protected $pass;
	    protected $nombre;
	    protected $mail;
	    
	    // Constructor
	    function __construct($datos){
	        $this->user = $datos['user'];
	        $this->pass = $datos['pass'];
	        $this->nombre = $datos['nombre'];
	        $this->mail = $datos['mail'];
	    }
	    
	    // Getters
	    public function getUser(){ return $this->user; }
	    public function getPass(){ return $this->pass; }
	    public function getNombre(){ return $this->nombre; }
	    public function getMail(){ return $this->mail; }

	    // Otros métodos
*/
	

	    public static function check($us,$pw){
	    	print("Dentro del check ");
	    	print($us . $pw);
	  //   	print("Principio");
	  //   	$pdo =  new PDO ('mysql:host=localhost;dbname=lared','root','') or die("Error de conexion.");
	  //  		$sql = "SELECT * FROM usuarios WHERE usuario = '" . $us ."' AND password = '" . $pw . "'";
	  // 		$consulta = $pdo->query($sql);
	  // 		print($sql);
			//  $rows = $consulta->rowCount();
			//  if ($rows == 1) {
			//  	$_SESSION['usuario-validado'] = $user;
			//  	header('Location: index.php');
			// 	print("in");
			// 	return true;
			//  }else{
			//  	print("out");
			//  }

			// print("Final");
	    	
	    }

/*
    public function connectDB(){
	    	$pdo =  new PDO ($host, $userDB, $passDB) or die("Error de conexion.");
	    }


	    public function insertarUsuario($datos){
	    	$sql = "INSERT INTO usuarios(usuario, password, nombre, email) VALUES ('" . $datos['user'] . "','" . $datos['user'] . "','" . $datos['user'] . "','" . $datos['user'] . "')";
	    }*/
	}

	?>

