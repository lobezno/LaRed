<?php
   if (isset($_SESSION['usuario-validado']))
   {
   		$user = $_SESSION['usuario-validado'];
      	session_destroy ();
      	print ("<br /><br /><p ALIGN='CENTER'>Conexión finalizada, adios " . $user . "</p>\n");
      	print ("<p ALIGN='CENTER'>[ <a href='login.php'>Conectar</a> ]</p>\n");
   }
   else
   {
      	print ("<br /><br />\n");
      	print ("<h3 class='error'>No existe una conexión activa<h3>\n");
      	print ("<p align='center'>[ <a href='../view/login.php'>Conectar</a> ]</p>\n");
         header("Refresh: 5; login.php");
   }
?>