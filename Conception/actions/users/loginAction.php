<?php 
session_start(); 
require ('actions/database.php');

if(isset($_POST['validate'])){
    if(!empty($_POST['pseudo'])  AND !empty($_POST['mdp'])){
    
    
        $users_pseudo = htmlspecialchars($_POST['pseudo']);
        $users_mdp = htmlspecialchars($_POST['mdp']);
        
        $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($users_pseudo));
        
        if($checkIfUserExists->rowCount() > 0){
        //code
            $usersInfos = $checkIfUserExists->fetch();
            if(password_verify($users_mdp, $usersInfos['mdp'])){
            
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['nom'] = $usersInfos['nom'];
                $_SESSION['prenom'] = $usersInfos['prenom'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                header('location: index.php');
        
            }else{
                $errorMsg = "votre mot de passe est incorrecte";
            }
        }else{
            $errorMsg = "votre pseudo est incorrect";
        }
        
     }else{
            $errorMsg = "Veuillez renseigner tous les champs";
          }
    }
