<?php
	//session_start();
	require_once('accessDB.php');
	//	Modelo del elemento Usuario
	class Post {
	    protected $user;
	    protected $post;
	    protected $fecha;
	 
	    // Constructor
	    function __construct($datos){
	        $this->user = $datos['user'];
	        $this->pass = $datos['post'];
	        $this->nombre = $datos['fecha'];
	    }
	    
	    // Getters
	    public function getUser(){ return $this->user; }
	    public function getPost(){ return $this->post; }
	    public function getFecha(){ return $this->fecha; }

	    // Otros métodos

	    protected static function ejecutaConsulta($sql) {
	        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
	        $host = "mysql:host=localhost;dbname=lared";
	        $dbuser = 'root';
	        $dbpass = '';
	        $pdo = new PDO($host, $dbuser, $dbpass, $opciones);
	        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $resultado = null;
	        if (isset($pdo)) $resultado = $pdo->query($sql);
	        return $resultado;
	    }

	    public function insertarPost($datos){
	    	if ($datos['post'] == "" || $datos['post'] == null ) {
	    		return false;
	    	}else{
	    		$sql = "INSERT INTO posts(idusuario, post, fecha) VALUES (" . $datos['user'] . ",'" . $datos['post'] . "','" . $datos['fecha'] ."')";
		    	$consulta = self::ejecutaConsulta($sql);
		    	if ($consulta) {
		    		return true;
		    	}else{
		    		return false;
		    	}	
	    	}
	    	
	    }

	    public function mostrarPosts($idusuario){
	    	$sql = "SELECT * FROM posts p,usuarios u WHERE p.idusuario = " . $idusuario ." and p.idusuario = u.idusuario";
	 		$consulta = self::ejecutaConsulta($sql);
			$rows = $consulta->rowCount();
			$registros = $consulta->fetchAll();
			// Devuelve los posty el nombre de los amigos
			// SELECT u.nombre,p.post FROM usuarios u, posts p WHERE u.idusuario=p.idusuario AND u.idusuario IN (SELECT idamigo2 from amigos a, usuarios u WHERE u.idusuario = a.idamigo1) 
			 return $registros;
	    }
	    public function getFriendsPosts($idusuario){
	    	
	    	$sql = "SELECT u.*, p.*, a.* FROM usuarios u, posts p, amigos a WHERE a.idamigo1 = " . $idusuario ." and p.idusuario = a.idamigo2 AND u.idusuario = a.idamigo2";

	 		$consulta = self::ejecutaConsulta($sql);
			$rows = $consulta->rowCount();
			$postsAmigos = $consulta->fetchAll();
			return $postsAmigos;
	    }

	    public function getRecentPosts(){
	    	$sql = "SELECT p.post, u.usuario,u.idusuario,p.likes,p.idpost,p.fecha from posts p, usuarios u WHERE u.idusuario = p.idusuario ORDER BY p.idpost DESC LIMIT 3";
	 		$consulta = self::ejecutaConsulta($sql);
			$posts = $consulta->fetchAll();
			return $posts;
	    }

/*	    public function like($idpost){
	    	$sql = "UPDATE posts SET likes=likes+1 WHERE idpost = " . $idpost;
	    	$consulta = self::ejecutaConsulta($sql);
	    	if ($consulta) {
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }*/

	    public function like($idpost,$idusuario){

    	try {  
	    		$pdo =  new PDO ('mysql:host=localhost;dbname=lared','root','') or die("Error de conexion.");
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->beginTransaction();
				$pdo->exec("INSERT INTO likes VALUES (" . $idpost . "," . $idusuario . ")");
				$pdo->exec("UPDATE posts SET likes=likes+1 WHERE idpost = " . $idpost);
  				$pdo->commit();
  				return true;
				  
			}catch (Exception $e) {
				  $pdo->rollBack();
				  echo "Error en transaccion: " . $e->getMessage();
				  return false;
			}

	    }

	    public function topPost(){
			$sql2 = "SELECT p.post, u.usuario,u.idusuario,p.likes,p.idpost,p.fecha from posts p, usuarios u WHERE u.idusuario = p.idusuario ORDER BY p.likes DESC LIMIT 3";
	 		
	 		$consulta = self::ejecutaConsulta($sql2);
			$topPosts = $consulta->fetchAll();
			return $topPosts;
	    }

	    public function checkLike($idpost,$idusuario){

	    	$sql = "SELECT * FROM likes WHERE idpost=" . $idpost . " AND idusuario=" . $idusuario;
	
	 		$consulta = self::ejecutaConsulta($sql);
			$reg = $consulta->fetch();
			if ($reg == null) {
				return false;
			}else{
				return true;
			}
	    }

	    public function delete($idpost){
	    	$sql = "DELETE FROM posts WHERE idpost=" . $idpost;
	    	$resultado = self::ejecutaConsulta($sql);
	    	return true;
	    }
	    public function edit($idpost,$texto){
	    	$sql = "UPDATE posts SET post='" . $texto . "' WHERE idpost=" . $idpost;
	    	$resultado = self::ejecutaConsulta($sql);
	    	if ($resultado) {
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	}
	?>

