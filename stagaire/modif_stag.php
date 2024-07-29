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
  $sql = "SELECT * FROM stagiaire where CIN='$CIN'";
	$sth = $dbh->query($sql);
	$tab = $sth->fetch(PDO::FETCH_ASSOC);

  if (isset($_POST['submit'])) 
  {
    $cin=$_POST["CIN"];
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
  
  $sql1=" UPDATE stagiaire SET Nom='$nom', Prenom='$prenom', 
  Date_naissance='$Date', Adresse='$Adresse', Tel='$Tel' , Etablissement='$Etablissement',
  Type_stage='$type', Sujet='$sujet', Date_debut='$debut', Date_fin='$fin' where CIN='$CIN' ";
  $nb=$dbh->exec($sql1);
  if ($nb===False) 
    echo "Error ";
  elseif ($nb===0)
    echo " acunne modification ";
  else
  header('location:tab_stag.php');
 
}
 

  ?>
		
<html>
	<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier</title>
  <link rel="stylesheet" href="forms.css" media="screen" type="text/css">

  <script>
    function verifier()
     {
			// Récupération de la valeur du champ
			var champ = document.getElementById("tel").value;

			// Vérification si la valeur est un nombre entier ou non
			if (isNaN(champ) || champ.indexOf(".") != -1) 
      {
				alert("Le telephonne doit être un nombre entier !");
			
			}
		}
	</script>

</head>     
<body class="body">
  <div class="container">
    <form  method="post" action="">
      <h2>Modifier Stagiaire </h2>
      <div class="content">
        <div class="input-box">
          <label for="CIN">CIN</label>
          <input type="text" id="cin" name="CIN" value="<?php echo $tab['CIN'];?>" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <label for="nom">Nom</label>
          <input type="text" name="nom"  value="<?php echo $tab['Nom']; ?>" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
         <label for="prenom">Prenom</label>
         <input type="text"name="prenom"  value="<?php echo $tab['Prenom']; ?>" placeholder="Enter your name" required>
        </div>
        <div class="input-box">
          <label for="Date_naissance">Date naissance</label>
          <input type="date" name="Date_naissance"  value="<?php echo $tab['Date_naissance']; ?>" placeholder="Date de naissance" required>
        </div>
        <div class="input-box">
          <label for="Adresse">Adresse</label>
            <input type="text" name="Adresse" value="<?php echo $tab['Adresse']; ?>" placeholder="Adresse" required>
        </div>  
        <div class="input-box">
          <label for="Tel">Telephone</label>
          <input type="number" id="tel" name="Tel" value="<?php echo $tab['Tel']; ?>"  placeholder="Téléphone" required>
        </div>
        <div class="input-box">
         <label for="Etab">Etablissement</label>
          <input type="text" name="Etab" value="<?php echo $tab['Etablissement'];?>"  placeholder="Etablissement" required>
        </div>
        <div class="input-box">
          <label for="type">Type de stage</label>
            <input type="text" name="type" value="<?php echo $tab['Type_stage'];?>"  placeholder="Type de stagee" required>
        </div>
        <div class="input-box">
          <label for="sujet">Sujet</label>
          <input input type="text" name="sujet"  value="<?php echo $tab['Sujet'];?>" placeholder="sujet de stage" required>
        </div>
        <div class="input-box">
          <label for="debut">Date debut</label>
          <input input type="date"  name="debut"  value="<?php echo $tab['Date_debut'];?>" placeholder="Date de debut" required>
        </div>
        <div class="input-box">
          <label for="name">Date fin</label>
          <input type="date" name="fin" value="<?php echo $tab['Date_fin'];?>" placeholder="date de fin" required>
        </div>
      </div>
      <div class="button-container">
        <button type="submit" name="submit" onclick="valider()"> Valider </button>
        <button type="reset" name="reset"> Anuller </button>

      </div>
    </form>
  </div>
</body>
</html>
<?php
}
?>

