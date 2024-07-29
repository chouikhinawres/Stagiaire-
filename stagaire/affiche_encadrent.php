<html>
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css" media="screen" type="text/css">
   </head>
   <body>       
<?php
session_start();
if (!isset($_SESSION["connected"])){
    header('Location:login.html');
	exit();
}
else
{ require("connection.php");
    $CIN=$_GET["CIN"];
    $sql = "SELECT * FROM encadrent where CIN='$CIN'";
    $sth = $dbh->query($sql);
    echo "<table class='tab' border = '1'> ";
    echo "<tr>
    <th><b> CIN stagiare</b></th><th><b> Nom Encadrent</b></th> <th><b> Prenom Encadrent</b></th><th><b> Email </b></th> 
    <th><b> Diplomme </b></th> <th><b> Telephonne </b></th><th><b> modifier </b></th><th><b> supprimer </b></th> ";
    echo "</tr>";
    
    while($row = $sth->fetch(PDO::FETCH_ASSOC))
    {
        echo"<tr>";
        echo "<td>".$CIN."</td>";
        echo "<td>".$row['Nom']. "</td>";
        echo "<td>".$row['Prenom']. "</td>";
     echo "<td>".$row['Email']. "</td>";
     echo "<td>".$row['Diplomme']. "</td>";
     echo "<td>".$row['Telephonne']. "</td>";
     echo "<td> <a href='modif_enc.php?CIN=$CIN'> <b> Modifier</b></a> </td>"; 
     echo "<td> <a href='del_enc.php?CIN=$CIN'> <b> Supprimer</b></a> </td>"; 

 }
 echo"</tr>";
 echo"</br>";
 echo"</br>";
 echo "</table >";
echo"<br>";
echo"<br>";
echo " <a href='add_enc.php?CIN=$CIN' class='btn'> <b> Ajouter encadrent </b></a></td>";
echo " <a href='tab_stag.php' class='btn'> <b> retour </b></a></td>";

}
?>
</body>
</html>