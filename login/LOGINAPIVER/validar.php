<?php
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];

//conectar a la base de datos
$conexion=mysqli_connect("localhost", "root", "", "bd_login");
$consulta="SELECT * FROM validausuario WHERE username='$usuario' and password='$clave'";
$resultado=mysqli_query($conexion, $consulta);

$filas=mysqli_num_rows($resultado);

if($filas>0)
{
	header("location: index2.html"); 
}
else
{
	<script type="text/javascript">
	alert("Datos Incorrectos")
	</script>
}

mysqli_free_results($resultado);
mysqli_close($conexion); 