<?php
session_start();
if (!isset($_SESSION["connected"])){
    header('Location:login.html');
	exit();
}
else
{
    include("connection.php");
    $CIN=$_GET["CIN"];
    $req="DELETE FROM fiche WHERE CIN_stagiare=$CIN";
    $nb=$dbh->exec($req);
    if ($nb===False)
        echo "erreur dans la requête";
    elseif ($nb===0)
        echo "Aucun enregistrement n'a été supprimé";
    else
    header('Location:tab_stag.php');
}
?>