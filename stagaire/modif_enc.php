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
 $sql = "SELECT * FROM encadrent where CIN='$CIN'";
	$sth = $dbh->query($sql);
	$tab = $sth->fetch(PDO::FETCH_ASSOC);

  
  if (isset($_POST['submit'])) 
 {

	$cinstag=$_POST["cinstag"];
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$mail=$_POST["mail"];
	$diplome=$_POST["diplôme"];
	$tel=$_POST["tel"];
  

	
$sql1="UPDATE encadrent SET CIN='$cinstag', Nom='$nom', 
Prenom='$prenom', Email='$mail', Diplomme='$diplome',
Telephonne='$tel' where CIN='$CIN'" ; 
$nb=$dbh->exec($sql1);
if ($nb===False) 
	echo "Error ";
elseif ($nb===0)
	echo " acunne modification ";
else
echo " Operation valider ";


  }

?>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="forms.css" media="screen" type="text/css">

  </head>
  <body  class="body">
  <div class="container">
    <form  method="post" action="">
      <h2>Modifier Encadrent </h2>
      <div class="content">
        <div class="input-box">
            <label>CIN stagiaire</label>
            <input type="text" name="cinstag" value="<?php echo $tab['CIN']; ?>" placeholder="Cin Stagiaire" required>
          </div>
          <div class="input-box">
            <label>Nom</label>
            <input type="text" name="nom"  value="<?php echo $tab['Nom']; ?>" placeholder="nom Encadrent" required>
          </div>
          <div class="input-box">
            <label>Prenom</label>
            <input type="text"name="prenom"  value="<?php echo $tab['Prenom']; ?>" placeholder="prenom Encadrent" required>
          </div>
          <div class="input-box">
            <label>Email</label>
            <input type="mail" name="mail"  value="<?php echo $tab['Email']; ?>" placeholder="Email" required>
          </div> 
          <div class="input-box">
              <label>Diplôme</label>
              <input type="text" id="tel" name="diplôme" value="<?php echo $tab['Diplomme']; ?>"  placeholder="Diplomme" required>
          </div>
          <div class="input-box">
            <label>Telephonne</label>
            <input type="text" name="tel" value="<?php echo $tab['Telephonne'];?>"  placeholder="Telephone" required>
          </div>
        </div>
        <div class="button-container">
          <button type="submit" name="submit" onclick="verifier()"> Valider </button>
          <button type="reset" name="reset"> Anuller </button>
        </div>
      </form>
    </div>
  </body>
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
</html>
<?php
}
?>

