<html>
    <!DOCTYPE html>
    <html lang="en">
    <head>
    <link rel="stylesheet" href="forms.css" media="screen" type="text/css">

    </head>
    <body>
<?php

include("connection.php");
// affiche admin w encadrent lkol

 $sql = "SELECT * FROM encadrent";
 $sth = $dbh->query($sql);
 echo " <h1>Liste des encadrent </h1>";
 echo "<table class='tab' border = '1'> ";
echo "<tr>
<th><b>CIN encadrent</b></th><th><b> Nom </b></th>
<th><b> Prenom </b></th><th><b> Email </b></th> 
<th><b> Diplomme </b></th> <th><b> Telephonne </b></th> ";
echo"</tr>";

 while($row = $sth->fetch(PDO::FETCH_ASSOC))
 { $CIN = $row['CIN_encadrent'];
    echo"<tr>";
     echo "<td>".$CIN. "</td>"; 
     echo "<td>".$row['Nom']. "</td>";
     echo "<td>".$row['Prenom']. "</td>";
     echo "<td>".$row['Email']. "</td>";
     echo "<td>".$row['Diplomme']. "</td>";
     echo "<td>".$row['Telephonne']. "</td>";
 }
 echo"</tr>";
 echo"</br>";
 echo"</br>";
 echo "</table >";
echo"<br>";
echo"<br>";
 echo " <button> <a href='ajouter_enc.php?CIN=$CIN' class='btn instagram'> <b> ajouter encadrent </b></a> </button>" ;
 echo"<br>";
 echo " <button ><a href='tab_stag.php' class='btn instagram'> <b> retour </b> </a> </button> ";


?>







