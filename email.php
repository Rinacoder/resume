<?php
try{
	$db = new PDO("sqlite:feedback.sqlite");


// Поолучим данные с формы

	$username = $_POST["name"];
	$email = $_POST["email"];
	$feedback = $_POST["feedback"];


// Преобразуем данные

	$username = htmlspecialchars($username);
	$email = htmlspecialchars($email);
	$feedback = htmlspecialchars($feedback);

	$username = urldecode($username);
	$email = urldecode($email);
	$feedback = urldecode($feedback);

	$username = trim($username);
	$email = trim($email);
	$feedback = trim($feedback);


// Отправляем данные

	$db->exec("INSERT INTO feedback (name, mail, feedback) VALUES ('$username', '$email', '$feedback');");


	$db = NULL;

	$new_url = 'index.php';
	header("Location: $new_url?message=Отправлено.#form");
}
catch(PDOException $e)
{
	$new_url = 'index.php';
	header("Location: $new_url?message=Ошибка#form");
}

?>