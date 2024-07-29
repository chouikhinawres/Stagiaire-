<?php
session_start();
if (!isset($_SESSION["connected"])){
    header('Location:login.html');
	exit();
}
else
{
	?>
<html>
<head>
 <link rel="stylesheet" href="forms.css" media="screen" type="text/css">
</head>
<body>
<?php
	require("connection.php");
	$sql = "SELECT * FROM absence";
	$sth = $dbh->query($sql);
	echo "<table border = '0'> ";
	echo " <tr>
	<th><b>CIN_stagiare</th><th>Nom</th><th>Prenom</th>
	<th>Date</th><th>Raisson</th><th>supprimer</th>
    </tr> "; 
	while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$CIN=$row['CIN'];
		echo " <tr>";	
		echo "<td>".$CIN. "</td>"; 
		echo "<td>".$row['Nom']. "</td>"; 
		echo "<td>".$row['Prenom']. "</td>";
		echo "<td>".$row['Date']. "</td>";
		echo "<td>".$row['Raison']. "</td>";
		echo " <td id='b'><a href='delet_abs.php?CIN=$CIN'> <b> Suprimer </b></a></td> ";
		echo "</tr>";
			
	}
	echo "</table>";
	echo "<br>";
	echo "<br>";
	echo "<div classs='div1'>";
	echo "  <a href='add_abs.php'  class='btn'> <b> Ajouter un absence </b> </a></button>";
	echo "  <a href='tab_stag.php' class='btn'> <b> Retour </b> </a></button>";
    echo "</div>";
	

	?>
</body>
</html>
<?php
}
?>