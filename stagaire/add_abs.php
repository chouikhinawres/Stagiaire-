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
  $CIN=$_POST['CINabs'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $debut=$_POST['date'];
  $raison=$_POST['raison'];
  $req="INSERT INTO absence (CIN,Nom,Prenom,Daate,Raison)
  VALUES ('$CIN','$nom','$prenom','$debut','$raison')";
  $nb=$dbh->exec($req);
  if ($nb===False)
   echo "Error ";
  elseif ($nb===0)
  echo "No information has been add ";
  else
  header('Location:liste_abs.php');}
  
  ?>
<html>
	<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Absence </title>
  <link rel="stylesheet" href="forms.css" media="screen" type="text/css">
</head> 
<body class="body">
<div class="container">
    <form  method="post" action="">
      <h2>Absence  </h2>
      <div class="content">
        <div class="input-box">
          <label for="CIN">CIN</label>
            <input type="number" name="CINabs"  placeholder="CIN" required>
          </div>
          <div class="input-box">
            <label>Nom</label>
            <input type="text" name="nom"  placeholder="Nom" required>
          </div>
          <div class="input-box">
          <label>Prenom</label>
            <input type="text" name="prenom"  placeholder="Prenom" required>
          </div>
          <div class="input-box">
            <label>Date </label>
            <input type="date" name="date"  required>
          </div>
          <div class="input-box">
            <label>Raison </label>
            <input type="text" name="raison" >
          </div>
        </div>
        <div class="button-container">
          <button type="submit" name="submit"> Ajouter </button>
          <button type="reset" name="reset"> Annuler </button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
<?php
}
?>
