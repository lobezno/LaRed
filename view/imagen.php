<?php
//conexion a la base de datos
require '../model/accessDB.php';
mysql_connect($soloHost, 'root', $passDB) or die(mysql_error()) ;
mysql_select_db('lared') or die(mysql_error()) ;
 
//si la variable imagen no ha sido definida nos dara un advertencia.

 
 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     if ($id > 0){
        //vamos a crear nuestra consulta SQL
        $consulta = "SELECT imagen, tipo_imagen FROM imagenes WHERE idusuario = $id";
        //con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
        //de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
        $resultado= @mysql_query($consulta) or die(mysql_error());
     
        //si el resultado fue exitoso
        //obtendremos el dato que ha devuelto la base de datos
        $datos = mysql_fetch_assoc($resultado);
     
        //ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
        $imagen = $datos['imagen'];
        $tipo = $datos['tipo_imagen'];
         
        //ahora colocamos la cabeceras correcta segun el tipo de imagen
        header("Content-type: $tipo");
        echo $imagen;
    }
 }else if ($_GET['idpost']) {
     $idpost = $_GET['idpost'];
     if ($idpost > 0){
        //vamos a crear nuestra consulta SQL
        $consulta = "SELECT pic, tipo_pic FROM posts WHERE idpost = $idpost";
        //con mysql_query la ejecutamos en nuestra base de datos indicada anteriormente
        //de lo contrario mostraremos el error que ocaciono la consulta y detendremos la ejecucion.
        $resultado= @mysql_query($consulta) or die(mysql_error());
     
        //si el resultado fue exitoso
        //obtendremos el dato que ha devuelto la base de datos
        $datos = mysql_fetch_assoc($resultado);
     
        //ruta va a obtener un valor parecido a "imagenes/nombre_imagen.jpg" por ejemplo
        $imagen = $datos['pic'];
        $tipo = $datos['tipo_pic'];
         
        //ahora colocamos la cabeceras correcta segun el tipo de imagen
        header("Content-type: $tipo");
        echo $imagen;
    }
 }
?>