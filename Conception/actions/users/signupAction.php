<?php  
require ('actions/database.php');

if(isset($_POST['validate'])){
if(!empty($_POST['pseudo']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mdp'])){


    $users_pseudo = htmlspecialchars($_POST['pseudo']);
    $users_nom = htmlspecialchars($_POST['nom']);
    $users_prenom = htmlspecialchars($_POST['prenom']);
    $users_mdp = password_hash($_POST['mdp'],PASSWORD_DEFAULT);

    $checkIfUserAlreadyExists =$bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
    $checkIfUserAlreadyExists->execute(array($users_pseudo));

    if($checkIfUserAlreadyExists->rowCount() ==0){
    
        $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo,nom,prenom,mdp)VALUES(?,?,?,?)');
        $insertUserOnWebsite ->execute(array($users_pseudo,$users_nom, $users_prenom, $users_mdp));

        $getInfosOfThisUserReq=$bdd->prepare('SELECT id FROM users WHERE nom = ? AND prenom =? AND pseudo = ?');
        $getInfosOfThisUserReq->execute(array($users_nom, $users_prenom, $users_pseudo));

        $usersInfos = $getInfosOfThisUserReq->fetch();

        $_SESSION['auth'] = true;
        $_SESSION['id'] = $usersInfos['id'];
        $_SESSION['nom'] = $usersInfos['nom'];
        $_SESSION['prenom'] = $usersInfos['prenom'];
        $_SESSION['pseudo'] = $usersInfos['pseudo'];


        header('location: index.php');
        
    }else{
        $errorMsg = "l'utilisateur existe deja sur le site";
        }


}else{
$errorMsg = "Veuillez renseigner tous les champs";
}
}
