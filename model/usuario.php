<?php
	session_start();
	require_once('accessDB.php');
	//	Modelo del elemento Usuario
	class Usuario {
	    protected $user;
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

	    public static function check($us,$pw){
	    	$pdo =  new PDO ('mysql:host=localhost;dbname=lared','root','') or die("Error de conexion.");
	    	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   		$sql = "SELECT * FROM usuarios WHERE usuario = '" . $us .  "' AND password = md5('" . $pw  ."')";
	  		$consulta = $pdo->query($sql);
			$rows = $consulta->rowCount();
			$registro = $consulta->fetch();
			 if ($rows == 1) {
			 	$_SESSION['usuario-validado'] = $us;
			 	$_SESSION['idusuario'] = $registro['idusuario'];
			 	header('Location: ../view/index.php');
				return true;
			 }else{
			 	$_SESSION['fail'] = true;
			 	header('Location: ../view/index.php');
			 	return false;
			 }
	    }


	    public function insertarUsuario($datos){

	    	$pdo =  new PDO ('mysql:host=localhost;dbname=lared','root','') or die("Error de conexion.");
	    	$sql = "INSERT INTO usuarios(usuario, password, nombre, email) VALUES ('" . $datos['user'] . "',md5('" . $datos['pass'] . "'),'" . $datos['nombre'] . "','" . $datos['mail'] . "')";
	    	
	    	$consulta = $pdo->exec($sql);
	    	
	    	if ($consulta) {
	    		print("Insertado.");
	    	}else{
	    		print("Error Insertando!!!!!!!!!");
	    	}
	    }
	}

	?>

