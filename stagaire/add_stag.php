<?php
session_start();
if (!isset($_SESSION["connected"])){
    header('Location:login.html');
	exit();
}
else
{
if (isset($_POST['submit'])) {
  include("connection.php");
  $CIN=$_POST["CIN"];
  $nom=$_POST["nom"];
  $prenom=$_POST["prenom"];
  $Date=$_POST["Date_naissance"];
  $Adresse=$_POST["Adresse"];
  $Tel=$_POST["Tel"];
  $Etablissement=$_POST["Etab"];
  $type=$_POST["type"];
  $sujet=$_POST["sujet"];
  $debut=$_POST["debut"];
  $fin=$_POST["fin"];


$req="INSERT INTO stagiaire (CIN, Nom, Prenom, Date_naissance, Adresse, Tel, Etablissement, Type_stage, Sujet, Date_debut, Date_fin) 
VALUES ('$CIN' , '$nom' , '$prenom' , '$Date' , '$Adresse','$Tel','$Etablissement','$type','$sujet','$debut','$fin')";
  $nb=$dbh->exec($req);
  if ($nb===False)
     echo "Error";
  elseif ($nb===0)
    echo "No information has been add";
  else
      header('Location:tab_stag.php');
}
?>
<!-- Formulaire HTML -->
 	
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stagiaire</title>
    <link rel="stylesheet" href="forms.css" media="screen" type="text/css">
    <script>
    function verifier()
     {
			// Récupération de la valeur du champ
			var TEL = document.getElementById("tel").value;
			var CIN = document.getElementById("cin").value;

			if (isNaN(CIN) || CIN.indexOf(".") != -1) 
      {
				alert("Le CIN doit être un nombre entier !");
			
			}
		}
	</script>
  </head>     
<body class="body">
  <div class="container">
    <form id="form"  method="post" action="">
      <h2>Ajouter Stagiaire</h2>
      <div class="content">
        <div class="input-box">
          <label>CIN</label>
          <input type="text" id="cin" name="CIN"  placeholder="CIN" required>
        </div>
        <div class="input-box">
          <label >Nom</label>
          <input type="text" id="name" name="nom"  placeholder=" name" required>
        </div>
        <div class="input-box">
         <label>Prenom</label>
         <input type="text"name="prenom" placeholder="Prenom"required >
        </div>
        <div class="input-box">
          <label>Date naissance</label>
          <input type="date" name="Date_naissance" required >
        </div>
        <div class="input-box">
          <label >Adresse</label>
            <input type="text" name="Adresse"  placeholder="Adresse" required>
        </div>  
        <div class="input-box">
          <label >Telephone</label>
          <input type="text" name="Tel" placeholder="Téléphone" required>
        </div>
        <div class="input-box">
         <label for="Etab">Etablissement</label>
          <input type="text" name="Etab"   placeholder="Etablissement" required>
        </div>
        <div class="input-box">
          <label for="type">Type de stage</label>
            <input type="text" name="type"  placeholder="Type de stage" required>
        </div>
        <div class="input-box">
          <label for="sujet">Sujet</label>
          <input input type="text" name="sujet"  placeholder="sujet de stage" required>
        </div>
        <div class="input-box">
          <label for="debut">Date debut</label>
          <input input type="date"  name="debut"   required>
        </div>
        <div class="input-box">
          <label for="name">Date fin</label>
          <input type="date" name="fin"  required>
        </div>
      </div>
      <div class="button-container">
        <button type="submit" name="submit" onclick="valider()"> Ajouter </button>
        <button type="reset" name="reset"> Annuler </button>
      </div>
    </form>
  </div>
</body>
</html>
<?php
}
?>