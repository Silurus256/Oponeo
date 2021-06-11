<?php
session_start();
 
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

require("connect.php");

$sql = "SELECT IdOpony, IdProdukcyjne, Status from status";
$result = $conn->query($sql);

$sql_przyjm = "SELECT IdOpony, IdProdukcyjne, Status from status where Status='1'";
$result_przyjm = $conn->query($sql_przyjm);

$sql_szor = "SELECT IdOpony, IdProdukcyjne, Status from status where Status='2'";
$result_szor = $conn->query($sql_szor);

$sql_biez = "SELECT IdOpony, IdProdukcyjne, Status from status where Status='3'";
$result_biez = $conn->query($sql_biez);

$sql_sprawdz = "SELECT IdOpony, IdProdukcyjne, Status from status where Status='4'";
$result_sprawdz = $conn->query($sql_sprawdz);

$sql_magaz = "SELECT IdOpony, IdProdukcyjne, Status from status where Status='5'";
$result_magaz = $conn->query($sql_magaz);
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
<h2>Raporty opon</h2>
<br />
<h3>Wszystkie opony:</h3>
<?php
if($result->num_rows>0){
	while($row = $result->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." IdProdukcyjne: ".$row['IdProdukcyjne']. " Status: ".$row['Status']. "<br />";
	}
}	
?>
<br />	
<h3>Opony przyjmowane:</h3>
<?php
if($result_przyjm->num_rows>0){
	while($row = $result_przyjm->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." IdProdukcyjne: ".$row['IdProdukcyjne']. " Status: ".$row['Status']. "<br />";
	}
}	
?>
<br />
<h3>Opony szorstkowane:</h3>
<?php
if($result_szor->num_rows>0){
	while($row = $result_szor->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." IdProdukcyjne: ".$row['IdProdukcyjne']. " Status: ".$row['Status']. "<br />";
	}
}	
?>
<br />
<h3>Opony bieżnikowane:</h3>
<?php
if($result_biez->num_rows>0){
	while($row = $result_biez->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." IdProdukcyjne: ".$row['IdProdukcyjne']. " Status: ".$row['Status']. "<br />";
	}
}	
?>
<br />
<h3>Opony sprawdzane:</h3>
<?php
if($result_sprawdz->num_rows>0){
	while($row = $result_sprawdz->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." IdProdukcyjne: ".$row['IdProdukcyjne']. " Status: ".$row['Status']. "<br />";
	}
}	
?>
<br />
<h3>Opony przekazane do magazynu:</h3>
<?php
if($result_magaz->num_rows>0){
	while($row = $result_magaz->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." IdProdukcyjne: ".$row['IdProdukcyjne']. " Status: ".$row['Status']. "<br />";
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