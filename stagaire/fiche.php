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
  include("connection.php");
  $CIN=$_GET["CIN"];
	$sql = "SELECT * FROM fiche where CIN_stagiare='$CIN'";
	$sth = $dbh->query($sql);
	
	echo "<table class='tab' border = '1'> ";
	echo " <tr>
	<th><b>CIN stagiaire</th><th>Sujet</th><th>remarque</th>
	<th>Note</th>
	<th>modifier </th> <th>supprimer </th>
    </tr> ";
	while($row = $sth->fetch(PDO::FETCH_ASSOC)){
	$cinstag=$row['CIN_stagiare'];
		echo " <tr>";
		echo "<td>".$cinstag."</td>"; 
		echo "<td>".$row['Sujet']. "</td>";
		echo "<td>".$row['remarque']. "</td>";
		echo "<td>".$row['Note']. "</td>";
		echo "<td><a href='modif_fich.php?CIN=$CIN'> <b> modifier </b></a></td>";
		echo " <td id='b'><a href='del_fiche.php?CIN=$CIN'> <b> Suprimer </b></a></td> ";

		echo "</tr>";
			
	}
	echo "</table>";
	echo "<br>";
	echo "<br>";
	echo " <a href='tab_stag.php' class='btn'> <b> Retour </b></a></td> ";
	echo "<a href='add_fiche.php?CIN=$CIN'class='btn'> <b> Ajouter </b></a></td> ";


	?>
</body>
</html>
<?php
}
?>