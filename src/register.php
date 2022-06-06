<?php
// Incluimos el objeto de conexión con la bd
include("config/config.php");

// Incluimos la cabecera
include_once("views/header.php");

// Si no recibimos nada por POST
if(!empty($_POST)) {
	// Si recibimos parámetros por POST los saneamos para evitar SQL injection
	$name = $mysqli->real_escape_string($_POST['name']);
	$email = $mysqli->real_escape_string($_POST['email']);
	$telephone = $mysqli->real_escape_string($_POST['telephone']);
	$f_nac = $mysqli->real_escape_string($_POST['f_nac']);
	$username = $mysqli->real_escape_string($_POST['username']);
	$password = $mysqli->real_escape_string($_POST['password']);

	// Comparamos si los parámetros están vacíos
	if(empty($name) || empty($email) || empty($username) || empty($password) || empty($telephone) || empty($f_nac)) {
		$status = "error";
		$message = "All fields should be filled. Either one or many fields are empty.";
	} else {
		// Si no están vacíos los insertamos en la bd
		$mysqli->query("INSERT INTO login (name, email, telephone, f_nac, username, password) VALUES ('$name', '$email', '$telephone', '$f_nac', '$username', md5('$password'))");

		// Comprobamos si la inserción se realizó con éxito
		if ($mysqli->errno == 0) {
			$status = "success";
			$message = "Registration successfully.";
		} else {
			$status = "error";
			$message = "Error: $mysqli->error";
		}

		// Cerramos la conexión con la base de datos
		$mysqli->close();
	}
}

// Incluimos la vista para registrar usuarios
include_once("views/register.php");

// Incluimos el pie de página
include_once("views/footer.php");
?>