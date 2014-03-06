<?php if(!isset($_SESSION)){ session_start(); }  
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


	    public static function check($us,$pw){
	   		$sql = "SELECT * FROM usuarios WHERE usuario = '" . $us .  "' AND password = md5('" . $pw  ."')";
	  		$consulta = self::ejecutaConsulta($sql);
			$rows = $consulta->rowCount();
			$registro = $consulta->fetch();
			 if ($rows == 1) {
			 	$_SESSION['usuario-validado'] = $us;
			 	$_SESSION['idusuario'] = $registro['idusuario'];
			 	print("WOWOWOWO:" . $_SESSION['usuario-validado']);
			 	print($us);
			 	header('Location: ../view/index.php');
				return true;
			 }else{
			 	$_SESSION['fail'] = $us;
			 	//header('Location: ../view/index.php');
			 	return false;
			 }
	    }


	    public function insertarUsuario($datos){
	    	$sql = "INSERT INTO usuarios(usuario, password, nombre, email) VALUES ('" . $datos['user'] . "',md5('" . $datos['pass'] . "'),'" . $datos['nombre'] . "','" . $datos['mail'] . "')";
	    	$consulta = self::ejecutaConsulta($sql);
	    	if ($consulta) {
	    		return true;
	    	}else{
	    		return false;
	    	}
	    }

	    public function getMyInfo($idusuario){
	    	$sql = "SELECT * FROM usuarios WHERE idusuario =" . $idusuario;
	    	$consulta = self::ejecutaConsulta($sql);
	    	$row = $consulta->fetch();
	    	return $row;
	    }

	    public function getMisAmigos($id){
	    	
	    	$sql = "SELECT usuario,idusuario FROM usuarios WHERE idusuario IN (SELECT idamigo2 FROM amigos WHERE idamigo1 = " . $id . ")";
	    	$consulta = self::ejecutaConsulta($sql);
	    	$rows = $consulta->fetchAll();
	    	return $rows;
	    }

	    public function addFriend($id,$idamigo){
	    	try {  
	    		$pdo =  new PDO ('mysql:host=localhost;dbname=lared','root','') or die("Error de conexion.");
				$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$pdo->beginTransaction();
				$pdo->exec("INSERT INTO amigos VALUES (" . $id . "," . $idamigo . ",false)");
				$pdo->exec("INSERT INTO amigos VALUES (" . $idamigo . "," . $id . ",false)");
  				$pdo->commit();
  				header("Location: ../view/index.php");
				  
			}catch (Exception $e) {
				  $pdo->rollBack();
				  echo "Error en transaccion: " . $e->getMessage();
			}
	    }

	    public function isFriend($id,$idamigo){
	    	$sql = "SELECT * FROM amigos WHERE idamigo1 = " . $id . " AND idamigo2 = " . $idamigo;
	    	$consulta = self::ejecutaConsulta($sql);
	    	$rows = $consulta->fetchAll();
	    	$resultado = (count($rows) > 0) ? true : false;
	    	return $resultado;
	    }

	    public function uploadImage($idusuario){
	    	//comprobamos si ha ocurrido un error.
			if ( ! isset($_FILES["imagen"]) || $_FILES["imagen"]["error"] > 0){
			    echo "ha ocurrido un error";
			} else {
			    //ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
			    //y que el tamano del archivo no exceda los 16mb
			    $permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			    $limite_kb = 16384; //16mb es el limite de medium blob
			     
			    if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
			            $host = "mysql:host=localhost;dbname=lared";
			            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			            $dbuser = 'root';
			            $dbpass = '';
			            $pdo = new PDO($host, $dbuser, $dbpass, $opciones);
			            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			            $resultado = null;
			            $sql = "SELECT * FROM imagenes WHERE idusuario=" . $idusuario;
			            if (isset($pdo)) $resultado = $pdo->query($sql);
			            $rows = count($resultado);
			            if ($resultado) {
			                $sql2 = "DELETE FROM imagenes WHERE idusuario=" . $idusuario;
			                 $pdo->exec($sql2);
			            }

			            //este es el archivo temporal
			            $imagen_temporal  = $_FILES['imagen']['tmp_name'];  
			            //este es el tipo de archivo
			            $tipo = $_FILES['imagen']['type'];
			            //leer el archivo temporal en binario
			            $fp     = fopen($imagen_temporal, 'r+b');
			            $data = fread($fp, filesize($imagen_temporal));
			            
			            fclose($fp);
			            //escapar los caracteres
			            $data = mysql_escape_string($data);

			            $inserccion = $pdo->exec("INSERT INTO imagenes (imagen, tipo_imagen,idusuario) VALUES ('$data', '$tipo',$idusuario)");
			            if ($inserccion){
			                echo "La foto ha sido subida a la base de datos correctamente.";
			                header("Refresh: 2; url='../view/profile.php'");
			            } else {
			                echo "ocurrio un error al copiar el archivo.";
			            }

			    } else {
			        echo "Archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
			    }
			}
	    }
	}

	?>

