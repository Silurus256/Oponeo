<?php
require("connect.php");
$IdOpony = $_POST['IdOpony'];
$IdProdukcyjne = $_POST['IdProdukcyjne'];

$sql = "INSERT INTO status(Id, IdProdukcyjne, IdOpony, Status) VALUES ('','$IdProdukcyjne','$IdOpony','1')";
$sql2 = "SELECT IdOpony, IdProdukcyjne, Status from status where status='1'";

$result = $conn->query($sql);
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
    <h1 class="my-5">Witaj, Opona została dodana do kolejki.</h1>
	<h2>W kolejce znajdują się następujące opony:</h2>
<?php
if($result2->num_rows>0){
	while($row = $result2->fetch_assoc()) {
		echo "IdOpony: ".$row['IdOpony']." IdProdukcyjne: ".$row['IdProdukcyjne']. "<br />";
	}
}	
?>
    <p>
		<a href="welcome.php" class="btn btn-warning">Dodaj kolejną oponę</a>
	<p>
        <a href="reset-password.php" class="btn btn-warning">Resetuj hasło</a>
        <a href="logout.php" class="btn btn-danger ml-3">Wyloguj się</a>
    </p>
</body>
</html>