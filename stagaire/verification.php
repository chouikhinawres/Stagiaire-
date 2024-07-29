<?php
session_start();
     
    include('connection.php');  
    $username = $_POST['username'];  
    $password = $_POST['Pasword'];  
    
    $sql = "SELECT * from user where user_name ='$username' and Pasword ='$password' ";  
    $sth = $dbh->query($sql);  
    $result=$sth->fetchAll();
    $nb=Count($result);  
          
        if($nb == 1)
        {  
            $_SESSION["connected"]="oui";
            header('Location:tab_stag.php');
            exit();
            }
            else
            {
            header('Location:login.html');
             exit(); 
            }
?>