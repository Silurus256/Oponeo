<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Oponeo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Witaj, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Możesz teraz przejść do pracy.</h1>
<?php
	$login=htmlspecialchars($_SESSION["username"]);
	//echo $login;
	if($login=="P_Przyjm")
		echo '<a href="P_Przyjm.php" class="btn btn-warning">Rozpocznij wprowadzanie nowych opon</a>';
	elseif($login=="P_Szor") 
		echo '<a href="P_Szor.html" class="btn btn-warning">Rozpocznij wprowadzanie szorstkowanych opon</a>';
	elseif($login=="P_Biez") 
		echo '<a href="P_Biez.html" class="btn btn-warning">Rozpocznij wprowadzanie bieżnikowanych opon</a>';
	elseif($login=="P_Sprawdz") 
		echo '<a href="P_Sprawdz.html" class="btn btn-warning">Rozpocznij wprowadzanie sprawdzanych opon</a>';
	elseif($login=="P_Magazyn") 
		echo '<a href="P_Magazyn.html" class="btn btn-warning">Rozpocznij wprowadzanie magazynowanych opon</a>';
	elseif($login=="P_Biuro") 
		echo '<a href="P_Biuro.php" class="btn btn-warning">Wyświetl raporty</a>';
	else
		echo "Brak danych do wyświetlenia";
?>
<br />	
<br />
<br />
	<p>
        <a href="reset-password.php" class="btn btn-warning">Resetuj hasło</a>
        <a href="logout.php" class="btn btn-danger ml-3">Wyloguj się</a>
    </p>
</body>
</html>