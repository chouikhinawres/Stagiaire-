<?php
session_start();
if (!isset($_SESSION["connected"])){ //verification ci l'utilistateur est connecté
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
<body class="bodytab">
<?php
	require("connection.php");

	$sql = "SELECT * FROM stagiaire";
	$sth = $dbh->query($sql);
	echo "<table border = '0'> ";
	echo " <tr>
	<th><b>CIN</th><th>Nom</th><th>Prenom</th>
	<th>Date naissance</th><th>Adresse</th> 
	<th>Téléphone</th><th>Etablissement</th> 
    <th>Type_stage</th><th>Sujet</th><th>Date debut</th><th>Date fin</th>
    <th>Modifier </th> <th> suprimmer </th><th> Encadrent </th>
	<th> Fiche </th>
    </tr> ";
    
	while($row = $sth->fetch(PDO::FETCH_ASSOC)){
		$CIN = $row['CIN'];
		echo " <tr>";
		echo "<td>", $CIN, "</td>";
		echo "<td>".$row['Nom']. "</td>"; 
		echo "<td>".$row['Prenom']. "</td>";
		echo "<td>".$row['Date_naissance']. "</td>";
		echo "<td>".$row['Adresse']. "</td>";
		echo "<td>".$row['Tel']."</td>";
		echo "<td>".$row['Tel']."</td>";
        echo "<td>".$row['Type_stage']."</td>";
		echo "<td>".$row['Sujet']."</td>";
        echo "<td>".$row['Date_debut']."</td>";
        echo "<td>".$row['Date_fin']."</td>";
		echo " <td><a href='modif_stag.php?CIN=$CIN' class='link'> <b> Modifier </b></a></td> ";
		echo " <td><a href='del_stag.php?CIN=$CIN' class='link'> <b> Suprimer </b></a></td> ";
		echo " <td><a href='affiche_encadrent.php?CIN=$CIN' class='link'> <b> encadrent </b></a></td>";
		echo " <td><a href='fiche.php?CIN=$CIN' class='link'> <b> fiche </b></a></td>";
		echo "</tr>";
			
	}
	echo "</table>";
	echo "<br><br><br><br>";
	echo " <a href='add_stag.php' class='btn'> <b> Ajouter un stagiare </b></a></button>";
	echo " <a href='liste_abs.php' class='btn'><b> Absence </b> </a></button>"; // feha tab les absence w ken bach nzid 7ad absence 
	echo " <a href='destroy.php' class='btn'><b> Deconnection </b></a> </button>";
	//adminc lkol

	?>
</body>
</html>
<?php
}
?>