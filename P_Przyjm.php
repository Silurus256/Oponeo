<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require("connect.php");
$sql = "SELECT IdOpony, IdProdukcyjne, Status from status";
$result = $conn->query($sql);
$sql2 = "SELECT * from opona";
$result2 = $conn->query($sql2);
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
<h2>Wprowadź dane przyjętych opon</h2>
<br />
	<form action="dodaj.php" method="post">
		<input type="intval" name="IdOpony" placeholder="Wpisz ID opony" required /> <br />
		<input type="intval" name="IdProdukcyjne" placeholder="Wpisz ID produkcyjne" required /> <br />
		<br />
		<button type="submit">Dodaj oponę do kolejki</button>
	</form> 
<br />	
<h4>Wszystkie przetwarzane opony:</h4>
<?php
if($result->num_rows>0){
	while($row = $result->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." IdProdukcyjne: ".$row['IdProdukcyjne']. " Status: ".$row['Status']. "<br />";
	}
}	
?>
<br />
<h4>Katalog opon</h4>
<?php
if($result2->num_rows>0){
	while($row = $result2->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." Nazwa Producenta: ".$row['NazwaProducenta']." TypOpony: ".$row['TypOpony']." PromienOpony: ".$row['PromienOpony']." SzerokoscOpony: ".$row['SzerokoscOpony']." WysokoscOpony: ".$row['WysokoscOpony']." BieznikOpony: ".$row['BieznikOpony']." ZastosowanieOpony: ".$row['ZastosowanieOpony']. "<br />";
	}
}	
?>
<br />
	<p>
        <a href="reset-password.php" class="btn btn-warning">Resetuj hasło</a>
        <a href="logout.php" class="btn btn-danger ml-3">Wyloguj się</a>
    </p>
</body>
</html>