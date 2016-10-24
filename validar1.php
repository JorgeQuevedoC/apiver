<?php   
  include 'database.php';
	$user = $_POST["usuario"];
	$pass = $_POST["clave"];

  $pdo = Database::connect();
	$sql = "select * from validausuario where username = '$user'";

  $q = $pdo->prepare($sql);
  $q->execute(array($user));
  $row = $q->fetch(PDO::FETCH_ASSOC);

	if($row!=NULL)
	{ 	
   	if($row['password'] == $pass)
   	{ 			
      session_start(); 
    	$_SESSION["usuario"] = $row['username'];
    	$_SESSION["clave"]= $row['password'];
      $_SESSION["validated"]= true;

      //var_dump($row['testype']);
          
      header('Location: index.php');
    }
    
    else
    {
  //En caso que la contraseña sea incorrecta enviamos un msj y redireccionamos a login.php
?>
     <script languaje="javascript">
      alert("Nombre de Usuario / contraseña incorrectos");
      location.href = "login.php";
     </script>
<?php
   } 
  }
  else
  {
    //en caso que el nombre de administrador es incorrecto enviamos un msj y redireccionamos a login.php
?>
    <script languaje="javascript">
      alert("Nombre de Usuario / contraseña incorrectos");
      location.href = "login.php";
    </script>
<?php   
  mysql_free_result($result);
  Database::disconnect();
}
?>