<?php
session_start();
if (!isset($_SESSION["connected"]))
{
    header('Location:login.html');
	exit();
}
else
{  include("connection.php");

    $CIN=$_GET["CIN"];
    $sql = "SELECT * FROM fiche where CIN_stagiare='$CIN'";
    $sth = $dbh->query($sql);
    $tab = $sth->fetch(PDO::FETCH_ASSOC);
    if (isset($_POST['submit'])) 
    {
        $cinfiche=$_POST["cinfiche"];
        $sujetfiche=$_POST["sujetfich"];
        $note=$_POST["note"];
        $remarque=$_POST["remarque"];
        $req="UPDATE fiche SET CIN_stagiare='$cinfiche' 
        , Sujet='$sujetfiche', remarque='$remarque',
         Note='$note' where CIN_stagiare='$CIN'";
        $nb=$dbh->exec($req);
        if ($nb===False)
        echo "Error in fiche ";
        elseif ($nb===0)
        {echo "No information has been add ";}
        else
        {header('Location:tab_stag.php');
        }
    }
?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stagiaire</title>
    <link rel="stylesheet" href="forms.css" media="screen" type="text/css">
  </head>     
<body  class="body">
	<div class="container">
    <form  method="post" action="">
      <h2>Modifer  </h2>
      <div class="content">
        <div class="input-box">
          <label>CIN Stagiare</label>
          <input type="number" name="cinfiche" value="<?php echo $tab['CIN_stagiare']; ?>" placeholder="CIN " >
        </div>
        <div class="input-box">
          <label>Sujet</label>
         <input type="text" name="sujetfich" value="<?php echo $tab['Sujet']; ?>" placeholder=" Sujet" >
        </div>
        <div class="input-box">
          <label>Note</label>
          <input type="number" name="note" value="<?php echo $tab['Note']; ?>" placeholder="note" required>
        </div>
        <div class="input-box">
          <label>Remarque</label>
          <input type="text" name="remarque" value="<?php echo $tab['remarque']; ?> " placeholder="remarque" >
        </div>
      </div>
      <div class="button-container">
        <button type="submit" name="submit"> Valider </button>
        <button type="reset" name="reset"> Annuler </button>
      </div>
    </form>
  </div>
</body>
</html>
<?php
}
?>