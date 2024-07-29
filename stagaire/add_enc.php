<?php
session_start();
if (!isset($_SESSION["connected"]))
{
    header('Location:login.html');
	exit();
}
else
{
  include("connection.php");
  $CINe=$_GET["CIN"];
  $sql = "SELECT * FROM stagiaire where CIN='$CINe'";
  $sth = $dbh->query($sql);
  $tab = $sth->fetch(PDO::FETCH_ASSOC);
  
  if (isset($_POST['submit'])) 
  {
  
  $nomenc=$_POST['nomENC'];
  $preenc=$_POST['preENC'];
  $email=$_POST['mail'];
  $diplomme=$_POST['deplomme'];
  $tel=$_POST['Telephonne'];
  $req="INSERT INTO encadrent (CIN,Nom, Prenom,Email,Diplomme,Telephonne)
    VALUES ('$CINe','$nomenc','$preenc','$email','$diplomme','$tel') ";
    $nb=$dbh->exec($req);
    if ($nb===False)
    echo "Error in encadrent ";
    elseif ($nb===0)
    {echo "No information has been add ";}
    else
    {header('Location:tab_stag.php');}
  }
  ?>

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
      <h2>Affecter un encadrent </h2>
      <div class="content">
        <div class="input-box">
            <label>CIN stagiare</label>
            <input type="text" id="cin" name="CIN_stag" value="<?php echo $tab['CIN']; ?>" placeholder="CIN Stagaire" >
          </div>
          <div class="input-box">
            <label>Nom encadrent</label>
            <input type="text" name="nomENC"  placeholder="Nom encadrent" required>
          </div>
          <div class="input-box">
            <label>prenom encadrent</label>
            <input type="text" name="preENC"  placeholder="prenom encadrent" required>
          </div>
          <div class="input-box">
            <label>Email</label>
            <input input type="email" name="mail" placeholder="Email" required>
          </div>
          <div class="input-box">
            <label>Diplomme</label>
            <input input type="text" name="deplomme" placeholder="Diplomme" required>
          </div>
          <div class="input-box">
            <label> Telephonne</label>
            <input type="text" id ="tel" name="Telephonne" placeholder="Telephonne" required>
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